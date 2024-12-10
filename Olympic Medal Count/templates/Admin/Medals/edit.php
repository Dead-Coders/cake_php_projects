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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $medal->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $medal->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Medals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="medals form content">
            <?= $this->Form->create($medal) ?>
            <fieldset>
                <legend><?= __('Edit Medal') ?></legend>
                <?php
                    echo $this->Form->control('sport_id', ['options' => $sports]);
                    echo $this->Form->control('country_id', ['options' => $countries]);
                    echo $this->Form->control('event_name');
                    echo $this->Form->control('type');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
