<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Medal;
use Cake\ORM\Query;
use Cake\ORM\ResultSet;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Medals Model
 *
 * @property \App\Model\Table\SportsTable&\Cake\ORM\Association\BelongsTo $Sports
 * @property \App\Model\Table\CountriesTable&\Cake\ORM\Association\BelongsTo $Countries
 *
 * @method \App\Model\Entity\Medal newEmptyEntity()
 * @method \App\Model\Entity\Medal newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Medal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Medal get($primaryKey, $options = [])
 * @method \App\Model\Entity\Medal findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Medal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Medal[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Medal|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Medal saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Medal[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Medal[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Medal[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Medal[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MedalsTable extends Table
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

        $this->setTable('medals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Sports', [
            'foreignKey' => 'sport_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id',
            'joinType' => 'INNER',
        ]);

        $this->addBehavior('CounterCache', [
            'Countries' => [
                'gold_medal_count' => [
                    'conditions' => [
                        'type' => Medal::TYPE_GOLD,
                    ]
                ],
                'silver_medal_count' => [
                    'conditions' => [
                        'type' => Medal::TYPE_SILVER,
                    ]
                ],
                'bronze_medal_count' => [
                    'conditions' => [
                        'type' => Medal::TYPE_BRONZE,
                    ]
                ],
            ],
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
            ->scalar('event_name')
            ->maxLength('event_name', 255)
            ->requirePresence('event_name', 'create')
            ->notEmptyString('event_name');

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
        $rules->add($rules->existsIn(['sport_id'], 'Sports'), ['errorField' => 'sport_id']);
        $rules->add($rules->existsIn(['country_id'], 'Countries'), ['errorField' => 'country_id']);

        return $rules;
    }

    public function getTypeList(): array
    {
        return [
            Medal::TYPE_GOLD => __('Gold'),
            Medal::TYPE_SILVER => __('Silver'),
            Medal::TYPE_BRONZE => __('Bronze'),
        ];
    }

    /**
     * @param Query $query
     * @param array $options With key countryId
     */
    public function findDetailCountry(Query $query, $options)
    {
        $query = $query->select([
            'count_medals' => $query->func()->count('Medals.id'),
            'Medals.type',
            'Medals.sport_id',
        ]);

        return $query
            ->where([
                'Medals.country_id' => $options['countryId']
            ])
            ->group(['Medals.sport_id', 'Medals.type'])
            ->formatResults(function(ResultSet $resultSet) {
                return $resultSet->groupBy('sport_id')
                    ->map(function($entries) {
                        $item = [
                            'sport_id' => $entries[0]['sport_id'],
                            'gold_medal_count' => 0,
                            'silver_medal_count' => 0,
                            'bronze_medal_count' => 0,
                        ];
                        return $this->setTotalByType($entries, $item);
                    })
                    ->toList();
            });
    }

    /**
     * @param array $entries
     * @param array $item
     * @return array
     */
    protected function setTotalByType($entries, array $item): array
    {
        foreach ($entries as $entry) {
            switch ($entry['type']) {
                case Medal::TYPE_GOLD:
                    $item['gold_medal_count'] += $entry['count_medals'];
                    break;
                case Medal::TYPE_SILVER:
                    $item['silver_medal_count'] += $entry['count_medals'];
                    break;
                case Medal::TYPE_BRONZE:
                    $item['bronze_medal_count'] += $entry['count_medals'];
                    break;
            }
            $item['medal_count'] = $item['gold_medal_count'] + $item['silver_medal_count'] + $item['bronze_medal_count'];
        }
        return $item;
    }

}
