<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Contact helper
 */
class ContactHelper extends Helper
{
    protected $helpers = ['Html'];
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Retrieve the avatar image tag
     *
     * @param \App\Model\Entity\Contact $contact
     *
     * @return string
     */
    public function avatar($contact): string
    {
        if (!empty($contact->photo)) {
            return $this->Html->image(
                '/files/Contacts/photo/' . $contact->photo,
                [
                    'class' => 'rounded',
                    'style' => 'width:80px;height:80px;',
                ]
            );
        }
        $url = 'https://www.gravatar.com/avatar/';
        return $this->Html->image(
            $url .md5($contact->email),
            [
                'class' => 'rounded',
            ]
        );
    }
}
