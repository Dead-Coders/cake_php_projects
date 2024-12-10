<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Podcasts Model
 *
 * @property \App\Model\Table\CollectionsTable&\Cake\ORM\Association\BelongsTo $Collections
 *
 * @method \App\Model\Entity\Podcast newEmptyEntity()
 * @method \App\Model\Entity\Podcast newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Podcast[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Podcast get($primaryKey, $options = [])
 * @method \App\Model\Entity\Podcast findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Podcast patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Podcast[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Podcast|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Podcast saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Podcast[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Podcast[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Podcast[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Podcast[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PodcastsTable extends Table
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

        $this->setTable('podcasts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('feed_url')
            ->maxLength('feed_url', 255)
            ->requirePresence('feed_url', 'create')
            ->notEmptyString('feed_url');

        $validator
            ->scalar('artist_name')
            ->maxLength('artist_name', 255)
            ->requirePresence('artist_name', 'create')
            ->notEmptyString('artist_name');

        $validator
            ->scalar('collection_name')
            ->maxLength('collection_name', 255)
            ->requirePresence('collection_name', 'create')
            ->notEmptyString('collection_name');

        $validator
            ->scalar('artwork_url_100')
            ->maxLength('artwork_url_100', 255)
            ->requirePresence('artwork_url_100', 'create')
            ->notEmptyString('artwork_url_100');

        $validator
            ->scalar('artwork_url_600')
            ->maxLength('artwork_url_600', 255)
            ->requirePresence('artwork_url_600', 'create')
            ->notEmptyString('artwork_url_600');

        return $validator;
    }
}
