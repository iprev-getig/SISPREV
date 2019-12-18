<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Atendimento Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $inicio
 * @property int|null $usuario_id
 * @property int|null $cidade_id
 * @property int|null $tipo_atendimento_id
 * @property int|null $requerente_id
 * @property int|null $beneficiario_id
 * @property int|null $orgao_id
 * @property string|null $solucao
 * @property string|null $conclusao
 * @property \Cake\I18n\FrozenTime|null $fim
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Usuario $usuario
 * @property \App\Model\Entity\Cidade $cidade
 * @property \App\Model\Entity\TiposAtendimento $tipos_atendimento
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property \App\Model\Entity\Orgao $orgao
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
        'usuario_id' => true,
        'cidade_id' => true,
        'tipo_atendimento_id' => true,
        'requerente_id' => true,
        'beneficiario_id' => true,
        'orgao_id' => true,
        'solucao' => true,
        'conclusao' => true,
        'fim' => true,
        'created' => true,
        'modified' => true,
        'usuario' => true,
        'cidade' => true,
        'tipos_atendimento' => true,
        'pessoa' => true,
        'orgao' => true
    ];
}
