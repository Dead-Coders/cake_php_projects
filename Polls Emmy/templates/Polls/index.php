<?php
/**
 * @var \App\Model\Entity\Poll[] $polls
 * @var \App\View\AppView $this
 * @var bool $showResult
 */
?>
<section class="hero is-primary">
    <div class="hero-body">
        <p class="title">
            <?= __('All The Best Polls')?>
        </p>
        <p class="subtitle">
            <?= __('The poll you looking for is here')?>
        </p>
    </div>
</section>

<div class="box">
    <?php foreach ($polls as $poll):?>
    <article class="media">
        <figure class="media-left">
            <p class="image is-128x128">
                <?= $this->Html->image($poll->photo_url, [
                    'style' => 'height:90%',
                ])?>
            </p>
        </figure>
        <div class="media-content">
            <div class="content">
                <p>
                    <strong><?= h($poll->name)?></strong>
                </p>
            </div>
            <nav class="level is-mobile">
                <div class="level-left">
                    <a class="level-item">
                        <div class="control">
                            <?= $this->Html->link(__('Vote Now'),
                                [
                                    'action' => 'view',
                                    $poll->id,
                                ],
                                ['class' => 'button is-primary']
                            )?>
                        </div>
                    </a>
                </div>
            </nav>
        </div>
    </article>
    <?php endforeach;?>
</div>

