<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Device;
use App\Mqtt\ClientBuilder;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Devices Model
 *
 * @property \App\Model\Table\DeviceGroupsTable&\Cake\ORM\Association\BelongsTo $DeviceGroups
 *
 * @method \App\Model\Entity\Device newEmptyEntity()
 * @method \App\Model\Entity\Device newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Device[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Device get($primaryKey, $options = [])
 * @method \App\Model\Entity\Device findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Device patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Device[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Device|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Device saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Device[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Device[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Device[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Device[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DevicesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('devices');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('DeviceGroups', [
            'foreignKey' => 'device_group_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->uuid('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('type')
            ->maxLength('type', 255)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->scalar('last_status')
            ->maxLength('last_status', 255)
            ->notEmptyString('last_status');

        return $validator;
    }

    /**
     * @param Event $event
     * @param Device $device
     */
    public function beforeSave(Event $event, Device $device)
    {
        if ($device->isNew() && empty($device->last_status)) {
            $device->last_status = Device::STATUS_N_A;
        }
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['device_group_id'], 'DeviceGroups'), ['errorField' => 'device_group_id']);
        $rules->add(function(Device $device) {
            $list = array_keys($this->getTypes());

            return in_array($device->type, $list);
        }, ['errorField' => 'type', 'message' => __('Invalid value for type')]);

        return $rules;
    }

    /**
     * @return array
     */
    public function getTypes(): array
    {
        return [
            Device::TYPE_AUDIO_SYSTEM => __('Audio System'),
            Device::TYPE_CURTAIN => __('Curtain'),
            Device::TYPE_DOOR => __('Door'),
            Device::TYPE_LIGHT_BULB => __('Light Bulb'),
            Device::TYPE_TV => __('TV'),
            Device::TYPE_WINDOW => __('Window'),
        ];
    }

    /**
     * @param Device $device
     * @param $status
     * @param bool $notify
     * @return bool
     */
    public function updateStatus(Device $device, $status, bool $notify = false): bool
    {
        if ($status !== Device::STATUS_ON) {
            $status = Device::STATUS_OFF;
        }
        $device->last_status = $status;

        $result = (bool)$this->save($device, ['checkRules' => false]);
        if (!$result || $notify === false) {
            return $result;
        }
        $this->notifyUpdate($device->id, $status);

        return $result;
    }

    /**
     * @param string $id
     * @param string $status
     * @throws \PhpMqtt\Client\Exceptions\ConfigurationInvalidException
     * @throws \PhpMqtt\Client\Exceptions\ConnectingToBrokerFailedException
     * @throws \PhpMqtt\Client\Exceptions\DataTransferException
     * @throws \PhpMqtt\Client\Exceptions\ProtocolNotSupportedException
     * @throws \PhpMqtt\Client\Exceptions\RepositoryException
     */
    public function notifyUpdate(string $id, $status): void
    {
        $mqtt = ClientBuilder::create();
        $mqtt->connect();
        $topic = Configure::read('MqttBroker.publishTopicPrefix') . $id;
        $mqtt->publish($topic, $status, 0);
        $mqtt->disconnect();
    }
}
