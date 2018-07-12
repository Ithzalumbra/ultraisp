<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AnalysisTypes Controller
 *
 * @property \App\Model\Table\AnalysisTypesTable $AnalysisTypes
 *
 * @method \App\Model\Entity\AnalysisType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnalysisTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $analysisTypes = $this->paginate($this->AnalysisTypes);
        $this->set(compact('analysisTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Analysis Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $analysisType = $this->AnalysisTypes->get($id, [
            'contain' => []
        ]);

        $this->set('analysisType', $analysisType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $analysisType = $this->AnalysisTypes->newEntity();
        $analysisTypes = $this->paginate($this->AnalysisTypes);


        if ($this->request->is('post')) {
            $analysisType = $this->AnalysisTypes->patchEntity($analysisType, $this->request->getData());
            if ($this->AnalysisTypes->save($analysisType)) {
                $this->Flash->success(__('The analysis type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The analysis type could not be saved. Please, try again.'));
        }
        $this->set(compact('analysisTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Analysis Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $analysisType = $this->AnalysisTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $analysisType = $this->AnalysisTypes->patchEntity($analysisType, $this->request->getData());
            if ($this->AnalysisTypes->save($analysisType)) {
                $this->Flash->success(__('The analysis type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The analysis type could not be saved. Please, try again.'));
        }
        $this->set(compact('analysisType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Analysis Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $analysisType = $this->AnalysisTypes->get($id);
        if ($this->AnalysisTypes->delete($analysisType)) {
            $this->Flash->success(__('The analysis type has been deleted.'));
        } else {
            $this->Flash->error(__('The analysis type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
