<?php
App::uses('AppController', 'Controller');
/**
 * Licenses Controller
 *
 * @property License $License
 * @property PaginatorComponent $Paginator
 */
class LicensesController extends AppController {

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
		$this->License->recursive = 0;
		$this->set('licenses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->License->exists($id)) {
			throw new NotFoundException(__('Invalid license'));
		}
		$options = array('conditions' => array('License.' . $this->License->primaryKey => $id));
		$this->set('license', $this->License->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->License->create();
			if ($this->License->save($this->request->data)) {
				$this->Session->setFlash(__('The license has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The license could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->License->exists($id)) {
			throw new NotFoundException(__('Invalid license'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->License->save($this->request->data)) {
				$this->Session->setFlash(__('The license has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The license could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('License.' . $this->License->primaryKey => $id));
			$this->request->data = $this->License->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->License->id = $id;
		if (!$this->License->exists()) {
			throw new NotFoundException(__('Invalid license'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->License->delete()) {
			$this->Session->setFlash(__('The license has been deleted.'));
		} else {
			$this->Session->setFlash(__('The license could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
