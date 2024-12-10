<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\Date;

/**
 * Schedules Controller
 *
 * @property \App\Model\Table\SchedulesTable $Schedules
 * @method \App\Model\Entity\Schedule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SchedulesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $selectedDate = [
            'year' => $this->request->getParam('year'),
            'month' => $this->request->getParam('month'),
            'day' => $this->request->getParam('day'),
        ];
        if ($selectedDate['year']) {
            $selectedDate = Date::createFromArray($selectedDate);
        } else {
            $selectedDate = new Date();
        }
        $scheduledMovies = $this->Schedules->find('onDate', [
            'date' => $selectedDate,
        ]);
        $firstDay = new Date();
        $dates = [$firstDay];
        for ($day = 1; $day < 7; $day++) {
            $dates[] = $firstDay->copy()->modify("+$day days");
        }
        $this->set(compact('scheduledMovies', 'dates', 'firstDay', 'selectedDate'));
    }
}
