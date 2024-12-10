<?php
/**
 * @var \App\View\AppView $this
 * @var bool $renderFlash
 * @var \App\Model\Entity\Deck $deck
 */
?>
<turbo-frame id="tasks_desk_<?= $deck->id?>" class="col-sm-3  mb-3">
    <div class="card border-<?= h($deck->style)?>">
        <div class="card-header text-white bg-<?= h($deck->style)?>">
            <?= h($deck->name)?>
            <div class="float-end">
                <?= $this->Form->postButton(
                    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>',
                    [
                        'action' => 'delete',
                        $deck->id,
                    ],
                    [
                        'escapeTitle' => false, 'class' => 'btn',
                        'data-turbo-frame' => '_top',
                        'form' => [
                            'enctype' => 'text/vnd.turbo-stream.html',
                        ],
                    ]
                )?>
            </div>
        </div>
        <div class="card-body">
            <?= $renderFlash ? $this->Flash->render() : ''?>
            <?= $this->Form->create(null, [
                'url' => [
                    'controller' => 'Tasks',
                    'action' => 'add',
                    $deck->id,
                ]
            ]) ?>
            <?php
            echo $this->Form->control('name', [
                'class' => 'form-control',
                'placeholder' => __('New Task'),
                'label' => false,
                'value' => '',
            ]);
            ?>
            <div class="d-grid gap-2">
                <?= $this->Form->button(__('Create Task'), [
                    'class' => 'btn btn-primary',
                ]) ?>
            </div>

            <?= $this->Form->end() ?>
            <hr />
            <ul class="list-group">
                <?php foreach ($deck->tasks as $task):?>
                <li class="list-group-item d-flex justify-content-between align-items-start border-<?= h($deck->style)?>">
                    <div class="ms-2 me-auto">
                    <?php if ($task->completed):?>
                        <s><?= h($task->name)?></s>
                    <?php else:?>
                        <?= h($task->name)?>
                    <?php endif;?>
                    </div>
                    <?php if (!$task->completed):?>
                    <span class="badge bg-primary rounded-pill">
                        <?= $this->Form->postButton(
                            '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/></svg>',
                            [
                                'controller' => 'Tasks',
                                'action' => 'complete',
                                $task->id,
                            ],
                            ['escapeTitle' => false, 'class' => 'btn btn-complete',]
                        )?>
                    </span>
                    <?php endif;?>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</turbo-frame>
