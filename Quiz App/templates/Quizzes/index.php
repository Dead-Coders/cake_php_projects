<?php
/**
 * @var \App\View\AppView $this
 */
?>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col"><?= __('Name')?></th>
        <th scope="col"><?= __('Actions')?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($quizzes as $quiz):?>
    <tr>
        <td><?= h($quiz->name)?></td>
        <td><?= $this->Html->link(__('Try'), [
            'action' => 'view',
            $quiz->_id,
        ])?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
