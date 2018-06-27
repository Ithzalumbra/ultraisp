<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Analysisresult Controller
 *
 * @property \App\Model\Table\AnalysisresultTable $Analysisresult
 *
 * @method \App\Model\Entity\Analysisresult[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnalysisresultController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AnalysisSamples', 'AnalysisTypes']
        ];
        $analysisresult = $this->paginate($this->Analysisresult);

        $this->set(compact('analysisresult'));
    }

    /**
     * View method
     *
     * @param string|null $id Analysisresult id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $analysisresult = $this->Analysisresult->get($id, [
            'contain' => ['AnalysisSamples', 'AnalysisTypes']
        ]);

        $this->set('analysisresult', $analysisresult);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $analysisresult = $this->Analysisresult->newEntity();
        if ($this->request->is('post')) {
            $analysisresult = $this->Analysisresult->patchEntity($analysisresult, $this->request->getData());
            if ($this->Analysisresult->save($analysisresult)) {
                $this->Flash->success(__('The analysisresult has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The analysisresult could not be saved. Please, try again.'));
        }
        $analysisSamples = $this->Analysisresult->AnalysisSamples->find('list', ['limit' => 200]);
        $analysisTypes = $this->Analysisresult->AnalysisTypes->find('list', ['limit' => 200]);
        $this->set(compact('analysisresult', 'analysisSamples', 'analysisTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Analysisresult id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $analysisresult = $this->Analysisresult->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $analysisresult = $this->Analysisresult->patchEntity($analysisresult, $this->request->getData());
            if ($this->Analysisresult->save($analysisresult)) {
                $this->Flash->success(__('The analysisresult has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The analysisresult could not be saved. Please, try again.'));
        }
        $analysisSamples = $this->Analysisresult->AnalysisSamples->find('list', ['limit' => 200]);
        $analysisTypes = $this->Analysisresult->AnalysisTypes->find('list', ['limit' => 200]);
        $this->set(compact('analysisresult', 'analysisSamples', 'analysisTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Analysisresult id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $analysisresult = $this->Analysisresult->get($id);
        if ($this->Analysisresult->delete($analysisresult)) {
            $this->Flash->success(__('The analysisresult has been deleted.'));
        } else {
            $this->Flash->error(__('The analysisresult could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
