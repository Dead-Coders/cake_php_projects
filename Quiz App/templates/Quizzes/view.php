<?php
/**
 * @var \App\View\AppView $this
 * @var \MongoDB\Model\BSONDocument $quiz
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
<h1 style="margin-bottom: 35px"><?= h($quiz->name)?></h1>
<?= $this->Form->create(null, ['id' => 'frmQuiz'])?>
<?php
$show = true;
foreach ($quiz->questions as $key => $question):?>
    <div id="questionCard<?= $key?>" class="card" <?= $show ? '' : 'style="display:none";'?>>
        <div class="card-body">
            <h5 class="card-title"><?= h($question->title)?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= __('Question {0}', $key + 1)?></h6>
            <?= $this->Form->control("question.$key", [
                'label' => false,
                'options' => collection($question->options)->extract('text')->toArray(),
                'type' => 'radio',
                'required' => true,
                'class' => 'form-check-input',
                'onclick' => sprintf('QuizzesHelper.onCheck(%s)', $key),
            ])?>
        </div>
    </div>
<h4></h4>

<?php
$show = false;
endforeach;?>
<?= $this->Form->end()?>
