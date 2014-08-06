<?php
App::uses('AppController', 'Controller');
/**
 * MeToos Controller
 *
 * @property MeToo $MeToo
 * @property PaginatorComponent $Paginator
 */
class MeToosController extends AppController {

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
		$this->MeToo->recursive = 0;
		$this->set('meToos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MeToo->exists($id)) {
			throw new NotFoundException(__('Invalid me too'));
		}
		$options = array('conditions' => array('MeToo.' . $this->MeToo->primaryKey => $id));
		$this->set('meToo', $this->MeToo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MeToo->create();
			if ($this->MeToo->save($this->request->data)) {
				$this->Session->setFlash(__('The me too has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The me too could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->MeToo->Account->find('list');
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
		if (!$this->MeToo->exists($id)) {
			throw new NotFoundException(__('Invalid me too'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MeToo->save($this->request->data)) {
				$this->Session->setFlash(__('The me too has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The me too could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MeToo.' . $this->MeToo->primaryKey => $id));
			$this->request->data = $this->MeToo->find('first', $options);
		}
		$accounts = $this->MeToo->Account->find('list');
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
		$this->MeToo->id = $id;
		if (!$this->MeToo->exists()) {
			throw new NotFoundException(__('Invalid me too'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MeToo->delete()) {
			$this->Session->setFlash(__('The me too has been deleted.'));
		} else {
			$this->Session->setFlash(__('The me too could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
