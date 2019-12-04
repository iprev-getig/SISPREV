<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Coordenadorias Controller
 *
 * @property \App\Model\Table\CoordenadoriasTable $Coordenadorias
 *
 * @method \App\Model\Entity\Coordenadoria[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CoordenadoriasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $query = $this->Coordenadorias
        ->find('search', ['search' => $this->request->query])
                ->contain(['Usuarios', 'Cidades'])
                ->where(['coordenadorias.id IS NOT' => null]);

        $this->set('busca', $this->getSearch($query));

        $this->set('coordenadorias', $this->paginate($query));

    }



    /**
     * View method
     *
     * @param string|null $id Coordenadoria id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coordenadoria = $this->Coordenadorias->get($id, [
            'contain' => ['Usuarios', 'Cidades']
        ]);

        $this->set('coordenadoria', $coordenadoria);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coordenadoria = $this->Coordenadorias->newEntity();
        if ($this->request->is('post')) {
            $coordenadoria = $this->Coordenadorias->patchEntity($coordenadoria, $this->request->getData());
            if ($this->Coordenadorias->save($coordenadoria)) {
                $this->Flash->success(__('The coordenadoria has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coordenadoria could not be saved. Please, try again.'));
        }
        $usuarios = $this->Coordenadorias->Usuarios->find('list', ['limit' => 200]);
        $cidades = $this->Coordenadorias->Cidades->find('list', ['limit' => 200]);
        $this->set(compact('coordenadoria', 'usuarios', 'cidades'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Coordenadoria id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coordenadoria = $this->Coordenadorias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coordenadoria = $this->Coordenadorias->patchEntity($coordenadoria, $this->request->getData());
            if ($this->Coordenadorias->save($coordenadoria)) {
                $this->Flash->success(__('The coordenadoria has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The coordenadoria could not be saved. Please, try again.'));
        }
        $usuarios = $this->Coordenadorias->Usuarios->find('list', ['limit' => 200]);
        $cidades = $this->Coordenadorias->Cidades->find('list', ['limit' => 200]);
        $this->set(compact('coordenadoria', 'usuarios', 'cidades'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Coordenadoria id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coordenadoria = $this->Coordenadorias->get($id);
        if ($this->Coordenadorias->delete($coordenadoria)) {
            
        } else {
            $this->Flash->error(__('The coordenadoria could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
