<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medal[]|\Cake\Collection\CollectionInterface $medals
 */
?>
<div class="medals index content">
    <?= $this->Html->link(__('New Medal'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Medals') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('sport_id') ?></th>
                    <th><?= $this->Paginator->sort('country_id') ?></th>
                    <th><?= $this->Paginator->sort('event_name') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medals as $medal): ?>
                <tr>
                    <td><?= $this->Number->format($medal->id) ?></td>
                    <td><?= $medal->has('sport') ? $this->Html->link($medal->sport->name, ['controller' => 'Sports', 'action' => 'view', $medal->sport->id]) : '' ?></td>
                    <td><?= $medal->has('country') ? $this->Html->link($medal->country->name, ['controller' => 'Countries', 'action' => 'view', $medal->country->id]) : '' ?></td>
                    <td><?= h($medal->event_name) ?></td>
                    <td><?= h($medal->type) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $medal->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $medal->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $medal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medal->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
