<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TiposAtendimentos Controller
 *
 * @property \App\Model\Table\TiposAtendimentosTable $TiposAtendimentos
 *
 * @method \App\Model\Entity\TiposAtendimento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TiposAtendimentosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $query = $this->TiposAtendimentos
        ->find('search', ['search' => $this->request->query])
                        ->where(['tiposAtendimentos.id IS NOT' => null]);

        $this->set('busca', $this->getSearch($query));

        $this->set('tiposAtendimentos', $this->paginate($query));

    }



    /**
     * View method
     *
     * @param string|null $id Tipos Atendimento id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tiposAtendimento = $this->TiposAtendimentos->get($id, [
            'contain' => []
        ]);

        $this->set('tiposAtendimento', $tiposAtendimento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tiposAtendimento = $this->TiposAtendimentos->newEntity();
        if ($this->request->is('post')) {
            $tiposAtendimento = $this->TiposAtendimentos->patchEntity($tiposAtendimento, $this->request->getData());
            if ($this->TiposAtendimentos->save($tiposAtendimento)) {
                $this->Flash->success(__('The tipos atendimento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipos atendimento could not be saved. Please, try again.'));
        }
        $this->set(compact('tiposAtendimento'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipos Atendimento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tiposAtendimento = $this->TiposAtendimentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tiposAtendimento = $this->TiposAtendimentos->patchEntity($tiposAtendimento, $this->request->getData());
            if ($this->TiposAtendimentos->save($tiposAtendimento)) {
                $this->Flash->success(__('The tipos atendimento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipos atendimento could not be saved. Please, try again.'));
        }
        $this->set(compact('tiposAtendimento'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipos Atendimento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tiposAtendimento = $this->TiposAtendimentos->get($id);
        if ($this->TiposAtendimentos->delete($tiposAtendimento)) {
            
        } else {
            $this->Flash->error(__('The tipos atendimento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
