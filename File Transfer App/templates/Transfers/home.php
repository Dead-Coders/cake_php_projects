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
        <h1 class="h3 mb-3 font-weight-normal"><?= __('Send Your File Easily')?></h1>
        <p>The quick and easier way to send files</p>
    </div>
    <?= $this->Form->create(null, [
        'class' => 'form-signin',
    ]) ?>
    <?= $this->Html->link(__('Login to Send File'), [
        'plugin' => 'CakeDC/Users',
        'controller' => 'Users',
        'action' => 'login',
    ], [
        'class' => 'btn btn-lg btn-primary btn-block',
    ])?>
    <?= $this->Form->end() ?>
</div>
