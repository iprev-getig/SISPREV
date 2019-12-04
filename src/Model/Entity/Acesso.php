<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Acesso Entity
 *
 * @property int $id
 * @property bool|null $index
 * @property bool|null $add
 * @property bool|null $edit
 * @property bool|null $del
 * @property bool|null $view
 * @property int|null $tipo_acesso_id
 * @property int|null $usuario_id
 * @property int|null $sistema_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\TiposAcesso $tipos_acesso
 * @property \App\Model\Entity\Usuario $usuario
 * @property \App\Model\Entity\Sistema $sistema
 */
class Acesso extends Entity
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
        'index' => true,
        'add' => true,
        'edit' => true,
        'del' => true,
        'view' => true,
        'tipo_acesso_id' => true,
        'usuario_id' => true,
        'sistema_id' => true,
        'created' => true,
        'modified' => true,
        'tipos_acesso' => true,
        'usuario' => true,
        'sistema' => true
    ];
}
