<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->Form->create(null, ['type' => 'get'])?>
<div class="row g-3 align-items-center">
    <div class="col-auto">
        <?= $this->Html->link(
            __('New Contact'),
            ['action' => 'add'],
            ['class' => 'btn btn-primary mb-3']
        ) ?>
    </div>
    <div class="col-auto">
        <?= $this->Form->control('q', [
            'class' => 'form-control',
            'placeholder' => 'Search',
            'label' => false,
            'value' => $this->getRequest()->getQuery('q'),
        ])?>
    </div>
    <div class="col-auto">
        <?= $this->Form->submit(__('Search'), ['class' => 'btn btn-dark mb-3'])?>
    </div>
</div>
<?= $this->Form->end()?>
<hr />
