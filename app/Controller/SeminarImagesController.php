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
	public $components = array('Paginator');

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
