<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
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
 */
class User extends Entity
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
        'username' => true,
        'email' => true,
        'nome' => true,
        'password' => true,
        'bloqueado' => true,
        'ult_acesso' => true,
        'setor_id' => true,
        'created' => true,
        'modified' => true,
        'setore' => true
    ];

    protected function _setPassword($password) {
        return (new DefaultPasswordHasher)->hash($password);
    }
    
}
