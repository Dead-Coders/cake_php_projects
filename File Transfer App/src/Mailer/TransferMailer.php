<?php
declare(strict_types=1);

namespace App\Mailer;

use App\Model\Entity\Transfer;
use Cake\Mailer\Mailer;
use Cake\Utility\Security;

/**
 * Transfer mailer.
 */
class TransferMailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static $name = 'Transfer';

    /**
     * @param Transfer $transfer
     * @param array|\ArrayAccess|\Cake\ORM\Entity $identity
     */
    public function uploaded(Transfer $transfer, $identity)
    {
        $this->setTo($transfer->email_to)
            ->setEmailFormat('html')
            ->setSubject(
                __('{0} sent you files via EasyTransfer', $identity['email'])
            )
            ->viewBuilder()
            ->setVar('transfer', $transfer)
            ->setVar('emailFrom', $identity['email']);
    }
}
