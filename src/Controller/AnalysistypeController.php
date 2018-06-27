<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Analysistype Controller
 *
 * @property \App\Model\Table\AnalysistypeTable $Analysistype
 *
 * @method \App\Model\Entity\Analysistype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnalysistypeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $analysistype = $this->paginate($this->Analysistype);

        $this->set(compact('analysistype'));
    }

    /**
     * View method
     *
     * @param string|null $id Analysistype id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $analysistype = $this->Analysistype->get($id, [
            'contain' => []
        ]);

        $this->set('analysistype', $analysistype);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $analysistype = $this->Analysistype->newEntity();
        if ($this->request->is('post')) {
            $analysistype = $this->Analysistype->patchEntity($analysistype, $this->request->getData());
            if ($this->Analysistype->save($analysistype)) {
                $this->Flash->success(__('The analysistype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The analysistype could not be saved. Please, try again.'));
        }
        $this->set(compact('analysistype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Analysistype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $analysistype = $this->Analysistype->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $analysistype = $this->Analysistype->patchEntity($analysistype, $this->request->getData());
            if ($this->Analysistype->save($analysistype)) {
                $this->Flash->success(__('The analysistype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The analysistype could not be saved. Please, try again.'));
        }
        $this->set(compact('analysistype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Analysistype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $analysistype = $this->Analysistype->get($id);
        if ($this->Analysistype->delete($analysistype)) {
            $this->Flash->success(__('The analysistype has been deleted.'));
        } else {
            $this->Flash->error(__('The analysistype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
