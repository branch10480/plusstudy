<?php
App::uses('AppController', 'Controller');
/**
 * Questions Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 */
class QuestionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses = array('Question', 'Comment');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		// 指定されたIDを元に質問情報を取得
		$id = $this->params['url']['id'];
		$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
		$question = $this->Question->find('first', $options);
		$this->set('question', $question);

		// タイトル設定
		// 勉強会名 - 質問タイトル
		$this->set('title_for_layout', $question['Seminar']['name'] . ' - ' . $question['Question']['title']);

		// コメント情報を取得
		$options = array('conditions' => array('Comment.question_id' => $id));
		$comments = $this->Comment->find('all', $options);
		$this->set('comments', $comments);
	}
}