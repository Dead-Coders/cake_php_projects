<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Device;
use Cake\Core\Configure;
use Cake\ORM\Query;

/**
 * DeviceGroups Controller
 *
 * @property \App\Model\Table\DeviceGroupsTable $DeviceGroups
 * @method \App\Model\Entity\DeviceGroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{
    /**
     * @inheritDoc
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('DeviceGroups');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $publishTopicPrefix = Configure::read('MqttBroker.publishTopicPrefix');
        $subscribeTopicPrefix = substr(Configure::read('MqttBroker.subscribeTopicFilter'), 0 , -1);
        $mqttMessages = [Device::STATUS_ON, Device::STATUS_OFF,];
        $deviceGroups = $this->DeviceGroups->find()
            ->contain(['Devices' => function(Query $query) {
                return $query->orderAsc('Devices.name');
            }])
            ->orderAsc('DeviceGroups.name')
            ->all();

        $this->set(compact('deviceGroups', 'publishTopicPrefix', 'subscribeTopicPrefix', 'mqttMessages'));
    }
}
