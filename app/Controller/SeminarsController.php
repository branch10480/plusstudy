<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses( 'CakeEmail', 'Network/Email');
/**
 * Seminars Controller
 *
 * @property Seminar $Seminar
 * @property PaginatorComponent $Paginator
 */
class SeminarsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'MyAuth');

	public $uses = array('Account', 'Seminar', 'Question', 'Participant', 'SeminarImage', 'MeToo', 'TeachMe');


/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
			// 認証済みかどうか調べる
			$this->MyAuth->isAuth($this);
	}




/**
 * edit method
 *
 * @return void
 */
	public function edit( $seminar_id = '' ) {

		if ($seminar_id === '') $this->redirect(array('controller' => 'Accounts', 'action' => 'index'));

		$this->set('title_for_layout', '勉強会編集');


		$fileUrlArr = array();
		$smnName = '';
		$place = '';
		$upperLimit = 0;
		$startDate = '';
		$startH = 0;
		$startM = 0;
		$endH = 0;
		$endM = 0;
		$rsvLimitDate = '';
		$rsvLimitH = 0;
		$rsvLimitM = 0;
		$dsc = '';
		$smnImgId = '';
		$smnImgExt = '';

		$eFileUrlArr = '';
		$eSmnName = '';
		$ePlace = '';
		$eUpperLimit = '';
		$eStartDate = '';
		$eStartH = '';
		$eStartM = '';
		$eEndH = '';
		$eEndM = '';
		$eRsvLimitDate = '';
		$eRsvLimitH = '';
		$eRsvLimitM = '';
		$eDsc = '';

		$time = '';						// 一時的な時間変数





		if ($this->referer() === ROOT_URL . 'Seminars/' . $this->action . '/' . $seminar_id || $this->referer() === ROOT_URL . 'Seminars/' . $this->action . '/' . $seminar_id . '/') {
			// 自分自身から送信

			// $fileUrlArr = array();
			$validateResult = true;

			$smnName = $this->request->data['Seminar']['name'];
			$place = $this->request->data['Seminar']['place'];
			$upperLimit = $this->request->data['Seminar']['upper_limit'];
			$startDate = $this->request->data['Seminar']['date'];
			$startH = $this->request->data['Seminar']['startH'];
			$startM = $this->request->data['Seminar']['startM'];
			$endH = $this->request->data['Seminar']['endH'];
			$endM = $this->request->data['Seminar']['endM'];
			$rsvLimitDate = $this->request->data['Seminar']['reservation_limit_d'];
			$rsvLimitH = 0;
			$rsvLimitM = 0;
			$dsc = $this->request->data['Seminar']['description'];
			$smnImgId = $this->request->data['Seminar']['seminar_img_id'];
			if ($smnImgId) {
				// セミナー画像の整形処理
				$smnImgId = str_replace(SMN_IMG_PATH, '', $smnImgId);
				$smnImgId = str_replace(substr($smnImgId, -4), '', $smnImgId);
				$smnImgInfo = $this->SeminarImage->find('first', array('conditions' => array('SeminarImage.id' => $smnImgId)));
				$smnImgExt = $smnImgInfo['SeminarImage']['ext'];
			} else {
				$smnImgId = '';
			}

			// --- バリデーションチェック ---
			// 勉強会名
			if ($smnName === '') {
				$eSmnName = '何も入力されていません';
				$validateResult = false;
			} else if (!preg_match('/.{1,20}/', $smnName)) {
				$eSmnName = '入力された文字列が長すぎます';
				$validateResult = false;
			}

			// 開催場所
			if ($place === '') {
				$ePlace = '何も入力されていません';
				$validateResult = false;
			} else if (!preg_match('/.{1,50}/', $place)) {
				$ePlace = '入力された文字列が長すぎます';
				$validateResult = false;
			}

			// 参加人数上限
			if ($upperLimit === '') {
				$eUpperLimit = '何も入力されていません';
				$validateResult = false;
			} else if (!preg_match('/^([1-9][0-9]*)$/', $upperLimit)) {
				$eUpperLimit = '1 以上の半角数字で入力してください';
				$validateResult = false;
			} else {
				//--- 現在の参加人数より下に設定できなくする ---
				$param = array(
						'conditions' => array(
								'Participant.seminar_id' => $seminar_id,
							),
					);
				$currentJoinerNum = $this->Participant->find('count', $param);
				if ($upperLimit < $currentJoinerNum) {
					$eUpperLimit = '現在の参加人数 ' . $currentJoinerNum . '人 より少なく設定できません';
					$validateResult = false;
				}
			}

			// 開催日
			if ($startDate === '') {
				$eStartDate = '何も入力されていません';
				$validateResult = false;
			} else if (!preg_match('/^[1,2][0-9]{3}-(01|02|03|04|05|06|07|08|09|10|11|12)-(01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31)$/', $startDate)) {
				$eStartDate = '半角数字で0000-00-00の書式で入力してください';
				$validateResult = false;
			}

			// 予約締め切り日
			if ($rsvLimitDate === '') {
				$eRsvLimitDate = '何も入力されていません';
				$validateResult = false;
			} else if (!preg_match('/^[1,2][0-9]{3}-(01|02|03|04|05|06|07|08|09|10|11|12)-(01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31)$/', $rsvLimitDate)) {
				$eRsvLimitDate = '半角数字で0000-00-00の書式で入力してください';
				$validateResult = false;
			}


			if ($validateResult) {

				// 受け渡し用Session作成
				$this->request->data['Seminar']['id'] = $seminar_id;
				$this->Session->write('editSmn', $this->request->data);

				// 更新ページへ
				$this->redirect(array('action' => 'update'));
			}
		} else {
			//----- 登録済みの勉強会情報を取得 -----
			$param = array(
					'conditions' => array(
							'Seminar.id' => $seminar_id,
						),
				);

			$result = '';
			if (!$result = $this->Seminar->find('first', $param)) $this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
			// var_dump($result);



			//----- datetime型の値を分割処理 -----
			list($rsvLimitDate, $time) = split(" ", $result['Seminar']['reservation_limit']);
			list($rsvLimitH, $rsvLimitM) = split(":", $time);
			$this->request->data['Seminar']['reservation_limit_d'] = $rsvLimitDate;
			$this->request->data['Seminar']['reservation_limit_h'] = $rsvLimitH;
			$this->request->data['Seminar']['reservation_limit_m'] = $rsvLimitM;

			// 開始日時
			list($startDate, $time) = split(" ", $result['Seminar']['start']);
			list($startH, $startM) = split(":", $time);
			$this->request->data['Seminar']['date'] = $startDate;
			$this->request->data['Seminar']['startH'] = $startH;
			$this->request->data['Seminar']['startM'] = $startM;

			// 終了日時
			list($endDate, $time) = split(" ", $result['Seminar']['end']);
			list($endH, $endM) = split(":", $time);
			$this->request->data['Seminar']['endH'] = $endH;
			$this->request->data['Seminar']['endM'] = $endM;

			// その他のパラメータ格納
			$this->request->data['Seminar']['name'] = $result['Seminar']['name'];
			$this->request->data['Seminar']['place'] = $result['Seminar']['place'];
			$this->request->data['Seminar']['upper_limit'] = $result['Seminar']['upper_limit'];
			$this->request->data['Seminar']['place'];
			$this->request->data['Seminar']['description'] = $result['Seminar']['description'];
			$smnImgId = $result['Seminar']['seminar_image_id'];
			$smnImgExt = $result['SeminarImage']['ext'];

			// 説明文
			$dsc = $result['Seminar']['description'];

		}


		$minArray = array();
		for ($i=0; $i<60; $i+=5) {
			$minArray[$i] = $i;
		}

		$hArray = array();
		for ($i=0; $i<24; $i++) {
			$hArray[] = $i;
		}

		$fontsizeArray = array();
		for ($i=0; $i<10; $i++) {
			$fontsizeArray[] = $i;
		}

		$fontColor = array(
				'black' => '黒',
				'red' => '赤',
				'orange' => 'オレンジ',
				'blue' => '青',
				'green' => '緑',
			);

		$this->set(array(
				'minArray' => $minArray,
				'hArray' => $hArray,
				'fontsizeArray' => $fontsizeArray,
				'fontColor' => $fontColor,
				'eSmnName' => $eSmnName,
				'ePlace' => $ePlace,
				'eUpperLimit' => $eUpperLimit,
				'eStartDate' => $eStartDate,
				'eRsvLimitDate' => $eRsvLimitDate,
				// 'smnName' => $smnName,
				// 'place' => $place,
				'upperLimit' => $upperLimit,
				// 'startDate' => $startDate,
				// 'startH' => $startH,
				// 'startM' => $startM,
				// 'endH' => $endH,
				// 'endM' => $endM,
				// 'rsvLimitDate' => $rsvLimitDate,
				'dsc' => $dsc,
				'smnImgId' => $smnImgId,
				'smnImgExt' => $smnImgExt,
				'accId' => $this->Session->read('Auth.id'),
				'smnId' => $seminar_id,
			));
	}




/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->set('title_for_layout', '新規勉強会登録');

		// 指定されたIDを元にニーズ情報を取得
		$teachme = null;
		if(isset($this->params['url']['needs'])) {
			$options = array('conditions' => array('TeachMe.' . $this->TeachMe->primaryKey => $this->params['url']['needs']));
			$teachme = $this->TeachMe->find('first', $options);
		}

		$fileUrlArr = array();
		$smnName = '';
		$place = '';
		$upperLimit = 0;
		$startDate = '';
		$startH = 0;
		$startM = 0;
		$endH = 0;
		$endM = 0;
		$rsvLimitDate = '';
		$rsvLimitH = 0;
		$rsvLimitM = 0;
		$dsc = '';
		$smnImgId = '';

		$eFileUrlArr = '';
		$eSmnName = '';
		$ePlace = '';
		$eUpperLimit = '';
		$eStartDate = '';
		$eStartH = '';
		$eStartM = '';
		$eEndH = '';
		$eEndM = '';
		$eRsvLimitDate = '';
		$eRsvLimitH = '';
		$eRsvLimitM = '';
		$eDsc = '';

		if (
				preg_match('|^' . ROOT_URL . 'Seminars|', $this->referer())
				&& $this->request->is('post')
			) {
			// 自分自身から送信

			// $fileUrlArr = array();
			$validateResult = true;

			$smnName = $this->request->data['Seminar']['name'];
			$place = $this->request->data['Seminar']['place'];
			$upperLimit = $this->request->data['Seminar']['upper_limit'];
			$startDate = $this->request->data['Seminar']['date'];
			$startH = $this->request->data['Seminar']['startH'];
			$startM = $this->request->data['Seminar']['startM'];
			$endH = $this->request->data['Seminar']['endH'];
			$endM = $this->request->data['Seminar']['endM'];
			$rsvLimitDate = $this->request->data['Seminar']['reservation_limit_d'];
			$rsvLimitH = 0;
			$rsvLimitM = 0;
			$dsc = $this->request->data['Seminar']['description'];
			$smnImgId = $this->request->data['Seminar']['seminar_img_id'];
			// --- バリデーションチェック ---
			// 勉強会名
			if ($smnName === '') {
				$eSmnName = '何も入力されていません';
				$validateResult = false;
			} else if (!preg_match('/.{1,20}/', $smnName)) {
				$eSmnName = '入力された文字列が長すぎます';
				$validateResult = false;
			}

			// 開催場所
			if ($place === '') {
				$ePlace = '何も入力されていません';
				$validateResult = false;
			} else if (!preg_match('/.{1,50}/', $place)) {
				$ePlace = '入力された文字列が長すぎます';
				$validateResult = false;
			}

			// 参加人数上限
			if ($upperLimit === '') {
				$eUpperLimit = '何も入力されていません';
				$validateResult = false;
			} else if (!preg_match('/^(0|[1-9][0-9]*)$/', $upperLimit)) {
				$eUpperLimit = '半角数字で入力してください';
				$validateResult = false;
			}

			// 開催日
			if ($startDate === '') {
				$eStartDate = '何も入力されていません';
				$validateResult = false;
			} else if (!preg_match('/^[1,2][0-9]{3}-(01|02|03|04|05|06|07|08|09|10|11|12)-(01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31)$/', $startDate)) {
				$eStartDate = '半角数字で0000-00-00の書式で入力してください';
				$validateResult = false;
			}

			// 予約締め切り日
			if ($rsvLimitDate === '') {
				$eRsvLimitDate = '何も入力されていません';
				$validateResult = false;
			} else if (!preg_match('/^[1,2][0-9]{3}-(01|02|03|04|05|06|07|08|09|10|11|12)-(01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31)$/', $rsvLimitDate)) {
				$eRsvLimitDate = '半角数字で0000-00-00の書式で入力してください';
				$validateResult = false;
			}


			if ($validateResult) {

				// 受け渡し用Session作成
				$this->Session->write('newSmn', $this->request->data);

				// 確認ページへ
				$this->redirect(array('action' => 'newSmnConfirm'));
			}
		}



		// 詳細から戻ってきたときの処理
		if ($this->referer() === ROOT_URL . 'Seminars/newSmnConfirm' || $this->referer() === ROOT_URL . 'Seminars/newSmnConfirm/') {

			if ($this->Session->check('newSmn')) {
				$this->request->data = $this->Session->read('newSmn');
				$dsc = $this->Session->read('newSmn')['Seminar']['description'];
				$smnImgId = $this->Session->read('newSmn')['Seminar']['seminar_img_id'];
			}
		}


		$minArray = array();
		for ($i=0; $i<60; $i+=5) {
			$minArray[$i] = $i;
		}

		$hArray = array();
		for ($i=0; $i<24; $i++) {
			$hArray[] = $i;
		}

		$fontsizeArray = array();
		for ($i=0; $i<10; $i++) {
			$fontsizeArray[] = $i;
		}

		$fontColor = array(
				'black' => '黒',
				'red' => '赤',
				'orange' => 'オレンジ',
				'blue' => '青',
				'green' => '緑',
			);

		$this->set(array(
				'minArray' => $minArray,
				'hArray' => $hArray,
				'fontsizeArray' => $fontsizeArray,
				'fontColor' => $fontColor,
				'eSmnName' => $eSmnName,
				'ePlace' => $ePlace,
				'eUpperLimit' => $eUpperLimit,
				'eStartDate' => $eStartDate,
				'eRsvLimitDate' => $eRsvLimitDate,
				// 'smnName' => $smnName,
				// 'place' => $place,
				'upperLimit' => $upperLimit,
				// 'startDate' => $startDate,
				// 'startH' => $startH,
				// 'startM' => $startM,
				// 'endH' => $endH,
				// 'endM' => $endM,
				// 'rsvLimitDate' => $rsvLimitDate,
				'dsc' => $dsc,
				'smnImgId' => $smnImgId,
				'accId' => $this->Session->read('Auth.id'),
				'teachme' => $teachme,
			));
	}




/**
 * newSmnConfirm method
 *
 * @return void
 */
	public function newSmnConfirm() {

		if (!$this->Session->check('newSmn')) {
			$this->redirect(array('action' => 'index'));
		}

		$newSmn = $this->Session->read('newSmn');
		$newSmn = $newSmn['Seminar'];

		$this->set(array(
				'smnName' => $newSmn['name'],
				'place' => $newSmn['place'],
				'upperLimit' => $newSmn['upper_limit'],
				'startDate' => $newSmn['date'],
				'startH' => $newSmn['startH'],
				'startM' => $newSmn['startM'],
				'endH' => $newSmn['endH'],
				'endM' => $newSmn['endM'],
				'rsvLimitDate' => $newSmn['reservation_limit_d'],
				'rsvLimitH' => $newSmn['reservation_limit_h'],
				'rsvLimitM' => $newSmn['reservation_limit_m'],
				'dsc' => $newSmn['description'],
				'smnImgId' => $newSmn['seminar_img_id'],
				'taechmeid' => $newSmn['teach_me_id'],
			));

		// ログインユーザの情報を取得
		$result = $this->Account->find('first', array(
				'conditions' => array(
						'Account.id' => $this->Session->read('Auth.id'),
					),
			));
		$this->set('hostUser', $result['Account']);
	}



/**
 * register method
 *
 * @return void
 */
	public function register() {

		$rcvData = $this->Session->read('newSmn')['Seminar'];

		/*** データ整形 ***/
		// 開催日時
		$date = $rcvData['date'];
		$start = array(sprintf('%02d', $rcvData['startH']), sprintf('%02d', $rcvData['startM']), '00');
		$end = array(sprintf('%02d', $rcvData['endH']), sprintf('%02d', $rcvData['endM']), '00');
		$start = implode(':', $start);
		$end = implode(':', $end);
		$start = $date . ' ' . $start;
		$end = $date . ' ' . $end;
		// 予約期限
		$rsvLimDate = $rcvData['reservation_limit_d'];
		$rsvLim = array(sprintf('%02d', $rcvData['reservation_limit_h']), sprintf('%02d', $rcvData['reservation_limit_m']), '00');
		$rsvLim = implode(':', $rsvLim);
		$rsvLim = $rsvLimDate . ' ' . $rsvLim;

		// セミナー画像の整形処理
		$seminarImgId = str_replace(SMN_IMG_PATH, '', $rcvData['seminar_img_id']);
		$seminarImgId = str_replace(substr($seminarImgId, -4), '', $seminarImgId);


		$data = array(
				'Seminar' => array(
						'seminar_image_id' => +$seminarImgId,
						'name' => $rcvData['name'],
						'reservation_limit' => $rsvLim,
						'place' => $rcvData['place'],
						'account_id' => +$this->Session->read('Auth.id'),
						'upper_limit' => +$rcvData['upper_limit'],
						'start' => $start,
						'end' => $end,
						'description' => $rcvData['description'],
						'teach_me_id' => $rcvData['teach_me_id'],
					),
			);

		// 勉強会登録処理
		if (!$this->Seminar->save($data)) die('保存失敗');

		// 登録完了後、新規勉強会登録用のセッション削除
		$this->Session->delete('newSmn');
		$this->set('newSmn_id', $this->Seminar->getLastInsertID());
	}



/**
 * update method
 *
 * @return void
 */
	public function update() {

		$rcvData = $this->Session->read('editSmn')['Seminar'];

		$id = $rcvData['id'];

		/*** データ整形 ***/
		// 開催日時
		$date = $rcvData['date'];
		$start = array(sprintf('%02d', $rcvData['startH']), sprintf('%02d', $rcvData['startM']), '00');
		$end = array(sprintf('%02d', $rcvData['endH']), sprintf('%02d', $rcvData['endM']), '00');
		$start = implode(':', $start);
		$end = implode(':', $end);
		$start = $date . ' ' . $start;
		$end = $date . ' ' . $end;
		// 予約期限
		$rsvLimDate = $rcvData['reservation_limit_d'];
		$rsvLim = array(sprintf('%02d', $rcvData['reservation_limit_h']), sprintf('%02d', $rcvData['reservation_limit_m']), '00');
		$rsvLim = implode(':', $rsvLim);
		$rsvLim = $rsvLimDate . ' ' . $rsvLim;

		// セミナー画像
		$seminarImgId = $rcvData['seminar_img_id'];
		// セミナー画像の整形処理
		$seminarImgId = str_replace(SMN_IMG_PATH, '', $seminarImgId);
		$seminarImgId = str_replace(substr($seminarImgId, -4), '', $seminarImgId);


		$data = array(
			'Seminar.seminar_image_id' => +$seminarImgId,
			'Seminar.name' => "'" . Sanitize::escape($rcvData['name']) . "'",
			'Seminar.reservation_limit' => "'" . Sanitize::escape($rsvLim) . "'",
			'Seminar.place' => "'" . Sanitize::escape($rcvData['place']) . "'",
			'Seminar.account_id' => +$this->Session->read('Auth.id'),
			'Seminar.upper_limit' => +$rcvData['upper_limit'],
			'Seminar.start' => "'" . $start . "'",
			'Seminar.end' => "'" . $end . "'",
			'Seminar.description' => "'" . Sanitize::escape($rcvData['description']) . "'",
			);
		$conditions = array('Seminar.id' => $id);
		// 勉強会登録処理
		if (!$this->Seminar->updateAll($data, $conditions)) die('保存失敗');

		$this->set('smnId', $id);

		// 登録完了後、新規勉強会登録用のセッション削除
		$this->Session->delete('editSmn');

		// 詳細ページへジャンプ
		$this->redirect(ROOT_URL . $this->name . '/details?id=' . $id);
	}

/**
 * details method
 * 詳細ページ
 * @return void
 */
	public function details() {
		// 指定されたIDを元に勉強会情報を取得
		$id = $this->params['url']['id'];
		$options = array('conditions' => array('Seminar.' . $this->Seminar->primaryKey => $id));
		$seminar = $this->Seminar->find('first', $options);

		// データが見つからなかったらトップページへリダイレクト
		if(count($seminar) === 0) {
			return $this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
		}

		// データをViewへ渡す
		$this->set('seminar', $seminar);

		// タイトル設定
		$this->set('title_for_layout', $seminar['Seminar']['name']);

		//-- ユーザの種類を判定 --
		// デフォルトは勉強会に未参加
		$userType = 'NoJoin';

		// 作成者
		if($seminar['Seminar']['account_id'] === $this->Session->read('Auth.id')) {
			$userType = 'Manager';
		}
		// 勉強会に参加予定
		foreach($seminar['Participant'] as $participant) {
			if($participant['account_id'] === $this->Session->read('Auth.id')) {
				$userType = 'Join';
			}
		}

		// エラーメッセージ初期化
		$eTitle = '';
		$eContent = '';

		// ボタンが押された時の処理
		if($this->request->is('post')) {

			// 参加ボタンが押された時
			if(isset($this->request->data['Button']['join'])) {
				// セッション作成
				$this->Session->write('joinSmn.id', $id);
				// 参加ページへリダイレクト
				return $this->redirect(array('action' => 'join'));
			}

			// キャンセルボタンが押された時
			if(isset($this->request->data['Button']['cancel'])) {
				// セッション作成
				$this->Session->write('cancelSmn.id', $id);
				// キャンセルページへリダイレクト
				return $this->redirect(array('action' => 'cancel'));
			}

			// 編集ボタンが押された時
			if(isset($this->request->data['Button']['edit'])) {
				//-- ここに編集処理を書く --
			}

			// 質問投稿ボタンが押された時
			if(isset($this->request->data['Question'])) {
				//--バリデーションチェック--
				$validateResult = true;
				// タイトル
				$title   = $this->request->data('Question.title');
				if ($title === '') {
					$eTitle = '何も入力されていません';
					$validateResult = false;
				} else if (!preg_match('/.{1,20}/', $title)) {
					$eTitle = '入力された文字列が長すぎます';
					$validateResult = false;
				}
				// 内容
				$content = $this->request->data('Question.content');
				if ($content === '') {
					$eContent = '何も入力されていません';
					$validateResult = false;
				} else if (!preg_match('/.{1,20}/', $content)) {
					$eContent = '入力された文字列が長すぎます';
					$validateResult = false;
				}

				// questionsにデータ登録
				if($validateResult) {
					$param = array(
						'seminar_id' => $id,
						'title' => $title,
						'content' => $content,
						'account_id' => $this->Session->read('Auth.id'),
						);
					$this->Question->create(false);
					$this->Question->save($param);
					$this->redirect(array('action' => 'details',
									'?' => array('id' => $id)));
				}
			}
		}
		// Viewにデータを渡す
		$this->set(array(
				'eTitle' => $eTitle,
				'eContent' => $eContent,
				'userType' => $userType,
				'smnID' => $id,
				));


		//----- モバイルブラウザか判断 -----
		if ((strpos( env('HTTP_USER_AGENT'), 'Phone')) || (strpos( env('HTTP_USER_AGENT'), 'Android'))) {
			$this->layout = 'mb_default';
			return $this->render('mb_' . $this->action);
		}
	}

/**
 * join method
 * 参加確認ページ
 * @return void
 */
	public function join() {
		// セッションから勉強会IDを取得
	   	if($this->Session->check('joinSmn')) {
	   		$id = $this->Session->read('joinSmn.id');
		}
		else {
			// 無い場合はトップへリダイレクト
			return $this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
		}

		// 勉強会情報を取得
		$options = array('conditions' => array('Seminar.' . $this->Seminar->primaryKey => $id));
		$seminar = $this->Seminar->find('first', $options);

		// データが見つからなかったらトップページへリダイレクト
		if(count($seminar) === 0) {
			return $this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
		}

		// データをViewへ渡す
		$this->set('seminar', $seminar);

		// タイトル設定
		$this->set('title_for_layout', $seminar['Seminar']['name']);

		// ボタンが押された時の処理
		if($this->request->is('post')) {

			// 参加ボタンが押された時
			/*
			if(isset($this->request->data['join'])) {
			*/
				// Participantsにデータ登録
				$param = array(
					'seminar_id' => $id,
					'account_id' => $this->Session->read('Auth.id'),
					'feedbacked' => 0
					);
				$this->Participant->create(false);
				$this->Participant->save($param);

				//*******************************
				// 参加申請完了メール送
				//*******************************
				$email = new CakeEmail('sakura');
				$email->to($this->Session->read('Auth.email'));
				$email->subject('勉強会参加登録完了のおしらせ');
				$email->emailFormat('text');
				$email->template('participated');
				$email->viewVars(
					array(
						'sem_name' => $seminar['Seminar']['name'],
						'host' => $seminar['Account']['last_name'] . $seminar['Account']['first_name'],
						'date' => $seminar['Seminar']['start'],
						'place' => $seminar['Seminar']['place'],
					)
				);
				$email->send();

				// セッション削除
				$this->Session->delete('joinSmn');

				// 詳細ページへリダイレクト
				return $this->redirect(array('action' => 'details', '?' => array('id' => $id)));
			/*
			}
			*/
		}

		//----- モバイルブラウザか判断 -----
		if ((strpos( env('HTTP_USER_AGENT'), 'Phone')) || (strpos( env('HTTP_USER_AGENT'), 'Android'))) {
			$this->layout = 'mb_default';
			return $this->render('mb_' . $this->action);
		}
	}

/**
 * cancel method
 * 参加キャンセルページ
 * @return void
 */
	public function cancel() {
		// セッションから勉強会IDを取得
	   	if($this->Session->check('cancelSmn')) {
	   		$id = $this->Session->read('cancelSmn.id');
		}
		else {
			// 無い場合はトップへリダイレクト
			return $this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
		}

		// 勉強会情報を取得
		$options = array('conditions' => array('Seminar.' . $this->Seminar->primaryKey => $id));
		$seminar = $this->Seminar->find('first', $options);

		// データが見つからなかったらトップページへリダイレクト
		if(count($seminar) === 0) {
			return $this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
		}

		// データをViewへ渡す
		$this->set('seminar', $seminar);

		// タイトル設定
		$this->set('title_for_layout', $seminar['Seminar']['name']);

		// ボタンが押された時の処理
		if($this->request->is('post')) {

			// キャンセルボタンが押された時
			/*
			if(isset($this->request->data['cancel'])) {
			*/
				// Participantsのレコード削除
				$param = array(
					'seminar_id' => $id,
					'account_id' => $this->Session->read('Auth.id'));
				$deleteRecord = $this->Participant->find('first', $options);
				$this->Participant->id = $deleteRecord['Participant']['id'];
				$this->Participant->delete();

				// セッション削除
				$this->Session->delete('cancelSmn');

				// 詳細ページへリダイレクト
				return $this->redirect(array('action' => 'details', '?' => array('id' => $id)));
			/*
			}
			*/
		}

		//----- モバイルブラウザか判断 -----
		if ((strpos( env('HTTP_USER_AGENT'), 'Phone')) || (strpos( env('HTTP_USER_AGENT'), 'Android'))) {
			$this->layout = 'mb_default';
			return $this->render('mb_' . $this->action);
		}
	}

/**
 * feedback method
 * フィードバックページ
 * @return void
 */
	public function feedback() {
		// ボタンが押された時の処理
		if($this->request->is('post')) {
			// participantsのfeedbackedフラグを立てる
			$param = array('feedbacked' => 1);
			$conditions = array('Participant.id' => $this->Session->read('participant')['Participant']['id']);
			$this->Participant->updateAll($param, $conditions);

			// セッション削除
			$this->Session->delete('participant');

			// トップページへリダイレクト
			return $this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
		}

		// セッションが無い場合はTOPへリダイレクト
		if(!$this->Session->check('participant')) {
			return $this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
		}

		// 勉強会情報を取得
		$options = array('conditions' => array('Seminar.' . $this->Seminar->primaryKey => $this->Session->read('participant')['Seminar']['id']));
		$seminar = $this->Seminar->find('first', $options);
		$this->set('seminar', $seminar);

		//----- モバイルブラウザか判断 -----
		if ((strpos( env('HTTP_USER_AGENT'), 'Phone')) || (strpos( env('HTTP_USER_AGENT'), 'Android'))) {
			$this->layout = 'mb_default';
			return $this->render('mb_' . $this->action);
		}
	}

/**
 * gj method
 * ajaxでgjカウンタを増やす
 * @return void
 */
	public function gj() {
		// 直接アクセスの場合はTOPへリダイレクト
		if($this->request->is('get')) {
			return $this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
		}
		// Ajax処理
		if($this->request->is('ajax')) {
			// 勉強会情報を取得
			$options = array(
				'conditions' => array('Seminar.id' => $this->request->data['seminar_id']),
				);
			$seminar = $this->Seminar->find('first', $options);

			// GJを加算
			$param = array('gj' => $seminar['Seminar']['gj'] + 1);
			$conditions = $options['conditions'];

			if($this->Seminar->updateAll($param, $conditions)) {
				$response = array('result' => true);
			} else {
				$response = array('result' => false);
			}

			// 結果を返す
			$this->header('Content-Type: application/json');
			echo json_encode($response);
			exit();
		}
	}

/**
 * resolve method
 * ajaxでme_toosを削除
 * @return void
 */
	public function resolve() {
		// 直接アクセスの場合はTOPへリダイレクト
		if($this->request->is('get')) {
			return $this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
		}
		// Ajax処理
		if($this->request->is('ajax')) {

			// me_toosを削除
			$options = array('conditions' => array(
				'MeToo.teach_me_id' => $this->request->data['teach_me_id'], 'MeToo.account_id' => $this->Session->read('Auth.id')));
			$metoo = $this->MeToo->find('first', $options);

			$this->MeToo->id = $metoo['MeToo']['id'];
			$this->MeToo->delete();

			// me_toosが0件になったらニーズを削除
			$options = array(
				'conditions' => array(
					'MeToo.teach_me_id' => $this->request->data['teach_me_id'],
				));
			$metoos = $this->MeToo->find('first', $options);
			if(count($metoos) === 0) {
				$this->TeachMe->id = $this->request->data['teach_me_id'];
				$this->TeachMe->delete();
			}

			// 結果を返す
			$response = array('result' => true);
			$this->header('Content-Type: application/json');
			echo json_encode($response);
			exit();
		}
	}

/**
 * suspendConfirm method
 * 勉強会中止確認
 * @return void
 */
	public function suspendInput() {

		$msg = '';
		$smnId = '';
		$data = null;
		if (isset($this->request->data['Seminar'])) {

			// セミナー情報取得
			$data = $this->Seminar->find('first', array('conditions' => array('Seminar.id' => $this->request->data['Seminar']['id'])));
			$data['Seminar']['suspend_dsc'] = $this->request->data['Seminar']['suspend_dsc'];

			// バリデーション
			$result = $this->Seminar->suspendCfValidate($this->request->data);

			if ($result['result']) {

				// 正常データだった場合

				$this->Session->write('suspend', $data);
				$this->redirect(array('action' => 'suspendConfirm'));
				exit();
			}

			// バリデーション失敗時
			$msg = $result['msg'];

			$this->set('seminar', $data);

		} else if ($this->Session->check('suspend')) {

			// 戻る処理で戻ってきた場合
			$data = $this->Session->read('suspend');
			$this->Session->delete('suspend');

			// データをViewへ渡す
			$this->set('seminar', $data);

		} else if ($this->request->is('get')) {
			// 初めてこのページに来たとき

			if (!isset($this->request->query['id'])) $this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
			$smnId = $this->request->query['id'];
			if (!$smnId) {
				$this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
			}

			// 中止にする権限があるのか判断
			$userId = $this->Session->read('Auth.id');
			$data = $this->Seminar->find('first', array('conditions' => array(
				'Seminar.id' => $smnId,
				)));
			if ($data['Account']['id'] != $userId) {
				// 不正アクセスの場合
				$this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
			}

			// データをViewへ渡す
			$this->set('seminar', $data);
		}

		$this->request->data = $data;
		$this->set('msg', $msg);
	}

	/**
	 * details method
	 * 勉強会中止処理
	 * @return void
	 */
	public function suspendConfirm() {
		if (!$this->Session->check('suspend')) $this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
		$this->set('data', $this->Session->read('suspend'));

		// データをViewへ渡す
		$this->set('seminar', $this->Session->read('suspend'));
	}

	/**
	 * details method
	 * 勉強会中止処理
	 * @return void
	 */
	public function suspend() {
		if (!$this->Session->check('suspend')) {
			$this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
		}

		// 勉強会を中止する処理
		$rcvData = $this->Session->read('suspend');
		$data = array('Seminar' => $rcvData['Seminar']);
		$data['Seminar']['suspended'] = 1;
		$this->Seminar->save($data);

		// 参加者メールアドレスを取得
		$participants = $this->Participant->find('all', array(
			'conditions' => array(
				'Participant.seminar_id' => $this->Session->read('suspend')['Seminar']['id']
			),
		));
		$participantsEmails = array();
		for ($i=0; $i<count($participants); $i++) {
			$participantsEmails[] = $participants[$i]['Account']['mailaddress'];
		}

		//*******************************
		// 参加者への中止通知メール送信処理
		//*******************************
		if (count($participantsEmails) > 0) {
			$email = new CakeEmail('sakura');
			$email->to($this->Session->read('Auth.email'));
			$email->bcc($participantsEmails);
			$email->subject('【重要】勉強会中止のおしらせ');
			$email->emailFormat('text');
			$email->template('suspended');
			$email->viewVars(
				array(
					'sem_name' => $seminar['Seminar']['name'],
					'host' => $seminar['Account']['last_name'] . $seminar['Account']['first_name'],
					'date' => $seminar['Seminar']['start'],
					'place' => $seminar['Seminar']['place'],
					'suspend_dsc' => $seminar['Seminar']['suspend_dsc'],
				)
			);
			$email->send();
		}

		// 中止処理Session削除
		$this->Session->delete('suspend');
	}
}
