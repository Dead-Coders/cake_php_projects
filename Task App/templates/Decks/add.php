<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Deck $deck
 */
?>
<turbo-stream action="prepend" target="decks-list">
    <template>
        <?= $this->element('Decks/view', ['deck' => $deck, 'renderFlash' => false,])?>
    </template>
</turbo-stream>
