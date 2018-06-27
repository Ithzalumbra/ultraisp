<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Analysissamples Controller
 *
 * @property \App\Model\Table\AnalysissamplesTable $Analysissamples
 *
 * @method \App\Model\Entity\Analysissample[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnalysissamplesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $analysissamples = $this->paginate($this->Analysissamples);

        $this->set(compact('analysissamples'));
    }

    /**
     * View method
     *
     * @param string|null $id Analysissample id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $analysissample = $this->Analysissamples->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('analysissample', $analysissample);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $analysissample = $this->Analysissamples->newEntity();
        if ($this->request->is('post')) {
            $analysissample = $this->Analysissamples->patchEntity($analysissample, $this->request->getData());
            if ($this->Analysissamples->save($analysissample)) {
                $this->Flash->success(__('The analysissample has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The analysissample could not be saved. Please, try again.'));
        }
        $users = $this->Analysissamples->Users->find('list', ['limit' => 200]);
        $this->set(compact('analysissample', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Analysissample id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $analysissample = $this->Analysissamples->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $analysissample = $this->Analysissamples->patchEntity($analysissample, $this->request->getData());
            if ($this->Analysissamples->save($analysissample)) {
                $this->Flash->success(__('The analysissample has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The analysissample could not be saved. Please, try again.'));
        }
        $users = $this->Analysissamples->Users->find('list', ['limit' => 200]);
        $this->set(compact('analysissample', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Analysissample id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $analysissample = $this->Analysissamples->get($id);
        if ($this->Analysissamples->delete($analysissample)) {
            $this->Flash->success(__('The analysissample has been deleted.'));
        } else {
            $this->Flash->error(__('The analysissample could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
