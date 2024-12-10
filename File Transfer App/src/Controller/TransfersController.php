<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\MailerAwareTrait;

/**
 * Transfers Controller
 *
 * @property \App\Model\Table\TransfersTable $Transfers
 * @method \App\Model\Entity\Transfer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransfersController extends AppController
{
    use MailerAwareTrait;

    /**
     * @return \Cake\Http\Response|null
     */
    public function home()
    {
        if ($this->request->getAttribute('identity')) {
            return $this->redirect(['action' => 'add']);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transfer = $this->Transfers->newEmptyEntity();
        if ($this->request->is('post')) {
            $transfer = $this->Transfers->patchEntity($transfer, $this->request->getData());
            $identity = $this->request->getAttribute('identity');
            $transfer->user_id = $identity['id'];
            if ($this->Transfers->save($transfer)) {
                $this->getMailer('Transfer')->send('uploaded', [
                    $transfer,
                    $identity,
                ]);
                $this->Flash->success(__('We sent the file to email {0}', $transfer->email_to));
            } else {
                $this->Flash->error(__('The transfer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('transfer'));
    }

    /**
     * @param string $id
     * @param string $securityKey
     */
    public function download(string $id, string $securityKey)
    {
        $transfer = $this->Transfers->find()
            ->where([
                'id' => $id,
                'security_key' => $securityKey,
            ])
            ->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $file = ROOT . DS . 'files' . DS . $transfer->user_id . DS . $transfer->file;

            return $this->response->withFile($file)
                ->withDownload($transfer->file);
        }
        $this->set(compact('transfer'));
    }
}
