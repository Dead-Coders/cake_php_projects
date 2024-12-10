<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Polls Controller
 *
 * @property \App\Model\Table\PollsTable $Polls
 * @method \App\Model\Entity\Poll[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PollsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $polls = $this->paginate($this->Polls);
        $this->set(compact('polls'));
    }

    /**
     * View method
     *
     * @param string|null $id Poll id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $poll = $this->Polls->get($id, [
            'contain' => ['Options'],
        ]);
        $allResponses = collection($poll->options)
            ->sumOf('response_count');
        $showResult = (bool)$this->request->getQuery('showResult');

        $this->set(compact('poll', 'allResponses', 'showResult'));
    }

    /**
     * Vote action
     *
     * @param string $optionId Option id
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function vote($optionId)
    {
        $this->request->allowMethod(['post', 'put']);
        $option = $this->Polls->Options->get($optionId);
        $Table = $this->Polls->Options->Responses;
        $entity = $Table->newEntity([
            'option_id' => $option->id,
        ]);
        $Table->saveOrFail($entity);
        $this->Flash->success(__('Thanks for voting'));

        return $this->redirect([
            'action' => 'view',
            $option->poll_id,
            '?' => ['showResult' => 1],
        ]);
    }
}
