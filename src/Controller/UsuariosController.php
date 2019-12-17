<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 *
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->export();

        $query = $this->Usuarios->find('search', ['search' => 'all']);
        $query->contain(['Setores']);
        
        if ($this->getSearch() != '') {
            switch ($this->getSearch('field')) {
                case 'id':
                    $query->where(['usuarios.id ' => $this->getSearch()]);
                    break;
                //complete. Example:
                case 'login':
                    $query->where(['usuarios.login ILIKE ' => '%' . $this->getSearch() . '%']);
                    break;
                case 'email':
                    $query->where(['usuarios.email ILIKE ' => '%' . $this->getSearch() . '%']);
                    break;
                case 'nome':
                    $query->where(['usuarios.nome ILIKE ' => '%' . $this->getSearch() . '%']);
                    break;
            }              
        }

        $this->setSearch();
        $this->set('options', array('id' => 'Id', 'login' => 'Login','email' => 'Email','nome' => 'nome')); //complete

        $this->set('usuarios', $this->paginate($query));

    }



    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['Setores', 'Acessos', 'Coordenadorias']
        ]);

        $this->set('usuario', $usuario);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $setores = $this->Usuarios->Setores->find('list', ['limit' => 200]);
        $this->set(compact('usuario', 'setores'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
        }
        $setores = $this->Usuarios->Setores->find('list', ['limit' => 200]);
        $this->set(compact('usuario', 'setores'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            
        } else {
            $this->Flash->error(__('The usuario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
