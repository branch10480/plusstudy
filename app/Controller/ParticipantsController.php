<?php
App::uses('AppController', 'Controller');
/**
 * Participants Controller
 *
 * @property Participant $Participant
 * @property PaginatorComponent $Paginator
 */
class ParticipantsController extends AppController {

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
		$this->Participant->recursive = 0;
		$this->set('participants', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Participant->exists($id)) {
			throw new NotFoundException(__('Invalid participant'));
		}
		$options = array('conditions' => array('Participant.' . $this->Participant->primaryKey => $id));
		$this->set('participant', $this->Participant->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Participant->create();
			if ($this->Participant->save($this->request->data)) {
				$this->Session->setFlash(__('The participant has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participant could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->Participant->Account->find('list');
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
		if (!$this->Participant->exists($id)) {
			throw new NotFoundException(__('Invalid participant'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Participant->save($this->request->data)) {
				$this->Session->setFlash(__('The participant has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The participant could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Participant.' . $this->Participant->primaryKey => $id));
			$this->request->data = $this->Participant->find('first', $options);
		}
		$accounts = $this->Participant->Account->find('list');
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
		$this->Participant->id = $id;
		if (!$this->Participant->exists()) {
			throw new NotFoundException(__('Invalid participant'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Participant->delete()) {
			$this->Session->setFlash(__('The participant has been deleted.'));
		} else {
			$this->Session->setFlash(__('The participant could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
