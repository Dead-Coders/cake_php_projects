<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transfer $transfer
 */
$url = $this->Url->build([
    'controller' => 'Transfers',
    'action' => 'download',
    $transfer->id,
    $transfer->security_key,
], [
    'fullBase' => true,
])
?>
<h3><?= __('{0} sent you a file', $emailFrom)?></h3>
<p>
    <strong><?= __('Download Link')?></strong><br />
    <?= $this->Html->link($url, $url, ['escapeTitle' => false])?>
</p>

