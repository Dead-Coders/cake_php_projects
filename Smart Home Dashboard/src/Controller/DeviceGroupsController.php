<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DeviceGroups Controller
 *
 * @property \App\Model\Table\DeviceGroupsTable $DeviceGroups
 * @method \App\Model\Entity\DeviceGroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DeviceGroupsController extends AppController
{
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $deviceGroup = $this->DeviceGroups->newEntity($this->request->getData());
        if ($this->DeviceGroups->save($deviceGroup)) {
            $this->Flash->success(__('The device group has been saved.'));
        } else {
            $this->Flash->error(__('The device group could not be saved. Please, try again.'));
        }
        return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Device Group id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deviceGroup = $this->DeviceGroups->get($id);
        if ($this->DeviceGroups->delete($deviceGroup)) {
            $this->Flash->success(__('The device group has been deleted.'));
        } else {
            $this->Flash->error(__('The device group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
    }
}
