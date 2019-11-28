<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Coordenadoria Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property int|null $usuario_id
 * @property int|null $cidade_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Usuario $usuario
 * @property \App\Model\Entity\Cidade $cidade
 */
class Coordenadoria extends Entity
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
        'usuario_id' => true,
        'cidade_id' => true,
        'created' => true,
        'modified' => true,
        'usuario' => true,
        'cidade' => true
    ];
}
