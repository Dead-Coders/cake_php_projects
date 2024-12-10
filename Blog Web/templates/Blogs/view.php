<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog $blog
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
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1"><?= h($blog->title)?></h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted on <?= $blog->created->format('M d, Y')?></div>
                    <!-- Post categories-->
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
                </header>
                <!-- Preview image figure-->
                <!-- Post content-->
                <section class="mb-5">
                    <?= $blog->content?>
                </section>
            </article>
            <!-- Comments section-->
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
