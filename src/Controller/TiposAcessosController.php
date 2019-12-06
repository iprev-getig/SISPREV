<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TiposAcessos Controller
 *
 * @property \App\Model\Table\TiposAcessosTable $TiposAcessos
 *
 * @method \App\Model\Entity\TiposAcesso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TiposAcessosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $_ext = $this->request->params['_ext'];
        if (!$_ext == 'xlsx') {
            $this->makeSearch($this->request->query, $search, $where, $value);

            $query = $this->TiposAcessos
            ->find('search', ['search' => $search])
                                    ->where(['tiposAcessos.id ' . $where => $value]);

            $this->set('busca', $this->getSearch($query));

            $this->set('tiposAcessos', $this->paginate($query));
        } else {
            $rows = $this->TiposAcessos->find('all');
            $this->set('rows', $rows);
        }
    }



    /**
     * View method
     *
     * @param string|null $id Tipos Acesso id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tiposAcesso = $this->TiposAcessos->get($id, [
            'contain' => []
        ]);

        $this->set('tiposAcesso', $tiposAcesso);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tiposAcesso = $this->TiposAcessos->newEntity();
        if ($this->request->is('post')) {
            $tiposAcesso = $this->TiposAcessos->patchEntity($tiposAcesso, $this->request->getData());
            if ($this->TiposAcessos->save($tiposAcesso)) {
                $this->Flash->success(__('The tipos acesso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipos acesso could not be saved. Please, try again.'));
        }
        $this->set(compact('tiposAcesso'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipos Acesso id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tiposAcesso = $this->TiposAcessos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tiposAcesso = $this->TiposAcessos->patchEntity($tiposAcesso, $this->request->getData());
            if ($this->TiposAcessos->save($tiposAcesso)) {
                $this->Flash->success(__('The tipos acesso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipos acesso could not be saved. Please, try again.'));
        }
        $this->set(compact('tiposAcesso'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipos Acesso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tiposAcesso = $this->TiposAcessos->get($id);
        if ($this->TiposAcessos->delete($tiposAcesso)) {
            
        } else {
            $this->Flash->error(__('The tipos acesso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
