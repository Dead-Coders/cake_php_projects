<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */
?>
<div class="row">
    <div class="col-12">
        <div class="contacts form content">
            <?= $this->Form->create($contact, ['type' => 'file']) ?>
            <fieldset>
                <?php
                    echo $this->Form->control('name', [
                        'class' => 'form-control',
                        'label' => [
                            'class' => 'form-label',
                        ],
                    ]);
                    echo $this->Form->control('email', [
                        'class' => 'form-control',
                        'label' => [
                            'class' => 'form-label',
                        ],
                    ]);
                    echo $this->Form->control('phone', [
                        'class' => 'form-control',
                        'label' => [
                            'class' => 'form-label',
                        ],
                    ]);
                    echo $this->Form->control('twitter_username', [
                        'class' => 'form-control',
                        'label' => [
                            'class' => 'form-label',
                        ],
                    ]);
                    echo $this->Form->control('github_username', [
                        'class' => 'form-control',
                        'label' => [
                            'class' => 'form-label',
                        ],
                    ]);
                    echo $this->Form->control('photo', [
                        'type' => 'file',
                        'class' => 'form-control',
                        'label' => [
                            'class' => 'form-label',
                        ],
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
