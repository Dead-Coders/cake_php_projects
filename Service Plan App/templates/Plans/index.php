<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Plan[]|\Cake\Collection\CollectionInterface $plans
 */
?>
<?php foreach ($plans as $plan): ?>
    <div class="col-sm-12 col-lg-4 mb-2">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= h($plan->name) ?></h4>
                <h2 class="card-title pricing-card-title"><?= $this->Number->format(
                    $plan->final_price,
                    ['precision' => 2]
                ) ?> <small class="text-muted"><?= h($currency)?> / mo</small></h2>
                <ul class="list-unstyled mt-3 mb-4">
                    <?php foreach ((explode('|', $plan->description)) as $item):?>
                        <li><?= h($item)?></li>
                    <?php endforeach;?>
                </ul>
                <?= $this->Html->link(
                    'I want now',
                    'https://api.whatsapp.com/send?phone=55999999999999&text=I%20want%20to%20sign%20plan%20' . $plan->name,
                    ['class' => 'btn btn-primary']
                )?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
