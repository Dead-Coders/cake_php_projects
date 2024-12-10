<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Deck $deck
 */
?>
<?= $this->element('Decks/view', ['deck' => $deck, 'renderFlash' => true,])?>
