<?php
/**
 * @var \App\View\AppView $this
 * @var array $podcastData
 */
?>
<article class="panel is-info">
    <p class="panel-heading">
        <?= __('Podcast Finder')?>
    </p>
    <?= $this->Form->create(null, ['type' => 'get'])?>
    <div class="panel-block">
        <div class="field has-addons">
            <div class="control">
                <?= $this->Form->text('term', [
                    'class' => 'input is-info',
                    'placeholder' => __('Search'),
                    'label' => false,
                    'value' => $this->getRequest()->getQuery('term'),
                ])?>
            </div>
            <div class="control">
                <?= $this->Form->submit(__('Find'), [
                    'class' => 'button is-info',
                ])?>
            </div>
        </div>
    </div>
    <?= $this->Form->end()?>
    <hr />
    <?php foreach ($podcastData['results'] as $podcast):
        $url = $this->Url->build(
            [
                'action' => 'episodes',
                $podcast['id'],
            ]
        );
    ?>
    <a class="panel-block" href="<?= $url?>">
        <article class="media">
            <figure class="media-left">
                <p class="image is-128x128">
                    <?= $this->Html->image($podcast['artwork_url_100'], [
                        'style' => 'height:90%',
                    ])?>
                </p>
            </figure>
            <div class="media-content">
                <div class="content">
                    <p>
                        <strong><?= h($podcast['collection_name'])?></strong><br/>
                        <small><?= h($podcast['artist_name'])?></small>
                    </p>
                </div>
            </div>
        </article>
    </a>
    <?php endforeach;?>
</article>
