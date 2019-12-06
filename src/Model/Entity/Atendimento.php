<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Atendimento Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $inicio
 * @property \Cake\I18n\FrozenTime|null $fim
 * @property string|null $solucao
 * @property string|null $conclusao
 * @property int|null $tipo_atendimento_id
 * @property int|null $usuario_id
 * @property int|null $cidades_id
 * @property int|null $pessoa_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \Public\Model\Entity\TiposAtendimento $tipos_atendimento
 * @property \Public\Model\Entity\Usuario $usuario
 * @property \Public\Model\Entity\Cidade $cidade
 * @property \Public\Model\Entity\Pessoa $pessoa
 */
class Atendimento extends Entity
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
        'inicio' => true,
        'fim' => true,
        'solucao' => true,
        'conclusao' => true,
        'tipo_atendimento_id' => true,
        'usuario_id' => true,
        'cidades_id' => true,
        'pessoa_id' => true,
        'created' => true,
        'modified' => true,
        'tipos_atendimento' => true,
        'usuario' => true,
        'cidade' => true,
        'pessoa' => true
    ];
}
