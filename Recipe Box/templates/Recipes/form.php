<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */
?>
<div class="row">
    <div class="col-12">
        <div class="contacts form content">
            <?= $this->Form->create($form) ?>
            <fieldset>
                <?php
                echo $this->Form->control('name', [
                    'class' => 'form-control',
                    'label' => [
                        'class' => 'form-label',
                    ],
                ]);
                echo $this->Form->control('description', [
                    'class' => 'form-control',
                    'type' => 'textarea',
                    'label' => [
                        'class' => 'form-label',
                    ],
                ]);
                echo $this->Form->control('photo_url', [
                    'class' => 'form-control',
                    'label' => [
                        'class' => 'form-label',
                    ],
                ]);
                echo $this->Form->control('prep', [
                    'class' => 'form-control',
                    'label' => [
                        'class' => 'form-label',
                    ],
                ]);
                echo $this->Form->control('cook', [
                    'class' => 'form-control',
                    'label' => [
                        'class' => 'form-label',
                    ],
                ]);
                echo $this->Form->control('servings', [
                    'class' => 'form-control',
                    'type' => 'number',
                    'step' => 1,
                    'min' => 1,
                    'label' => [
                        'class' => 'form-label',
                    ],
                ]);
                echo $this->Form->control('ingredients', [
                    'class' => 'form-control',
                    'type' => 'textarea',
                    'label' => [
                        'class' => 'form-label',
                    ],
                ])
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
