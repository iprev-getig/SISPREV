<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Orgaos Controller
 *
 * @property \App\Model\Table\OrgaosTable $Orgaos
 *
 * @method \App\Model\Entity\Orgao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrgaosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $query = $this->Orgaos
        ->find('search', ['search' => $this->request->query])
                ->contain(['Cidades'])
                ->where(['orgaos.id IS NOT' => null]);

        $this->set('busca', $this->getSearch($query));

        $this->set('orgaos', $this->paginate($query));

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
        $orgao = $this->Orgaos->get($id, [
            'contain' => ['Cidades']
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
        $orgao = $this->Orgaos->newEntity();
        if ($this->request->is('post')) {
            $orgao = $this->Orgaos->patchEntity($orgao, $this->request->getData());
            if ($this->Orgaos->save($orgao)) {
                $this->Flash->success(__('The orgao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orgao could not be saved. Please, try again.'));
        }
        $cidades = $this->Orgaos->Cidades->find('list', ['limit' => 200]);
        $this->set(compact('orgao', 'cidades'));
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
        $orgao = $this->Orgaos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orgao = $this->Orgaos->patchEntity($orgao, $this->request->getData());
            if ($this->Orgaos->save($orgao)) {
                $this->Flash->success(__('The orgao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orgao could not be saved. Please, try again.'));
        }
        $cidades = $this->Orgaos->Cidades->find('list', ['limit' => 200]);
        $this->set(compact('orgao', 'cidades'));
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
        $orgao = $this->Orgaos->get($id);
        if ($this->Orgaos->delete($orgao)) {
            
        } else {
            $this->Flash->error(__('The orgao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
