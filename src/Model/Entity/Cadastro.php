<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cadastro Entity
 *
 * @property int $id
 * @property string $nome
 * @property string|null $sigla
 * @property int|null $cadastro_id
 * @property bool|null $bloqueado
 * @property string|null $descricao
 * @property string|null $cpf
 * @property string|resource|null $foto
 * @property \Cake\I18n\FrozenDate|null $data
 *
 * @property \App\Model\Entity\Cadastro[] $cadastros
 */
class Cadastro extends Entity
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
        'cadastro_id' => true,
        'bloqueado' => true,
        'descricao' => true,
        'cpf' => true,
        'foto' => true,
        'data' => true,
        'cadastros' => true
    ];
}
