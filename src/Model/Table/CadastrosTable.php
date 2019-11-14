<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cadastros Model
 *
 * @property \App\Model\Table\CadastrosTable&\Cake\ORM\Association\BelongsTo $Cadastros
 * @property \App\Model\Table\CadastrosTable&\Cake\ORM\Association\HasMany $Cadastros
 *
 * @method \App\Model\Entity\Cadastro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cadastro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cadastro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cadastro|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cadastro saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cadastro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cadastro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cadastro findOrCreate($search, callable $callback = null, $options = [])
 */
class CadastrosTable extends Table
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

        $this->setTable('cadastros');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cadastros', [
            'foreignKey' => 'cadastro_id'
        ]);
        $this->hasMany('Cadastros', [
            'foreignKey' => 'cadastro_id'
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
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('sigla')
            ->maxLength('sigla', 30)
            ->allowEmptyString('sigla');

        $validator
            ->boolean('bloqueado')
            ->allowEmptyString('bloqueado');

        $validator
            ->scalar('descricao')
            ->allowEmptyString('descricao');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 15)
            ->allowEmptyString('cpf');

        $validator
            ->allowEmptyString('foto');

        $validator
            ->date('data')
            ->allowEmptyDate('data');

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
        $rules->add($rules->existsIn(['cadastro_id'], 'Cadastros'));

        return $rules;
    }
}
