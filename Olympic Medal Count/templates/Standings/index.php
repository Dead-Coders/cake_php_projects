<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Country[] $countries
 */
?>
<?php
$this->assign('title', __('Olympics Medal Standings'));
$this->Html->script([
    'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js',
    'standings.js'
], ['block' => true]);
?>
<style>
    .show-detail td {
        cursor: pointer;
    }
</style>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col"><?= __('Country')?></th>
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

<?php foreach ($countries as $country):
$detailUrl = $country->medal_count >= 1 ? $this->Url->build([
    'action' => 'detail',
    $country->id,
]) : null;
?>
<tr class="<?= $detailUrl ?'show-detail' : ''?>" data-target="#medalDetail<?= h($country->id)?>">
    <td>
        <?= $this->Html->image($country->icon, [
            'width' => '24px',
        ])?>
        <?= h($country->name) ?>

        <span style="margin-right: 4px;<?= !$detailUrl ? 'visibility: hidden;' : ''?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
        </svg>
        </span>
    </td>
    <td><?= $this->Number->format($country->gold_medal_count) ?></td>
    <td><?= $this->Number->format($country->silver_medal_count) ?></td>
    <td><?= $this->Number->format($country->bronze_medal_count) ?></td>
    <td><?= $this->Number->format($country->medal_count) ?></td>
</tr>
<?php if ($detailUrl):?>
<tr id="medalDetail<?= h($country->id)?>" data-url="<?= $detailUrl?>" style="display: none">
    <td colspan="5"></td>
</tr>
<?php endif;?>
<?php endforeach; ?>
    </tbody>
</table>
