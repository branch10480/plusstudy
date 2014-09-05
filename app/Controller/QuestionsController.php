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

		// エラーメッセージ初期化
		$eContent = '';

		// ボタンが押された時の処理
		if($this->request->is('post')) {
			// コメントボタンが押された時
			if(isset($this->request->data['comment'])) {
				//--バリデーションチェック--
				$validateResult = true;
				// 内容
				$content = $this->request->data('Comment.content');
				if ($content === '') {
					$eContent = '何も入力されていません';
					$validateResult = false;
				} else if (!preg_match('/.{1,20}/', $content)) {
					$eContent = '入力された文字列が長すぎます';
					$validateResult = false;
				}
				// questionsにデータ登録
				if($validateResult) {
					$param = array(
						'question_id' => $id,
						'content' => $content,
						'account_id' => $this->Session->read('Auth.id'),
						);
					$this->Comment->create();
					$this->Comment->save($param);
					$this->redirect(array('action' => 'index',
									'?' => array('id' => $id)));
				}
			}
		}
		// Viewにデータを渡す
		$this->set('eContent', $eContent);

	}
}