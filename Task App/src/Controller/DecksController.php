<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Decks Controller
 *
 * @property \App\Model\Table\DecksTable $Decks
 * @method \App\Model\Entity\Deck[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DecksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $decks = $this->Decks->getMainQuery($this->request->getAttribute('identity'))
            ->all();
        $newDeck = $this->Decks->newEmptyEntity();
        $this->set(compact('decks', 'newDeck'));
    }

    /**
     * View method
     *
     * @param string|int $id Deck id.
     *
     * @return \Cake\Http\Response|null display the deck
     */
    public function view($id)
    {
        $deck = $this->Decks->getMainQuery($this->request->getAttribute('identity'))
            ->where(['Decks.id' => $id])
            ->firstOrFail();
        $this->set(compact('deck'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deck = $this->Decks->newEmptyEntity();
        $this->request->allowMethod(['post', 'put']);
        $deck = $this->Decks->patchEntity($deck, $this->request->getData());
        $deck->user_id = $this->request->getAttribute('identity')['id'];
        if ($this->Decks->save($deck)) {
            $deck->tasks = [];
            $this->set(compact('deck'));
            $this->Flash->success(__('The deck has been saved.'));
            $this->prepareTurboStream();
        } else {
            $this->Flash->error(__('The deck could not be saved. Please, try again.'));

            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Deck id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete(string $id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deck = $this->Decks->find()
            ->where([
                'id' => $id,
                'user_id' => $this->request->getAttribute('identity')['id'],
            ])
            ->firstOrFail();

        if ($this->Decks->delete($deck)) {
            $this->Flash->success(__('The deck has been deleted.'));
            $this->set(compact('id'));
            $this->prepareTurboStream();
        } else {
            $this->Flash->error(__('The deck could not be deleted. Please, try again.'));

            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * @return void
     */
    protected function prepareTurboStream(): void
    {
        $this->viewBuilder()->setLayout('stream');
        $this->response = $this->response->withHeader('Content-Type', 'text/vnd.turbo-stream.html');
    }
}
