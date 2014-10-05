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

		// データが見つからなかったらトップページへリダイレクト
		if(count($question) === 0) {
			return $this->redirect(array('controller' => 'Accounts', 'action' => 'index'));
		}

		// タイトル設定
		// 勉強会名 - 質問タイトル
		$this->set('title_for_layout', $question['Seminar']['name'] . ' - ' . $question['Question']['title']);

		// コメント情報を取得
		$options = array('conditions' => array('Comment.question_id' => $id));
		$comments = $this->Comment->find('all', $options);
		$this->set('comments', $comments);

		// Viewにデータを渡す
		$this->set('question', $question);


		//----- モバイルブラウザか判断 -----
		if ((strpos( env('HTTP_USER_AGENT'), 'Phone')) || (strpos( env('HTTP_USER_AGENT'), 'Android'))) {
			$this->layout = 'mb_default';
			return $this->render('mb_' . $this->action);
		}
	}
}