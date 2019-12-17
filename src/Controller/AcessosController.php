<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Acessos Controller
 *
 * @property \App\Model\Table\AcessosTable $Acessos
 *
 * @method \App\Model\Entity\Acesso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AcessosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->export();

        $query = $this->Acessos->find('search', ['search' => 'all']);
        $query->contain(['TiposAcessos', 'Usuarios', 'Sistemas']);
        
        if ($this->getSearch() != '') {
            switch ($this->getSearch('field')) {
                case 'id':
                    $query->where(['acessos.id ' => $this->getSearch()]);
                    break;
               
                case 'tiposacessos':
                    $query->where(['TiposAcessos.nome ILIKE ' => '%' . $this->getSearch() . '%']);
                    break;
            }              
        }

        $this->setSearch();
        $this->set('options', array('id' => 'Id', 'tiposacessos' => 'Tipo de Acesso')); //complete

        $this->set('acessos', $this->paginate($query));

    }



    /**
     * View method
     *
     * @param string|null $id Acesso id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $acesso = $this->Acessos->get($id, [
            'contain' => ['TiposAcessos', 'Usuarios', 'Sistemas']
        ]);

        $this->set('acesso', $acesso);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $acesso = $this->Acessos->newEntity();
        if ($this->request->is('post')) {
            $acesso = $this->Acessos->patchEntity($acesso, $this->request->getData());
            if ($this->Acessos->save($acesso)) {
                $this->Flash->success(__('The acesso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The acesso could not be saved. Please, try again.'));
        }
        $tiposAcessos = $this->Acessos->TiposAcessos->find('list', ['limit' => 200]);
        $usuarios = $this->Acessos->Usuarios->find('list', ['limit' => 200]);
        $sistemas = $this->Acessos->Sistemas->find('list', ['limit' => 200]);
        $this->set(compact('acesso', 'tiposAcessos', 'usuarios', 'sistemas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Acesso id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $acesso = $this->Acessos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $acesso = $this->Acessos->patchEntity($acesso, $this->request->getData());
            if ($this->Acessos->save($acesso)) {
                $this->Flash->success(__('The acesso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The acesso could not be saved. Please, try again.'));
        }
        $tiposAcessos = $this->Acessos->TiposAcessos->find('list', ['limit' => 200]);
        $usuarios = $this->Acessos->Usuarios->find('list', ['limit' => 200]);
        $sistemas = $this->Acessos->Sistemas->find('list', ['limit' => 200]);
        $this->set(compact('acesso', 'tiposAcessos', 'usuarios', 'sistemas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Acesso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $acesso = $this->Acessos->get($id);
        if ($this->Acessos->delete($acesso)) {
            
        } else {
            $this->Flash->error(__('The acesso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
