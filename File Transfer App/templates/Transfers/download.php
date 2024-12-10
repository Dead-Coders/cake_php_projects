<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transfer $transfer
 */
?>
<?php
 $this->Html->css(['floating-labels.css'], ['block' => true]);
 $this->assign('tb_footer', '<br />');
?>
<div class="form-signin">
    <div class="text-center mb-4">
        <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal"><?= __('Best way to transfer file')?></h1>
        <p><?= __('A file was sent to you')?></p>
    </div>
    <?= $this->Form->create($transfer, [
        'type' => 'file',
        'class' => 'form-signin',
        'templates' => [
            'inputContainer' =>'<div{{containerAttrs}} class="{{containerClass}}form-group {{type}}{{required}}">{{content}}</div>',
        ],
    ]) ?>
    <?= $this->Form->button(__('Download Now'), [
        'class' => 'btn btn-lg btn-primary btn-block',
    ]) ?>
    <?= $this->Form->end() ?>
</div>
