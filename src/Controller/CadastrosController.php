<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cadastros Controller
 *
 * @property \App\Model\Table\CadastrosTable $Cadastros
 *
 * @method \App\Model\Entity\Cadastro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CadastrosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->export();
        
        $this->makeSearch($this->request->query, $search, $where, $value);

        $query = $this->Cadastros
        ->find('search', ['search' => $search])
                        ->where(['cadastros.id ' . $where => $value]);

        $this->set('busca', $this->getSearch($query));

        $this->set('cadastros', $this->paginate($query));

    }



    /**
     * View method
     *
     * @param string|null $id Cadastro id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cadastro = $this->Cadastros->get($id, [
            'contain' => ['Cadastros']
        ]);

        $this->set('cadastro', $cadastro);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cadastro = $this->Cadastros->newEntity();
        if ($this->request->is('post')) {
            $cadastro = $this->Cadastros->patchEntity($cadastro, $this->request->getData());
            if ($this->Cadastros->save($cadastro)) {
                $this->Flash->success(__('The cadastro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cadastro could not be saved. Please, try again.'));
        }
        $this->set(compact('cadastro'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cadastro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cadastro = $this->Cadastros->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cadastro = $this->Cadastros->patchEntity($cadastro, $this->request->getData());
            if ($this->Cadastros->save($cadastro)) {
                $this->Flash->success(__('The cadastro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cadastro could not be saved. Please, try again.'));
        }
        $this->set(compact('cadastro'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cadastro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cadastro = $this->Cadastros->get($id);
        if ($this->Cadastros->delete($cadastro)) {
            
        } else {
            $this->Flash->error(__('The cadastro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
