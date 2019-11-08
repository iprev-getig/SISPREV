<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Orgao Controller
 *
 * @property \App\Model\Table\OrgaoTable $Orgao
 *
 * @method \App\Model\Entity\Orgao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrgaoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $orgao = $this->paginate($this->Orgao);

        $this->set(compact('orgao'));
    }

    /**
     * View method
     *
     * @param string|null $id Orgao id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orgao = $this->Orgao->get($id, [
            'contain' => ['Ordem']
        ]);

        $this->set('orgao', $orgao);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orgao = $this->Orgao->newEntity();
        if ($this->request->is('post')) {
            $orgao = $this->Orgao->patchEntity($orgao, $this->request->getData());
            if ($this->Orgao->save($orgao)) {
                $this->Flash->success(__('The orgao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orgao could not be saved. Please, try again.'));
        }
        $this->set(compact('orgao'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orgao id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orgao = $this->Orgao->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orgao = $this->Orgao->patchEntity($orgao, $this->request->getData());
            if ($this->Orgao->save($orgao)) {
                $this->Flash->success(__('The orgao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orgao could not be saved. Please, try again.'));
        }
        $this->set(compact('orgao'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orgao id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orgao = $this->Orgao->get($id);
        if ($this->Orgao->delete($orgao)) {
            $this->Flash->success(__('The orgao has been deleted.'));
        } else {
            $this->Flash->error(__('The orgao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
