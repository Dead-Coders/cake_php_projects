<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <?= $this->Html->link(
            __('The Awesome Blog'),
            ['action' => 'index'],
            ['class' => 'navbar-brand']
        )?>
    </div>
</nav>
