<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @property \App\Model\Table\SetoresTable&\Cake\ORM\Association\BelongsTo $Setores
 * @property \App\Model\Table\AcessosTable&\Cake\ORM\Association\HasMany $Acessos
 *
 * @method \App\Model\Entity\Usuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Usuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsuariosTable extends Table
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

        $this->setTable('usuarios');
        $this->setDisplayField('nome');
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
        $this->addBehavior('Timestamp');

        $this->belongsTo('Setores', [
            'foreignKey' => 'setor_id'
        ]);
        $this->hasMany('Acessos', [
            'foreignKey' => 'usuario_id'
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
            ->scalar('senha')
            ->maxLength('senha', 250)
            ->allowEmptyString('senha');

        $validator
            ->boolean('bloqueado')
            ->allowEmptyString('bloqueado');

        $validator
            ->dateTime('ult_acesso')
            ->allowEmptyDateTime('ult_acesso');

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
        $rules->add($rules->existsIn(['setor_id'], 'Setores'));

        return $rules;
    }
}
