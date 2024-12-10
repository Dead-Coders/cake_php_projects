<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact[]|\Cake\Collection\CollectionInterface $contacts
 */
?>
<div class="contacts index content">
    <?= $this->element('header')?>
    <div class="accordion accordion-flush" id="accordionContacts">
        <?php foreach ($contacts as $contact): ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading<?= h($contact->id)?>">
                    <button class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse<?= h($contact->id)?>"
                            aria-expanded="false"
                            aria-controls="flush-collapse<?= h($contact->id)?>">
                        <?= $this->Contact->avatar($contact)?>
                        <span class="m-1 font-monospace">
                        <?= h($contact->name) ?>
                        </span>
                    </button>
                </h2>
                <div id="flush-collapse<?= h($contact->id)?>"
                     class="accordion-collapse collapse"
                     aria-labelledby="flush-heading<?= h($contact->id)?>"
                     data-bs-parent="#accordionContacts">
                    <div class="accordion-body">
                        <dl>
                            <dt><?= __('E-mail')?></dt>
                            <dd><?= h($contact->email)?></dd>

                            <dt><?= __('Phone')?></dt>
                            <dd><?= h($contact->phone)?></dd>

                            <dt><?= __('Twitter')?></dt>
                            <dd><?= h($contact->twitter_username)?></dd>

                            <dt><?= __('Github')?></dt>
                            <dd><?= h($contact->github_username)?></dd>
                        </dl>

                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contact->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?>
                </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="paginator mt-3">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
