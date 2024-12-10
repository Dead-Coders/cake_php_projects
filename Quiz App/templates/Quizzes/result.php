<?php
/**
 * @var \App\View\AppView $this
 * @var \MongoDB\Model\BSONDocument $quiz
 * @var array $quizResult
 */
?>
<div class="card border-success p-5">
    <div class="card-body">
        <h3 class="card-title"><?= h($quiz->name)?></h3>
        <p class="card-text "><?= __(
                'You got {0} out of {1}',
                $quizResult['correctCount'],
                $quizResult['total']
        )?></p>
        <?= $this->Html->link(
            __('Try Again'),
            [
                'action' => 'view',
                $quiz->_id,
            ],
            ['class' => 'btn btn-success']
        )?>
    </div>
</div>
