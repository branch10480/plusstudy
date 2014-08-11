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

		$minArray = array();
		for ($i=0; $i<60; $i+=5) {
			$minArray[] = $i;
		}
		$hArray = array();
		for ($i=0; $i<24; $i++) {
			$hArray[] = $i;
		}

		$this->set(array(
				'minArray' => $minArray,
				'hArray' => $hArray,
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
