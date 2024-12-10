<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message error" onclick="this.classList.add('hidden');"><?= $message ?></div>
<div class="container" style="margin-bottom: 5px;">
    <div class="notification is-danger">
        <?= $message ?>
    </div>
</div>
