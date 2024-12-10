<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transfer $transfer
 */

use Cake\Core\Configure;

?>
<?php
$this->Html->css(['floating-labels.css'], ['block' => true]);
$this->assign('tb_footer', '<br />');
?>
<div class="form-signin">
    <div class="text-center mb-4">
        <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal"><?= __('Login or Register')?></h1>
        <p><?= __d('cake_d_c/users', 'Please enter your username and password') ?></p>
    </div>
    <?= $this->Form->create(null, [
        'class' => 'form-signin',
        'templates' => [
            'inputContainer' =>'<div{{containerAttrs}} class="{{containerClass}}form-group {{type}}{{required}}">{{content}}</div>',
        ],
    ]) ?>
    <fieldset>
        <legend></legend>
        <?= $this->Form->control('username', ['label' => __d('cake_d_c/users', 'Username'), 'required' => true]) ?>
        <?= $this->Form->control('password', ['label' => __d('cake_d_c/users', 'Password'), 'required' => true]) ?>
        <?php
        if (Configure::read('Users.reCaptcha.login')) {
            echo $this->User->addReCaptcha();
        }
        if (Configure::read('Users.RememberMe.active')) {
            echo $this->Form->control(Configure::read('Users.Key.Data.rememberMe'), [
                'type' => 'checkbox',
                'label' => __d('cake_d_c/users', 'Remember me'),
                'checked' => Configure::read('Users.RememberMe.checked')
            ]);
        }
        ?>
        <?php
        $registrationActive = Configure::read('Users.Registration.active');
        if ($registrationActive) {
            echo $this->Html->link(__d('cake_d_c/users', 'Register'), ['action' => 'register']);
        }
        if (Configure::read('Users.Email.required')) {
            if ($registrationActive) {
                echo ' | ';
            }
            echo $this->Html->link(__d('cake_d_c/users', 'Reset Password'), ['action' => 'requestResetPassword']);
        }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Login'), [
        'class' => 'btn btn-lg btn-primary btn-block',
    ]) ?>
    <?= $this->Form->end() ?>
</div>
