<?php


namespace App\Mqtt;

use Cake\Core\Configure;
use PhpMqtt\Client\MqttClient;

class ClientBuilder
{
    /**
     * @return \PhpMqtt\Client\MqttClient
     * @throws \PhpMqtt\Client\Exceptions\ProtocolNotSupportedException
     */
    public static function create(): MqttClient
    {
        return new MqttClient(
            Configure::read('MqttBroker.host'),
            Configure::read('MqttBroker.port'),
            Configure::read('MqttBroker.client_id')
        );
    }

}
