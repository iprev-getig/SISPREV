<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orgao Model
 *
 * @property \App\Model\Table\OrdemTable&\Cake\ORM\Association\HasMany $Ordem
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
class OrgaoTable extends Table
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

        $this->setTable('orgao');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Ordem', [
            'foreignKey' => 'orgao_id'
        ]);
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
            ->maxLength('nome', 100)
            ->allowEmptyString('nome');

        $validator
            ->scalar('sigla')
            ->maxLength('sigla', 30)
            ->allowEmptyString('sigla');

        return $validator;
    }
}
