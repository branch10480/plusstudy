<?php
App::uses('AppController', 'Controller');
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
	public $uses = array('Seminar', 'Question');




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
 * index method
 *
 * @return void
 */
	public function index() {

		$this->set('title_for_layout', '新規勉強会登録');


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



		if ($this->referer() === ROOT_URL . 'Seminars' || $this->referer() === ROOT_URL . 'Seminars/') {
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
			$minArray[] = $i;
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
			));
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

		// セミナー画像
		$seminarImgId = 1;

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
					),
			);

		// 勉強会登録処理
		if (!$this->Seminar->save($data)) die('保存失敗');

		// 登録完了後、新規勉強会登録用のセッション削除
		$this->Session->delete('newSmn');
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

		// エラーメッセージ初期化
		$eTitle = '';
		$eContent = '';

		// ボタンが押された時の処理
		if($this->request->is('post')) {
			// 質問投稿ボタンが押された時
			if(isset($this->request->data['question'])) {
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
				));
	}

/**
 * join method
 * 参加確認ページ
 * @return void
 */
	public function join() {
	}
}
