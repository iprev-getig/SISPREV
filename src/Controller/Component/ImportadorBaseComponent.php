<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

abstract class ImportadorBaseComponent extends Component {

	var $Class;
	var $Model;
	var $Conexao;
	var $Consulta;
	var $SqlConsulta;
	var $CheckBox;
	var $Dados;
	var $Data;
	var $Cidades;
	var $Alunos;

	abstract public function PassaValores($parametro);
	abstract public function Configurar();

	public function __construct($conexao, $data) {
		$this->setConexao($conexao);
		$this->setData($data);
		$this->Configurar();
		$this->Importar();
	}

	private function VerificarImportacaoNecessaria() {
		if (count($this->Data) == 0)
		 	return false;
		return (boolean) $this->Data[$this->CheckBox];
	}

	private function setConexao($parametro) {
		$this->Conexao = $parametro;
	}

	private function setData($parametro) {
		$this->Data = $parametro;
	}

	protected function setModel($parametro) {
		$this->Model = $parametro;
		$this->Class = TableRegistry::get($this->Model);
	}

	protected function setSqlConsulta($parametro) {
		$this->SqlConsulta = $parametro;
	}

	protected function setCheckBox($parametro) {
		$this->CheckBox = $parametro;
	}

	protected function SalvarDados($parametro) { 
		try{
			debug($this->Class);
			$entity = $this->Class->newEntity();
			$entity = $this->Class->patchEntity($entity, $parametro);
			$this->Class->save($entity);
		} catch(Exception $e) {
			echo 'Erro na Importação: ' . $e->getMessage() . ' ' . var_dump($parametro);
		}
	}

	public function FormatarValorEncode($parametro){
		$enc = new FormatarEncode($parametro);
		return $parametro;
	}

	public function Importar () {
		if ($this->VerificarImportacaoNecessaria()) {
			//$this->ZerarAutoIncremento();
			set_time_limit(0);
			$this->Consulta = $this->Conexao->ConsultarSQL($this->SqlConsulta);
			while ($registro = ibase_fetch_assoc ($this->Consulta)) {
				if (! $this->VerificarRegistroJaCadastrado($registro))
					$this->PassaValores($registro);
			}
			
		}
    }

	protected function PegarUltimoCodigoDeLancamentoImportado () {
		$Maior = $this->Class->find('all', array('recursive' => -1, 'fields' => 'max(id) as Maximo'));
		$Maior = $Maior[0][0]['Maximo'];
		if (is_null($Maior))
			$Maior = 0;
		return $Maior;
	}

	protected function CarregarArrayDeCidades() {
		$Cidade = ClassRegistry::init('Cidade');
		$this->Cidades = $Cidade->find('list', array('fields' => 'id', 'order' => 'id'));
	}

	protected function VerificarCidadeExiste($parametro) {
		if (in_array($parametro, $this->Cidades) || (is_null($parametro))) 
			return $parametro;
		else {
			return $this->Cidades[1];
		}
	}

	protected function VerificarRegistroJaCadastrado($parametro) {
		return False;
	}

	protected function TratarCampoEmBranco($dados, $campo, $valor = '') {
		if ($dados[$campo] == '') {
          if ($valor == '')
          	return $dados['id'];
          else
            return $valor;
		}
		else
			return $dados[$campo];
	}

	public function GerarRelatorio() {
		if ($this->VerificarImportacaoNecessaria()) {
			$consultados = 0;
			$this->Consulta = $this->Conexao->ConsultarSQL($this->SqlConsulta);
			while ($registro = ibase_fetch_assoc ($this->Consulta)) {
				//if (! $this->VerificarRegistroJaCadastrado($registro))
					$consultados++;
			}
			$importados = $this->Class->find()->count(); 
			return $this->Model . ' ' . $importados . '/' . $consultados . ' ';
		}
		else
			return '';
	}

	protected function ZerarAutoIncremento() {
		$conexao = ConnectionManager::get('default');
		# $sql = 'ALTER TABLE ' . $this->PegarTabela($this->Model) . ' AUTO_INCREMENT = 1';
		$sql = 'SELECT setval("' . strtolower($this->PegarTabela($this->Model)) . '_id_seq", 1)';
		$conexao->query($sql);
	}

	private function PegarTabela($tabela) {
		if ($tabela == 'Orgao')
			return 'orgaos';
		else
			return $tabela;
	}

	public function FormatarValorNumerico($parametro){
		return str_replace('.', ',', $parametro);
	}

}

?>


