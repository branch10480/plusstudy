<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
 */
class CommentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if($this->request->is('post')) {
			if($this->Comment->save($this->request->data)) {
				$this->redirect(array('controller' => 'questions' ,'action' => 'index', $this->data['Comment']['question_id']));
			} else {
				// エラー
			}
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id) {
	}
}
