<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog[]|\Cake\Collection\CollectionInterface $blogs
 */
?>
<?php
$this->Html->css(['styles.css'], ['block' => true,])
?>
<!-- Responsive navbar-->
<?= $this->element('nav')?>
<!-- Page content-->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <?php if (!$blogs):?>
            <div class="alert alert-info">
                <strong><?= __('Not found blog entries')?></strong>
                <?= $this->Html->link(
                    __('Got to Home to list all'),
                    ['action' => 'index']
                )?>
            </div>
            <?php endif;?>
            <?php foreach ($blogs as $blog) : ?>
                <div class="card mb-2">
                    <div class="card-body">
                        <?php foreach ($blog->tags as $tag):?>
                        <?= $this->Html->link(
                            $tag->name,
                            [
                                'action' => 'index',
                                'tag_slug' => $tag->slug,
                            ],
                            [
                                'class' => 'badge bg-secondary text-decoration-none link-light',
                            ]
                        )?>
                        <?php endforeach;?>
                        <h4 class="card-title mt-2"><?= h($blog->title)?></h4>

                        <p class="card-text"><?= h($blog->summary)?></p>
                        <p class="card-text"><small class="text-muted">Posted on <?= $blog->created->format('M d, Y')?></small></p>
                        <?= $this->Html->link(
                            __('Read more →'),
                            ['action' => 'view', $blog->slug],
                            ['class' => 'btn btn-secondary']
                        )?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <?= $this->element('search')?>
            <!-- Tags widget-->
            <?= $this->cell('TagsWidget::display')?>
        </div>
    </div>
</div>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white"><?= __('One Project a Day with CakePHP')?></p></div>
</footer>
