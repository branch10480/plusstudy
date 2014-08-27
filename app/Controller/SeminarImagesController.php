<?php
App::uses('AppController', 'Controller');
/**
 * SeminarImages Controller
 *
 * @property SeminarImage $SeminarImage
 * @property PaginatorComponent $Paginator
 */
class SeminarImagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');
	public $uses = array('SeminarImage');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SeminarImage->recursive = 0;
		$this->set('seminarImages', $this->Paginator->paginate());
	}





/**
 * getSmnImgs method
 *
 * @param int $accountId
 * @return void
 */
	public function getSmnImgs( $accountId = null ) {

		$result = '';
		// if ($this->RequestHandler->isAjax()) {
			// 正常処理
			// if ($this->request->is('post')) {
				// $mailaddress = $_POST['id'];
				$this->layout = 'ajax';
				$loginId = $this->Session->read('Auth.id');

				if ($accountId === null) die('アカウントIDが指定されていません');

				$params = array(
					'conditions' => array(
						'SeminarImage.account_id' => $accountId,
						), //検索条件の配列
					'recursive' => 1, //int
					// 'fields' => array('Model.field1', 'DISTINCT Model.field2'), //フィールド名の配列
					// 'order' => array('Post.post_datetime DESC'), //並び順を文字列または配列で指定
					'order' => array('SeminarImage.id DESC'), //並び順を文字列または配列で指定
					// 'group' => array('Model.field'), //GROUP BYのフィールド
					// 'limit' => $this->read_limit, //int
					// 'page' => 1, //int
					// 'offset' => n, //int
					// 'callbacks' => true //falseの他に'before'、'after'を指定できます
					);
				$result = $this->SeminarImage->find('all', $params);
			// }
		// } else {
		// 	// 不正処理
		// }
		$this->set('result', $result);
	}


	/**
	 * uploadImg method for Ajax
	 *
	 * @param void
	 * @return json char 'true' or 'false'
	 */
	function uploadImg() {
		$this->layout = 'ajax';
		$returnArr = array();
		if ($this->RequestHandler->isAjax()) {
			// 正常処理
			if ($this->request->is('post')) {

				//----- 容量制限チェック -----
				// アカウントが使用可能な容量を確認、警告
				$query = 'SELECT SUM(size) as sum FROM seminar_images WHERE account_id = ' . $this->Session->read('Auth.id');
				$result = $this->SeminarImage->query($query);
				$filesize = $_FILES['up_img']['size'];
				// 確認
				if ($result[0][0]['sum'] + $filesize > 52428800) {									// 50 MB = 52428800 B
					$msg = '１アカウントで使える容量は 50MB 以下です';
					$returnArr[] = 'false';
					$returnArr[] = $msg;
				} else {

					//----- 画像ファイルの保存 & ディレクトリの移動

					$up_dir = UP_PATH_SMN;				// 保存先の相対パス
					$filename = $_FILES['up_img']['name'];
					$filetype = $_FILES['up_img']['type'];
					$tmpfile = $_FILES['up_img']['tmp_name'];		// 一時的に保管
					$msg = '';
					$flg = true;																// エラーがあるか無いか
					$completeFlg = 'false';
					$rand = mt_rand(1, 2147483647);							// 1以上 int の最大値以下の乱数を生成 - 一時的なidとなる
																											// 後にこれを基に 画像id（seminar_images.id） を取得する
					$lastName = '';

					// 画像の幅と高さ
					$imgW = 0;
					$imgH = 0;


					// 画像データを仮登録 - 後に情報を追加する
					$data = array(
						'SeminarImage' => array(
							'tmp_id' => $rand,
							),
						);
					$this->SeminarImage->saveAll($data);


					// 乱数をもとに、post_id を取得
					$params = array(
						'conditions' => array(
							'SeminarImage.tmp_id' => $rand
							),
						'fields' => array(
							'SeminarImage.id'
							)
						);
					$tmpData = $this->SeminarImage->find('first', $params);
					$imgId = $tmpData['SeminarImage']['id'];


					//----- ファイルが選択されたかを判断 -----
					if (is_uploaded_file($tmpfile)) {
						// ファイル名の分割 -> 取得
						list($firstName, $lastName) = explode('.', $filename);
						$newFileName = $imgId . '.' . $lastName;
						$uppath = $up_dir . $newFileName;					// アップロード先のファイルパス

						// ファイルが選択されている場合
						if (move_uploaded_file($tmpfile, $uppath)) {

							//--- 画像ファイルかどうかの判断 ---
							$fileinfo = getimagesize($uppath);
							if ($fileinfo[2] != IMAGETYPE_GIF && $fileinfo[2] != IMAGETYPE_JPEG && $fileinfo[2] != IMAGETYPE_PNG) {

								// ファイルの削除
								unlink($uppath);
								$msg = '画像以外のファイルが選択されました。';
								$flg = false;
							} else {
								//--- 正常時 ---
								$lastName = '.' . $lastName;				// 拡張子の前に . を付ける
								$img_ext = "'" . $lastName . "'";
								$imgW = $fileinfo[0];
								$imgH = $fileinfo[1];
							}
						} else {
							$msg = '移動できませんでした。';
							$flg = false;
						}
					} else {
						// ファイルが選択されていない場合
						$msg = 'ファイルが選択されていませんでした。';
					}


					// データベースに格納処理
					if ($flg) {
						$data = array(
							'SeminarImage.account_id' => $this->Session->read('Auth.id'),
							'SeminarImage.description' => "'" . (isset($_POST['dsc']) ? $_POST['dsc'] : '') . "'",
							'SeminarImage.ext' => $img_ext,
							'SeminarImage.width' => $imgW,
							'SeminarImage.height' => $imgH,
							'SeminarImage.tmp_id' => 0,
							'SeminarImage.size' => $filesize,
							);
						$conditions = array(
								'SeminarImage.id' => $imgId,
								);
						if ($this->SeminarImage->updateAll($data, $conditions)) {
							$completeFlg = 'true';
						}
					} else {

					}

					$returnArr[] = $completeFlg;
					if ($msg !== '') {
						$returnArr[] = $msg;
					}
				}
			}
		} else {
			// 不正処理
		}
		$this->set(array(
			'result' => $returnArr,
			));
	}



/**
 * getSmnImgs method
 *
 * @param string $filename
 * @return void
 */
	public function delSmnImgs( $filename = null ) {
		if ( empty($filename) ) die('ファイル名が指定されていません');
		$this->layout = 'ajax';
		$result = array();
		if ($this->RequestHandler->isAjax()) {

			// ----- 正常処理 -----
			if ($this->request->is('post')) {
				if(!file_exists(UP_PATH_SMN . $filename)) die('ファイルが存在しません | ' . UP_PATH_SMN . $filename);

				//--- ファイル削除処理 ---
				if (!unlink(UP_PATH_SMN . $filename)) die('ファイル削除失敗');

				//--- DBからセミナー画像情報を削除 ---
				list($imgId, $ext) = explode('.', $filename);
				if ($this->SeminarImage->delete($imgId))
					$result[] = 'true';
				else
					$result[] = 'false';
			}
		} else {
			// 不正処理
		}
		$this->set(array(
			'result' => $result,
			));
	}

















/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SeminarImage->exists($id)) {
			throw new NotFoundException(__('Invalid seminar image'));
		}
		$options = array('conditions' => array('SeminarImage.' . $this->SeminarImage->primaryKey => $id));
		$this->set('seminarImage', $this->SeminarImage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SeminarImage->create();
			if ($this->SeminarImage->save($this->request->data)) {
				$this->Session->setFlash(__('The seminar image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seminar image could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->SeminarImage->Account->find('list');
		$this->set(compact('accounts'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SeminarImage->exists($id)) {
			throw new NotFoundException(__('Invalid seminar image'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SeminarImage->save($this->request->data)) {
				$this->Session->setFlash(__('The seminar image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seminar image could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SeminarImage.' . $this->SeminarImage->primaryKey => $id));
			$this->request->data = $this->SeminarImage->find('first', $options);
		}
		$accounts = $this->SeminarImage->Account->find('list');
		$this->set(compact('accounts'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SeminarImage->id = $id;
		if (!$this->SeminarImage->exists()) {
			throw new NotFoundException(__('Invalid seminar image'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SeminarImage->delete()) {
			$this->Session->setFlash(__('The seminar image has been deleted.'));
		} else {
			$this->Session->setFlash(__('The seminar image could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
