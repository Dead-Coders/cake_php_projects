<div class="row">
    <div class="col-sm-12">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-success"><?= __('Recipe')?></strong>
                <h3 class="mb-0"><?= h($recipe->name)?></h3>
                <div class="mb-1 text-muted">Nov 11</div>
                <p class="mb-auto"><?= h($recipe->description ?? __('A good recipe'))?></p>
            </div>
            <div class="col-auto d-none d-lg-block">
                <?= $this->Html->image($recipe->photo_url, [
                    'class' => "card-img-top",
                    'style' => 'width:200px;height=200px;',
                ])?>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= __('Ingredients')?></h5>
                <?= $this->Form->control('ingredients', [
                    'options' => $recipe->ingredients,
                    'multiple' => 'checkbox',
                    'label' => false,
                ])?>
            </div>
        </div>
    </div>
</div>
