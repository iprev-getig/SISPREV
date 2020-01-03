<?php
namespace App\Controller;

use App\Controller\AppController;
// use App\Controller\Component\Importador;
use App\Controller\Component\ImportarOrgaosComponent;
// use App\Controller\Component\Importador\ImportarCidadesComponent; 
// use App\Controller\Component\Importador\ImportarEstadosComponent; 

/**
 * Importador Controller
 *
 * @property Importador $Importador
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ImportadorController extends AppController {
/**
 * Components
 *
 * @var array
 */
  public $components = array('ConexaoFirebird', 'ImportarOrgaos');
/** 
 * index method
 *
 * @return void
 */  
	 public function index() {}
/* *
 * importar method
 *
 * @return void
 */
	public function importar() {
		$data = $this->request->data;
		//$data = $data['Importador'];
		$caminho = $data['Caminho'];
		try {
			$this->ConexaoFirebird->setCaminhoBanco($caminho);
			$this->ConexaoFirebird->Conectar();
			//$Cidades = new ImportarCidadesComponent($this->ConexaoFirebird, $data); //new ComponentCollection()
			$Orgaos = new ImportarOrgaosComponent($this->ConexaoFirebird, $data);
			$this->Flash->success(__('Importação Finalizada.' . 
				//$Cidades->GerarRelatorio() .
				$Orgaos->GerarRelatorio()
			), 'flash/success');
		} catch(Exception $e) {
			$this->Flash->error(__('Erro na Importação: ' . $e->getMessage()), 'flash/error');
		}
		unset($this->ConexaoFirebird);
		$this->redirect(array('action' => 'index'));
	}
/* *
 * relatorio method
 *
 * @return void
 */
	public function relatorio() {
		$data = $this->request->data;
		$caminho = NULL;
		if (isset($data['Importador']['Caminho']))
		{
			$caminho = $data['Importador']['Caminho'];
		}
		$dados = [];
				
		if (! is_null($caminho)) {
			try {
				$this->ConexaoFirebird->setCaminhoBanco($caminho);
				$this->ConexaoFirebird->Conectar();
				$this->count($this->ConexaoFirebird, $dados, 'Orgaos', 'ORGAO');
			} catch(Exception $e) {
				$this->Session->setFlash(__('Erro na conexão: ' . $e->getMessage()), 'flash/error');
			}
			unset($this->ConexaoFirebird);
		}
		$this->set(compact('dados'));
	}
/* *
 * count method
 *
 * @return void
 */
	private function count($conexao, &$array, $model, $tabela) {
		
		$Class = ClassRegistry::init($model);
		$array[$model]['total'] = $Class->find('count');
		$Consulta = $conexao->ConsultarSQL('select count(1) as total from ' . $tabela);
		while ($registro = ibase_fetch_object ($Consulta)) { 
			$array[$model]['de'] = $registro->TOTAL;
		}
	}
}
/*
delete from orgaos;

SELECT setval('orgaos_id_seq', 1);

*/