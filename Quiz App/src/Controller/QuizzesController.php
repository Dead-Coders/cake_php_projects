<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Document\QuizzesCollection;

/**
 * Quizzes Controller
 *
 */
class QuizzesController extends AppController
{
    /**
     * @param QuizzesCollection $collection
     * @param string $id Quiz id
     */
    public function view(QuizzesCollection $collection, string $id)
    {
        $quiz = $collection->get($id);
        $this->set(compact('quiz'));
        if ($this->request->is(['post', 'put'])) {
            $quizResult = $collection->getResults(
                $quiz->questions,
                $this->request->getData('question')
            );
            $this->set(compact('quizResult'));
            $this->viewBuilder()->setTemplate('result');
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add(QuizzesCollection $collection)
    {
        if ($this->request->is('post')) {
            $collection->createOne($this->request->getData());
            $this->Flash->success(__('Quiz created'));

            return $this->redirect(['action' => 'index']);
        }
        $qtyQuestions = (int)$this->request->getQuery('quantity');
        if ($qtyQuestions < 1) {
            $this->viewBuilder()->setTemplate('chooseQuantity');
        }
        $this->set(compact('qtyQuestions'));
    }

    /**
     * @param QuizzesCollection $collection
     */
    public function index(QuizzesCollection $collection)
    {
        $quizzes = $collection->getAll();
        $this->set(compact('quizzes'));
    }
}
