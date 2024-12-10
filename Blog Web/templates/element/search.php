<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="card mb-4">
    <div class="card-header">Search</div>
    <div class="card-body">
        <?= $this->Form->create(null, [
            'url' => ['action' => 'index'],
            'type' => 'get'
        ])?>
        <div class="input-group">
            <?= $this->Form->text('q', [
                'class' => 'form-control',
                'placeholder' => __('Enter search term...'),
                'aria-label' => __('Enter search term...'),
                'aria-describedby' => 'button-search',
                'value' => $this->request->getQuery('q'),
            ])?>
            <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
        </div>
        <?= $this->Form->end()?>
    </div>
</div>
