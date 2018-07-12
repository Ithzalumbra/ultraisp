<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

/**
 * AnalysisSamples Controller
 *
 * @property \App\Model\Table\AnalysisSamplesTable $AnalysisSamples
 *
 * @method \App\Model\Entity\AnalysisSample[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnalysisSamplesController extends AppController
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
        $analysisSamples = $this->paginate($this->AnalysisSamples);

        $this->set(compact('analysisSamples'));
    }

    /**
     * View method
     *
     * @param string|null $id Analysis Sample id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $analysisSample = $this->AnalysisSamples->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('analysisSample', $analysisSample);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $analysisSample = $this->AnalysisSamples->newEntity();
        $anal = TableRegistry::get('AnalysisTypes');
        $analysisT = $anal->find('list');
        if ($this->request->is('post')) {

            $analysisSample = $this->AnalysisSamples->patchEntity($analysisSample, $this->request->getData());
            $analysisSample->user_id = $this->getCurrentUser()['id'];
            if ($this->AnalysisSamples->save($analysisSample)) {

                $types = $this->request->data['analysistypes'];
                $analysisResultsTable = TableRegistry::get('AnalysisResults');
                $analysisResults = $analysisResultsTable->newEntities($types);
                $aux = 0;
                foreach ($analysisResults as $res) {
                    $res->ppm = 0;
                    $res->date_register = $time = Time::now();
                    $res->status = 0;
                    $res->user_id = $this->getCurrentUser()['id'];
                    $res->analysisSamples_id = $analysisSample->id;
                    $res->dirty('analysis_type', true);
                }
                foreach ($types as $t) {
                    $analysisResults[$aux]->analysisType_id = $t['analysis_type'];
                    $aux++;
                }

                $this->Flash->success(__('La muestras han sido ingresadas correctamente.'));
//                pr($analysisResults); die;
                if($analysisResultsTable->saveMany($analysisResults))
                {
                    $this->Flash->success(__('La tipos de prueba han sido ingresadas correctamente.'));
                }

                return $this->redirect(['controller' => 'AnalysisResults', 'action' => 'index']);
                 }
                $this->Flash->error(__('The analysis sample could not be saved. Please, try again.'));
            }
            $users = $this->AnalysisSamples->Users->find('list', ['limit' => 200]);
            $this->set(compact('analysisSample', 'users', 'analysisT'));
        }

        /**
         * Edit method
         *
         * @param string|null $id Analysis Sample id.
         * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
         * @throws \Cake\Network\Exception\NotFoundException When record not found.
         */
        public
        function edit($id = null)
        {
            $analysisSample = $this->AnalysisSamples->get($id, [
                'contain' => []
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $analysisSample = $this->AnalysisSamples->patchEntity($analysisSample, $this->request->getData());
                if ($this->AnalysisSamples->save($analysisSample)) {
                    $this->Flash->success(__('The analysis sample has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The analysis sample could not be saved. Please, try again.'));
            }
            $users = $this->AnalysisSamples->Users->find('list', ['limit' => 200]);
            $this->set(compact('analysisSample', 'users'));
        }

        /**
         * Delete method
         *
         * @param string|null $id Analysis Sample id.
         * @return \Cake\Http\Response|null Redirects to index.
         * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
         */
        public
        function delete($id = null)
        {
            $this->request->allowMethod(['post', 'delete']);
            $analysisSample = $this->AnalysisSamples->get($id);
            if ($this->AnalysisSamples->delete($analysisSample)) {
                $this->Flash->success(__('The analysis sample has been deleted.'));
            } else {
                $this->Flash->error(__('The analysis sample could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        }
    }
