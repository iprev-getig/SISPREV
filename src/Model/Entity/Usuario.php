<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property int $id
 * @property string|null $login
 * @property string|null $email
 * @property string|null $nome
 * @property string|null $senha
 * @property bool|null $bloqueado
 * @property \Cake\I18n\FrozenTime|null $ult_acesso
 * @property int|null $setor_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Setore $setore
 * @property \App\Model\Entity\Acesso[] $acessos
 * @property \App\Model\Entity\Coordenadoria[] $coordenadorias
 */
class Usuario extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'login' => true,
        'email' => true,
        'nome' => true,
        'senha' => true,
        'bloqueado' => true,
        'ult_acesso' => true,
        'setor_id' => true,
        'created' => true,
        'modified' => true,
        'setore' => true,
        'acessos' => true,
        'coordenadorias' => true
    ];
}
