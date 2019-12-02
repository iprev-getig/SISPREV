<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TiposAcessos Model
 *
 * @method \App\Model\Entity\TiposAcesso get($primaryKey, $options = [])
 * @method \App\Model\Entity\TiposAcesso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TiposAcesso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TiposAcesso|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TiposAcesso saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TiposAcesso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TiposAcesso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TiposAcesso findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TiposAcessosTable extends Table
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

        $this->setTable('tipos_acessos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Search.Search');


        $this->searchManager()
        ->add('q', 'Search.Like', [
            'before' => true,
            'after' => true,
            'mode' => 'or',
            'comparison' => 'LIKE',
            'wildcardAny' => '*',
            'wildcardOne' => '?',
            'field' => [
        'nome',
        'controller'
    ]
        ]);

        $this->addBehavior('DateFormat');
        $this->addBehavior('Timestamp');
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
            ->maxLength('nome', 200)
            ->allowEmptyString('nome');

        $validator
            ->scalar('controller')
            ->maxLength('controller', 50)
            ->allowEmptyString('controller');

        $validator
            ->boolean('principal')
            ->allowEmptyString('principal');

        return $validator;
    }
}
