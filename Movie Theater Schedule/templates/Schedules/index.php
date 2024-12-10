<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie[] $scheduledMovies
 * @var \Cake\I18n\Date[] $dates
 * @var \Cake\I18n\Date $firstDay
 * @var \Cake\I18n\Date $selectedDate
 */
?>
<ul class="nav nav-pills mb-3">
    <?php foreach ($dates as $date):?>
        <li class="nav-item">
            <?= $this->Html->link(
                $date == $firstDay ? __('Today') : $date->format('M, d'),
                [
                    'action' => 'index',
                    'year' => $date->format('Y'),
                    'month' => $date->format('m'),
                    'day' => $date->format('d'),
                ],
                [
                    'class' => 'nav-link' . ($selectedDate == $date ? ' active' : ''),
                ]
            )?>
        </li>
    <?php endforeach;?>
</ul>
<?php foreach ($scheduledMovies as $movie):?>
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <?= $this->Html->image('movie-' . $movie->id . '.jpg', [
                'class' => 'img-fluid'
            ])?>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= h($movie->name)?></h5>
                <p class="card-text"><?= h($movie->synopsis)?></p>
                <p class="card-text"><small class="text-muted"><?= __('Duration: {0} min', $movie->duration)?></small></p>
                <?php foreach ($movie->schedules_by_screen as $schedules):?>
                <hr />
                <div class="row">
                    <div class="col col-auto"><strong><?= h($schedules[0]->screen->name)?></strong></div>
                    <div class="col">
                        <?php foreach ($schedules as  $schedule):?>
                        <span class="badge bg-primary"><?= $schedule->start_time->format('H:i')?></span>
                        <?php endforeach;?>
                    </div>
                    <div class="col col-auto">
                        <?php foreach (explode('|', $schedules[0]->screen->tags) as $tag):?>
                            <span class="badge bg-danger"><?= h($tag)?></span>
                        <?php endforeach;?>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>
