<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Orgao Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $sigla
 * @property int|null $codigo
 * @property int|null $cidade_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Cidade $cidade
 */
class Orgao extends Entity
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
        'nome' => true,
        'sigla' => true,
        'codigo' => true,
        'cidade_id' => true,
        'created' => true,
        'modified' => true,
        'cidade' => true
    ];
}
