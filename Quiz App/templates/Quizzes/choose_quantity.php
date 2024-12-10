<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?php
$this->Html->script(['quizzes.js'], ['block' => true]);
?>
<style>
    .list-group-item:hover, .list-group-item:active {
        z-index: 2;
        color: #fff;
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
    body {
        background: #c5e1f9;
    }
    h1 {
        color:#45586b;
    }
</style>

<?= $this->Form->create(null, ['type' => 'get'])?>
<?= $this->Form->control('quantity', [
    'type' => 'number',
    'min' => 1,
    'step' => 1,
    'required' => true,
    'class' => 'form-control',
    'label' => [
        'class' => 'form-label',
        'text' => __('Quantity of Questions'),
    ],
])?>
<?= $this->Form->submit(__('Continue'), ['class' => 'btn btn-primary'])?>
<?= $this->Form->end()?>
