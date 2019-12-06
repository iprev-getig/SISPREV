<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Acessos Model
 *
 * @property \App\Model\Table\TiposAcessosTable&\Cake\ORM\Association\BelongsTo $TiposAcessos
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 * @property \App\Model\Table\SistemasTable&\Cake\ORM\Association\BelongsTo $Sistemas
 *
 * @method \App\Model\Entity\Acesso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Acesso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Acesso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Acesso|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Acesso saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Acesso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Acesso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Acesso findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AcessosTable extends Table
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

        $this->setTable('acessos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Search.Search');


        $array_search = [
            'before' => true,
            'after' => true,
            'mode' => 'or',
            'comparison' => 'LIKE',
            'wildcardAny' => '*',
            'wildcardOne' => '?'
        ];
        
        $field = [];
        if (count($field) > 0) {
            $array_search['field'] = $field;
        }

        $this->searchManager()
        ->add('q', 'Search.Like', $array_search);

        $this->addBehavior('DateFormat');
        $this->addBehavior('Timestamp');

        $this->belongsTo('TiposAcessos', [
            'foreignKey' => 'tipo_acesso_id'
        ]);
        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->belongsTo('Sistemas', [
            'foreignKey' => 'sistema_id'
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
            ->boolean('index')
            ->allowEmptyString('index');

        $validator
            ->boolean('add')
            ->allowEmptyString('add');

        $validator
            ->boolean('edit')
            ->allowEmptyString('edit');

        $validator
            ->boolean('del')
            ->allowEmptyString('del');

        $validator
            ->boolean('view')
            ->allowEmptyString('view');

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
        $rules->add($rules->existsIn(['tipo_acesso_id'], 'TiposAcessos'));
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'));
        $rules->add($rules->existsIn(['sistema_id'], 'Sistemas'));

        return $rules;
    }
}
