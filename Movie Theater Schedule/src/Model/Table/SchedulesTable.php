<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Schedule;
use Cake\I18n\Date;
use Cake\ORM\Query;
use Cake\ORM\ResultSet;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schedules Model
 *
 * @property \App\Model\Table\MoviesTable&\Cake\ORM\Association\BelongsTo $Movies
 * @property \App\Model\Table\ScreensTable&\Cake\ORM\Association\BelongsTo $Screens
 *
 * @method \App\Model\Entity\Schedule newEmptyEntity()
 * @method \App\Model\Entity\Schedule newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Schedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Schedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\Schedule findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Schedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Schedule[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Schedule|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Schedule saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Schedule[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Schedule[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Schedule[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Schedule[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SchedulesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('schedules');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Movies', [
            'foreignKey' => 'movie_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Screens', [
            'foreignKey' => 'screen_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->dateTime('start_time')
            ->requirePresence('start_time', 'create')
            ->notEmptyDateTime('start_time');

        $validator
            ->dateTime('close_time')
            ->requirePresence('close_time', 'create')
            ->notEmptyDateTime('close_time');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['movie_id'], 'Movies'), ['errorField' => 'movie_id']);
        $rules->add($rules->existsIn(['screen_id'], 'Screens'), ['errorField' => 'screen_id']);

        return $rules;
    }

    /**
     * @param Query $query
     * @param $options
     * @return Query
     */
    public function findOnDate(Query $query, $options): Query
    {
        $date = $options['date'] ?? null;
        if ($date === null) {
            throw new \InvalidArgumentException(__('Options key "date" should not be empty'));
        }
        $end = clone $date;
        $end->modify('+1 day');
        $query = $query->contain(['Movies', 'Screens']);

        return $query
            ->where([
            $query->newExpr()->gte('start_time', $date),
            $query->newExpr()->lt('start_time', $end),
        ])->formatResults(function(ResultSet $results) {
            return $results->groupBy('movie_id')
                ->map(function($schedules) {
                    /**
                     * @var \App\Model\Entity\Movie $movie
                     */
                    $movie = $schedules[0]['movie'];
                    $movie->schedules_by_screen = collection($schedules)->map(function(Schedule $schedule) {
                        $schedule->movie = null;

                        return $schedule;
                    })->groupBy('screen_id')->toArray();

                    return $movie;
                });
        });
    }
}
