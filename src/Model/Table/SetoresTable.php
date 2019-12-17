<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Setores Model
 *
 * @property \App\Model\Table\CidadesTable&\Cake\ORM\Association\BelongsTo $Cidades
 *
 * @method \App\Model\Entity\Setore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Setore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Setore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Setore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Setore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Setore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Setore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Setore findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SetoresTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('setores');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Search.Search');


        $array_search = [
            'before' => true,
            'after' => true,
            'mode' => 'or',
            'comparison' => 'ILIKE',
            'wildcardAny' => '*',
            'wildcardOne' => '?'
        ];

        $this->searchManager()
        ->add('q', 'Search.Like', $array_search);

        $this->addBehavior('DateFormat');
        $this->addBehavior('Timestamp');

        $this->belongsTo('Cidades', [
            'foreignKey' => 'cidade_id'
        ]);
    }


    /**
     * Default search Configuration.
     *
     * @return search query component
     */
    public function searchConfiguration()
    {
        $search = new Manager($this);

        $search->like('title');

        return $search;
    }
    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 250)
            ->allowEmptyString('nome');

        $validator
            ->scalar('sigla')
            ->maxLength('sigla', 20)
            ->allowEmptyString('sigla');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['cidade_id'], 'Cidades'));

        return $rules;
    }
}
