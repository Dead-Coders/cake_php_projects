<?php
/**
 * @var \App\View\AppView $this
 * @var array $episodes
 * @var \App\Model\Entity\Podcast $podcast
 */
?>
<section class="hero is-info">
    <div class="hero-body">
        <p class="title">
            <?= h($podcast->collection_name)?>
        </p>
        <p class="subtitle">
            <?= h($podcast->artist_name)?>
        </p>
        <?= $this->Html->image($podcast['artwork_url_100'], [
            'style' => 'height:100px',
            'class' => 'dimage is-square',
        ])?>
    </div>
</section>
<?php foreach ($episodes as $episode):?>
    <div class="card" style="margin-bottom: 10px;">
        <div class="card-content">
            <p class="subtitle is-6"><?= $episode['pub_date']->format('M d, Y')?></p>
            <p class="title is-4"><?= h($episode['title'])?></p>
            <div class="content">
                <?= h($episode['description'])?>
            </div>
        </div>
        <footer class="card-footer">
            <?= $this->Html->link(
                __('Play Now'),
                $episode['url'],
                [
                    'class' => 'card-footer-item',
                    'target' => '_blank',
                ]
            )?>
        </footer>
    </div>
<?php endforeach;?>

