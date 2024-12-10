<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Medals Controller
 *
 * @property \App\Model\Table\MedalsTable $Medals
 * @method \App\Model\Entity\Medal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MedalsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sports', 'Countries'],
        ];
        $medals = $this->paginate($this->Medals);

        $this->set(compact('medals'));
    }

    /**
     * View method
     *
     * @param string|null $id Medal id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $medal = $this->Medals->get($id, [
            'contain' => ['Sports', 'Countries'],
        ]);

        $this->set(compact('medal'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $medal = $this->Medals->newEmptyEntity();
        if ($this->request->is('post')) {
            $medal = $this->Medals->patchEntity($medal, $this->request->getData());
            if ($this->Medals->save($medal)) {
                $this->Flash->success(__('The medal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medal could not be saved. Please, try again.'));
        }
        $sports = $this->Medals->Sports->find('list');
        $countries = $this->Medals->Countries->find('list');
        $types = $this->Medals->getTypeList();
        $this->set(compact('medal', 'sports', 'countries', 'types'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Medal id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $medal = $this->Medals->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medal = $this->Medals->patchEntity($medal, $this->request->getData());
            if ($this->Medals->save($medal)) {
                $this->Flash->success(__('The medal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medal could not be saved. Please, try again.'));
        }
        $sports = $this->Medals->Sports->find('list');
        $countries = $this->Medals->Countries->find('list');
        $types = $this->Medals->getTypeList();
        $this->set(compact('medal', 'sports', 'countries', 'types'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Medal id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $medal = $this->Medals->get($id);
        if ($this->Medals->delete($medal)) {
            $this->Flash->success(__('The medal has been deleted.'));
        } else {
            $this->Flash->error(__('The medal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
