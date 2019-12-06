<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Atendimentos Model
 *
 * @property &\Cake\ORM\Association\BelongsTo $Public.tiposAtendimentos
 * @property &\Cake\ORM\Association\BelongsTo $Public.usuarios
 * @property &\Cake\ORM\Association\BelongsTo $Public.cidades
 * @property &\Cake\ORM\Association\BelongsTo $Public.pessoas
 *
 * @method \App\Model\Entity\Atendimento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Atendimento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Atendimento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Atendimento|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Atendimento saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Atendimento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Atendimento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Atendimento findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AtendimentosTable extends Table
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

        $this->setTable('sagen.atendimentos');
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
            'field' => ['id']
        ]);

        $this->addBehavior('DateFormat');
        $this->addBehavior('Timestamp');

        $this->belongsTo('Public.tiposAtendimentos', [
            'foreignKey' => 'tipo_atendimento_id'
        ]);
        $this->belongsTo('Public.usuarios', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->belongsTo('Public.cidades', [
            'foreignKey' => 'cidades_id'
        ]);
        $this->belongsTo('Public.pessoas', [
            'foreignKey' => 'pessoa_id'
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
            ->allowEmptyString('inicio');

        $validator
            ->allowEmptyString('fim');

        $validator
            ->scalar('solucao')
            ->allowEmptyString('solucao');

        $validator
            ->scalar('conclusao')
            ->allowEmptyString('conclusao');

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
        $rules->add($rules->existsIn(['tipo_atendimento_id'], 'Public.tiposAtendimentos'));
        $rules->add($rules->existsIn(['usuario_id'], 'Public.usuarios'));
        $rules->add($rules->existsIn(['cidades_id'], 'Public.cidades'));
        $rules->add($rules->existsIn(['pessoa_id'], 'Public.pessoas'));

        return $rules;
    }
}
