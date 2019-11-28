<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sistema Entity
 *
 * @property int $id
 * @property string|null $sigla
 * @property string|null $nome
 * @property string|null $descricao
 * @property string|null $icone
 * @property string|null $controller
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Acesso[] $acessos
 */
class Sistema extends Entity
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
        'sigla' => true,
        'nome' => true,
        'descricao' => true,
        'icone' => true,
        'controller' => true,
        'created' => true,
        'modified' => true,
        'acessos' => true
    ];
}
