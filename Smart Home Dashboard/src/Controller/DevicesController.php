<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Device;

/**
 * Devices Controller
 *
 * @property \App\Model\Table\DevicesTable $Devices
 * @method \App\Model\Entity\Device[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DevicesController extends AppController
{
    /**
     * Add method
     *
     * @param string $groupId
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($groupId)
    {
        $deviceGroup = $this->Devices->DeviceGroups->get($groupId);
        $device = $this->Devices->newEmptyEntity();
        $types = $this->Devices->getTypes();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['device_group_id'] = $deviceGroup->id;
            $device = $this->Devices->patchEntity($device, $data);
            if ($this->Devices->save($device)) {
                $this->Flash->success(__('The device has been saved.'));

                return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
            }
            $this->Flash->error(__('The device could not be saved. Please, try again.'));
        }
        $this->set(compact('device', 'types'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Device id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $device = $this->Devices->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $device = $this->Devices->patchEntity($device, $this->request->getData());
            if ($this->Devices->save($device)) {
                $this->Flash->success(__('The device has been saved.'));

                return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
            }
            $this->Flash->error(__('The device could not be saved. Please, try again.'));
        }
        $this->set(compact('device'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Device id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $device = $this->Devices->get($id);
        if ($this->Devices->delete($device)) {
            $this->Flash->success(__('The device has been deleted.'));
        } else {
            $this->Flash->error(__('The device could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
    }

    /**
     * @param string|null $id
     */
    public function updateStatus($id)
    {
        $this->request->allowMethod(['post', 'put']);
        $device = $this->Devices->get($id);
        $status = $this->request->getData('last_status');
        if ($this->Devices->updateStatus($device, $status, true)) {
            $this->Flash->success(__('The device status was updated.'));
        } else {
            $this->Flash->error(__('Coult not update the status'));
        }

        return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
    }
}
