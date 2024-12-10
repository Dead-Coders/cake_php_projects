<div class="row">
    <?php foreach ($recipes as $recipe):?>
    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
        <div class="card">
            <?= $this->Html->image($recipe->photo_url, [
                'class' => "card-img-top"
            ])?>
            <div class="card-body">
                <h5 class="card-title"><?= h($recipe->name)?></h5>
                <p class="card-text"><?= h($recipe->description ?? __('A good recipe'))?></p>
                <?= $this->Html->link(
                    __('Tell me how'),
                    [
                        'action' => 'view',
                        $recipe->_id,
                    ],
                    ['class' => 'btn btn-primary']
                )?>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>
