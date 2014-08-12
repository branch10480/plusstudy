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
	public $components = array('Paginator');





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
			} else if (!preg_match('/^[1-9][0-9]*$/', $upperLimit)) {
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

			echo '戻った！';

			var_dump($this->Session->read('newSmn'));

			if ($this->Session->check('newSmn')) {
				$this->set('Seminar', $this->Session->read('newSmn'));
				echo '通った';
			}
			// $smnName = $this->Session->read('newSmn.name');
			// $place = $this->Session->read('newSmn.place');
			// $upperLimit = $this->Session->read('newSmn.upperLimit');
			// $startDate = $this->Session->read('newSmn.startDate');
			// $startH = $this->Session->read('newSmn.startH');
			// $startM = $this->Session->read('newSmn.startM');
			// $endH = $this->Session->read('newSmn.endH');
			// $endM = $this->Session->read('newSmn.endM');
			// $rsvLimitDate = $this->Session->read('newSmn.rsvLimitDate');
			// $rsvLimitH = $this->Session->read('newSmn.rsvLimitH');
			// $rsvLimitM = $this->Session->read('newSmn.rsvLimitM');
			// $dsc = $this->Session->read('newSmn.dsc');

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
			));

		echo $this->referer() . '<br />';
		echo ROOT_URL;
	}




/**
 * newSmnConfirm method
 *
 * @return void
 */
	public function newSmnConfirm() {
		var_dump($this->Session->read('newSmn'));
		$this->Session->write('newSmn', $this->Session->read('newSmn'));
		var_dump($this->Session->read('newSmn'));
		// $this->Session->delete('newSmn');
	}




















// /**
//  * index method
//  *
//  * @return void
//  */
// 	public function index() {
// 		$this->Seminar->recursive = 0;
// 		$this->set('seminars', $this->Paginator->paginate());
// 	}

// /**
//  * view method
//  *
//  * @throws NotFoundException
//  * @param string $id
//  * @return void
//  */
// 	public function view($id = null) {
// 		if (!$this->Seminar->exists($id)) {
// 			throw new NotFoundException(__('Invalid seminar'));
// 		}
// 		$options = array('conditions' => array('Seminar.' . $this->Seminar->primaryKey => $id));
// 		$this->set('seminar', $this->Seminar->find('first', $options));
// 	}

// /**
//  * add method
//  *
//  * @return void
//  */
// 	public function add() {
// 		if ($this->request->is('post')) {
// 			$this->Seminar->create();
// 			if ($this->Seminar->save($this->request->data)) {
// 				$this->Session->setFlash(__('The seminar has been saved.'));
// 				return $this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Session->setFlash(__('The seminar could not be saved. Please, try again.'));
// 			}
// 		}
// 		$accounts = $this->Seminar->Account->find('list');
// 		$teachMes = $this->Seminar->TeachMe->find('list');
// 		$this->set(compact('accounts', 'teachMes'));
// 	}

// /**
//  * edit method
//  *
//  * @throws NotFoundException
//  * @param string $id
//  * @return void
//  */
// 	public function edit($id = null) {
// 		if (!$this->Seminar->exists($id)) {
// 			throw new NotFoundException(__('Invalid seminar'));
// 		}
// 		if ($this->request->is(array('post', 'put'))) {
// 			if ($this->Seminar->save($this->request->data)) {
// 				$this->Session->setFlash(__('The seminar has been saved.'));
// 				return $this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Session->setFlash(__('The seminar could not be saved. Please, try again.'));
// 			}
// 		} else {
// 			$options = array('conditions' => array('Seminar.' . $this->Seminar->primaryKey => $id));
// 			$this->request->data = $this->Seminar->find('first', $options);
// 		}
// 		$accounts = $this->Seminar->Account->find('list');
// 		$teachMes = $this->Seminar->TeachMe->find('list');
// 		$this->set(compact('accounts', 'teachMes'));
// 	}

// /**
//  * delete method
//  *
//  * @throws NotFoundException
//  * @param string $id
//  * @return void
//  */
// 	public function delete($id = null) {
// 		$this->Seminar->id = $id;
// 		if (!$this->Seminar->exists()) {
// 			throw new NotFoundException(__('Invalid seminar'));
// 		}
// 		$this->request->allowMethod('post', 'delete');
// 		if ($this->Seminar->delete()) {
// 			$this->Session->setFlash(__('The seminar has been deleted.'));
// 		} else {
// 			$this->Session->setFlash(__('The seminar could not be deleted. Please, try again.'));
// 		}
// 		return $this->redirect(array('action' => 'index'));
// 	}
}
