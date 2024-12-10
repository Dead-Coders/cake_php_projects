<?php
/**
 * @var \App\View\AppView $this
 * @var array $totals
 * @var array $sports
 */
?>
<table class="table table-bordered mb-0">
    <thead>
    <tr>
        <th scope="col"><?= __('Sport')?></th>
        <th scope="col"><?= $this->Html->image('medal-gold-svgrepo-com.svg', [
            'alt' => __('Gold'),
            'style' => 'height: 24px',
        ])?></th>
        <th scope="col"><?= $this->Html->image('medal-silver-svgrepo-com.svg', [
            'alt' => __('Silver'),
            'style' => 'height: 24px',
        ])?></th>
        <th scope="col"><?= $this->Html->image('bronze-medal-svgrepo-com.svg', [
            'alt' => __('Silver'),
            'style' => 'height: 24px',
        ])?></th>
        <th scope="col"><?= __('Total')?></th>
    </tr>
    </thead>
    <tbody>

<?php foreach ($totals as $item): ?>
<tr>
    <td><?= h($sports[$item['sport_id']]) ?></td>
    <td><?= $this->Number->format($item['gold_medal_count']) ?></td>
    <td><?= $this->Number->format($item['silver_medal_count']) ?></td>
    <td><?= $this->Number->format($item['bronze_medal_count']) ?></td>
    <td><?= $this->Number->format($item['medal_count']) ?></td>
</tr>
<?php endforeach; ?>
    </tbody>
</table>
