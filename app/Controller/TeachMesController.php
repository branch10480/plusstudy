<?php
App::uses('AppController', 'Controller');
/**
 * TeachMes Controller
 *
 * @property TeachMe $TeachMe
 * @property PaginatorComponent $Paginator
 */
class TeachMesController extends AppController {

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
		$this->TeachMe->recursive = 0;
		$this->set('teachMes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TeachMe->exists($id)) {
			throw new NotFoundException(__('Invalid teach me'));
		}
		$options = array('conditions' => array('TeachMe.' . $this->TeachMe->primaryKey => $id));
		$this->set('teachMe', $this->TeachMe->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TeachMe->create();
			if ($this->TeachMe->save($this->request->data)) {
				$this->Session->setFlash(__('The teach me has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teach me could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->TeachMe->Account->find('list');
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
		if (!$this->TeachMe->exists($id)) {
			throw new NotFoundException(__('Invalid teach me'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TeachMe->save($this->request->data)) {
				$this->Session->setFlash(__('The teach me has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teach me could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TeachMe.' . $this->TeachMe->primaryKey => $id));
			$this->request->data = $this->TeachMe->find('first', $options);
		}
		$accounts = $this->TeachMe->Account->find('list');
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
		$this->TeachMe->id = $id;
		if (!$this->TeachMe->exists()) {
			throw new NotFoundException(__('Invalid teach me'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TeachMe->delete()) {
			$this->Session->setFlash(__('The teach me has been deleted.'));
		} else {
			$this->Session->setFlash(__('The teach me could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
