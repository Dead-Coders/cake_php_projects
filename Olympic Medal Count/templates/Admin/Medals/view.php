<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medal $medal
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Medal'), ['action' => 'edit', $medal->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Medal'), ['action' => 'delete', $medal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medal->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Medals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Medal'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="medals view content">
            <h3><?= h($medal->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sport') ?></th>
                    <td><?= $medal->has('sport') ? $this->Html->link($medal->sport->name, ['controller' => 'Sports', 'action' => 'view', $medal->sport->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= $medal->has('country') ? $this->Html->link($medal->country->name, ['controller' => 'Countries', 'action' => 'view', $medal->country->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Event Name') ?></th>
                    <td><?= h($medal->event_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($medal->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($medal->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
