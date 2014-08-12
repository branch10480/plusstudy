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

		$validateResult = true;


		if ($this->referer() === ROOT_URL . 'Seminars') {
			// 自分自身から送信

			// $fileUrlArr = array();
			$smnName = $this->request->data['Seminar']['name'];
			$place = $this->request->data['Seminar']['name'];
			$upperLimit = $this->request->data['Seminar']['upper_limit'];
			$startDate = $this->request->data['Seminar']['date'];
			$startH = $this->request->data['Seminar']['startH'];
			$startM = $this->request->data['Seminar']['startM'];
			$endH = $this->request->data['Seminar']['endH'];
			$endM = $this->request->data['Seminar']['endM'];
			$rsvLimitDate = $this->request->data['Seminar']['endM'];
			$rsvLimitH = 0;
			$rsvLimitM = 0;
			$dsc = '';

			// バリデーションチェック
			if ($smnName === '') {
				$eSmnName = '何も入力されていません';
				$validateResult = false;
			} else if (!preg_match('/.{1, 20}/', $smnName)) {
				$eSmnName = '入力された文字列が長すぎます';
				$validateResult = false;
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
				// 'smnName' => $smnName,
				// 'place' => $place,
				// 'upperLimit' => $upperLimit,
				// 'startDate' => $startDate,
				// 'startH' => $startH,
				// 'startM' => $startM,
				// 'endH' => $endH,
				// 'endM' => $endM,
				// 'rsvLimitDate' => $rsvLimitDate,
			));
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
