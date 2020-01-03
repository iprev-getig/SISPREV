<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use App\Controller\Component\ImportadorBaseComponent;
// use Cake\Controller\Component;
//use App\Controller\Component\Importador;
//use App\Controller\Component\Importador\ImportadorBaseComponent; 
// use ImportadorBaseComponent; 
//App::import('App/Controller/Component/Importador', 'ImportadorBaseComponent');

//include_once(ROOT . DS . 'src' . DS . "Controller" . DS . "Component" . DS . "Importador" . DS . "ImportadorBaseComponent.php");
//require_once(ROOT . DS . 'src' . DS . "Controller" . DS . "Component" . DS . "Importador" . DS . "ImportadorBaseComponent.php");

class ImportarOrgaosComponent extends ImportadorBaseComponent {

	
	public function PassaValores($parametro) {
		$dados = [];
		$dados['id'] = $parametro['ORG_ID'];
		$dados['nome'] = $parametro['ORG_NOME'];
		$dados['sigla'] = $parametro['ORG_SIGLA'];
		// $dados['nome'] = $this->FormatarValorEncode($parametro['ORG_NOME']);
		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Orgaos');
		$this->setSqlConsulta('Select ORG_ID, ORG_SIGLA, ORG_NOME from ORGAO where ORG_NOME is not null and ORG_NOME <> \'\'');
		$this->setCheckBox('Orgaos');
	}
}
?>