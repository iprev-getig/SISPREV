<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sistemas Controller
 *
 * @property \App\Model\Table\SistemasTable $Sistemas
 *
 * @method \App\Model\Entity\Sistema[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SistemasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->export();

        $query = $this->Sistemas->find('search', ['search' => 'all']);
        
        if ($this->getSearch() != '') {
            switch ($this->getSearch('field')) {
                case 'id':
                    $query->where(['sistemas.id ' => $this->getSearch()]);
                    break;
                //complete. Example:
                case 'sigla':
                    $query->where(['sistemas.sigla ILIKE ' => '%' . $this->getSearch() . '%']);
                    break;
                case 'nome':
                    $query->where(['sistemas.nome ILIKE ' => '%' . $this->getSearch() . '%']);
                    break;
                case 'descricao':
                    $query->where(['sistemas.descricao ILIKE ' => '%' . $this->getSearch() . '%']);
                    break;
                case 'icone':
                    $query->where(['sistemas.icone ILIKE ' => '%' . $this->getSearch() . '%']);
                    break;            





            }              
        }

        $this->setSearch();
        $this->set('options', array('id' => 'Id', 'sigla' => 'Sigla', 'nome' => 'Nome', 'descricao' => 'Descricao', 'icone' => 'Icone')); //complete

        $this->set('sistemas', $this->paginate($query));

    }



    /**
     * View method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sistema = $this->Sistemas->get($id, [
            'contain' => ['Acessos']
        ]);

        $this->set('sistema', $sistema);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sistema = $this->Sistemas->newEntity();
        if ($this->request->is('post')) {
            $sistema = $this->Sistemas->patchEntity($sistema, $this->request->getData());
            if ($this->Sistemas->save($sistema)) {
                $this->Flash->success(__('The sistema has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sistema could not be saved. Please, try again.'));
        }
        $this->set(compact('sistema'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sistema = $this->Sistemas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sistema = $this->Sistemas->patchEntity($sistema, $this->request->getData());
            if ($this->Sistemas->save($sistema)) {
                $this->Flash->success(__('The sistema has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sistema could not be saved. Please, try again.'));
        }
        $this->set(compact('sistema'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sistema = $this->Sistemas->get($id);
        if ($this->Sistemas->delete($sistema)) {
            
        } else {
            $this->Flash->error(__('The sistema could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
