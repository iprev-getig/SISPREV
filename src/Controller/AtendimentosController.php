<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Atendimentos Controller
 *
 * @property \App\Model\Table\AtendimentosTable $Atendimentos
 *
 * @method \App\Model\Entity\Atendimento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AtendimentosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->export();

        $query = $this->Atendimentos->find('search', ['search' => 'all']);
        $query->contain(['Usuarios', 'Cidades', 'TiposAtendimentos', 'Pessoas', 'Orgaos']);
        
        if ($this->getSearch() != '') {
            switch ($this->getSearch('field')) {
                case 'id':
                    $query->where(['atendimentos.id ' => $this->getSearch()]);
                    break;
                //complete. Example:
                case 'usuarios':
                    $query->where(['usuarios.nome ILIKE ' => '%' . $this->getSearch() . '%']);
                    break;
                case 'cidades':
                    $query->where(['cidades.nome ILIKE ' => '%' . $this->getSearch() . '%']);
                    break;
                case 'tipos_atendimentos':
                    $query->where(['tipos_atendimentos.nome ILIKE ' => '%' . $this->getSearch() . '%']);
                    break;
                case 'requerentes':
                    $query->where(['pessoas.nome ILIKE ' => '%' . $this->getSearch() . '%']);
                    break;     
                case 'beneficiarios':
                    $query->where(['pessoas.nome ILIKE ' => '%' . $this->getSearch() . '%']);
                    break;        
            }              
        }

        $this->setSearch();
        $this->set('options', array('id' => 'Id' ,  'usuarios' => 'Usuarios' , 'cidades' => 'Cidades' , 'tipos_atendimentos' => 'Tipo de Atendimento' , 'requerentes' => 'Requerentes' , 'beneficiarios' => 'Beneficiarios')); //complete

        $this->set('atendimentos', $this->paginate($query));

    }



    /**
     * View method
     *
     * @param string|null $id Atendimento id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $atendimento = $this->Atendimentos->get($id, [
            'contain' => ['Usuarios', 'Cidades', 'TiposAtendimentos', 'Pessoas', 'Orgaos']
        ]);

        $this->set('atendimento', $atendimento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $atendimento = $this->Atendimentos->newEntity();
        if ($this->request->is('post')) {
            $atendimento = $this->Atendimentos->patchEntity($atendimento, $this->request->getData());
            if ($this->Atendimentos->save($atendimento)) {
                $this->Flash->success(__('The atendimento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The atendimento could not be saved. Please, try again.'));
        }
        $usuarios = $this->Atendimentos->Usuarios->find('list', ['limit' => 200]);
        $cidades = $this->Atendimentos->Cidades->find('list', ['limit' => 200]);
        $tiposAtendimentos = $this->Atendimentos->TiposAtendimentos->find('list', ['limit' => 200]);
        $pessoas = $this->Atendimentos->Pessoas->find('list', ['limit' => 200]);
        $orgaos = $this->Atendimentos->Orgaos->find('list', ['limit' => 200]);
        $this->set(compact('atendimento', 'usuarios', 'cidades', 'tiposAtendimentos', 'pessoas', 'orgaos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Atendimento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $atendimento = $this->Atendimentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $atendimento = $this->Atendimentos->patchEntity($atendimento, $this->request->getData());
            if ($this->Atendimentos->save($atendimento)) {
                $this->Flash->success(__('The atendimento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The atendimento could not be saved. Please, try again.'));
        }
        $usuarios = $this->Atendimentos->Usuarios->find('list', ['limit' => 200]);
        $cidades = $this->Atendimentos->Cidades->find('list', ['limit' => 200]);
        $tiposAtendimentos = $this->Atendimentos->TiposAtendimentos->find('list', ['limit' => 200]);
        $pessoas = $this->Atendimentos->Pessoas->find('list', ['limit' => 200]);
        $orgaos = $this->Atendimentos->Orgaos->find('list', ['limit' => 200]);
        $this->set(compact('atendimento', 'usuarios', 'cidades', 'tiposAtendimentos', 'pessoas', 'orgaos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Atendimento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $atendimento = $this->Atendimentos->get($id);
        if ($this->Atendimentos->delete($atendimento)) {
            
        } else {
            $this->Flash->error(__('The atendimento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
