<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cidade Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property int|null $estado_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Estado $estado
 * @property \App\Model\Entity\Atendimento[] $atendimentos
 * @property \App\Model\Entity\Coordenadoria[] $coordenadorias
 * @property \App\Model\Entity\Orgao[] $orgaos
 * @property \App\Model\Entity\Setore[] $setores
 */
class Cidade extends Entity
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
        'estado_id' => true,
        'created' => true,
        'modified' => true,
        'estado' => true,
        'atendimentos' => true,
        'coordenadorias' => true,
        'orgaos' => true,
        'setores' => true
    ];
}
