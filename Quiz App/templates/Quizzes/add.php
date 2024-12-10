<?php
/**
 * @var \App\View\AppView $this
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

<?= $this->Form->create(null)?>
<?= $this->Form->control('name', [
    'type' => 'text',
    'required' => true,
     'class' => 'form-control',
    'label' => [
        'class' => 'form-label',
    ],
])?>
<?php for ($key = 0; $key < $qtyQuestions; $key++):?>
    <div class="card mb-3">
        <div class="card-body">
        <h5><?= __('Question {0}', $key + 1)?></h5>
        <?= $this->Form->control("questions[$key].title", [
            'type' => 'text',
            'required' => true,
            'class' => 'form-control',
            'label' => [
                'class' => 'form-label',
            ],
        ])?>
        <?php for ($optionKey = 0; $optionKey < 4 ; $optionKey++):?>
            <?= $this->Form->control("questions.{$key}.options.{$optionKey}.text", [
                'type' => 'text',
                'required' => true,
                'class' => 'form-control',
                'label' => [
                    'class' => 'form-label',
                    'text' => __('Option {0}', $optionKey + 1),
                ],
            ])?>
        <?php endfor;?>
        <?= $this->Form->control("questions.$key.correct_option", [
            'required' => true,
            'class' => 'form-control',
            'options' => [
                0 => __('Option 1'),
                1 => __('Option 2'),
                2 => __('Option 3'),
                3 => __('Option 4'),
            ],
            'label' => [
                'class' => 'form-label',
                'text' => __('Correct Option'),
            ],
        ])?>
        </div>
    </div>
<?php endfor;?>
<?= $this->Form->submit(__('Save'), ['class' => 'btn btn-primary'])?>
<?= $this->Form->end()?>
