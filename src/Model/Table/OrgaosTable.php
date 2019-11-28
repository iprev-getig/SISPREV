<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orgaos Model
 *
 * @method \App\Model\Entity\Orgao get($primaryKey, $options = [])
 * @method \App\Model\Entity\Orgao newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Orgao[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Orgao|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orgao saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orgao patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Orgao[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Orgao findOrCreate($search, callable $callback = null, $options = [])
 */
class OrgaosTable extends Table
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

        $this->setTable('orgaos');
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
            'field' => ['adicionar', 'campos', 'string']
        ]);

        $this->addBehavior('DateFormat');
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

        $validator
            ->integer('codigo')
            ->allowEmptyString('codigo');

        return $validator;
    }
}
