<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Deck $newDeck
 * @var \App\Model\Entity\Deck[] $decks
 */
?>
<?= $this->Form->create($newDeck, [
    'url' => [
        'action' => 'add',
    ],
    'enctype' => 'text/vnd.turbo-stream.html',
]) ?>
<div class="row">
    <div class="col-sm-3">
    <?= $this->Form->control('name', [
        'class' => 'form-control',
        'label' => false,
        'placeholder' => __('New Deck Name'),
    ])?>
    </div>
    <div class="col-sm-3">
        <?= $this->Form->control('style', [
            'class' => 'form-control',
            'label' => false,
            'options' => [
                'primary' => 'primary',
                'secondary' => 'secondary',
                'success' => 'success',
                'danger' => 'danger',
                'warning' => 'warning',
                'info' => 'info',
            ],
            'empty' => __('Select a Style'),
        ]);
        ?>
    </div>
    <div class="col-sm-3">
        <?= $this->Form->button(__('Create New Deck'), [
            'class' => 'btn btn-primary',
        ]) ?>
    </div>
</div>
<hr />
<?= $this->Form->end() ?>
<div class="row" id="decks-list">
<?php foreach ($decks as $deck):?>
    <?= $this->element('Decks/view', ['deck' => $deck, 'renderFlash' => false,])?>
<?php endforeach;?>
</div>
