<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * AnalysisResults Controller
 *
 * @property \App\Model\Table\AnalysisResultsTable $AnalysisResults
 *
 * @method \App\Model\Entity\AnalysisResult[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnalysisResultsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Search.Prg', [
            'actions' => ['index']
        ]);
        $this->Auth->allow('home');
    }

    public function home(){}

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

        if ($this->getCurrentUser()['usertype_id'] != 1 || $this->getCurrentUser()['usertype_id'] != 2 || $this->getCurrentUser()['usertype_id'] != 4) {
            $analysisResults = $this->AnalysisResults->find('search', ['search' => $this->request->query])->where(['AnalysisSamples.user_id' => $this->getCurrentUser()['id']])->group('analysisSamples_id')->contain(['AnalysisSamples']);
        }

        else {
            $analysisResults = $this->AnalysisResults->find('search', ['search' => $this->request->query]);
        }

        $analysisResults = $this->paginate($analysisResults);
        $this->set(compact('analysisResults'));
    }

    /**
     * View method
     *
     * @param string|null $id Analysis Result id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $analysisResult = $this->AnalysisResults->get($id, [
            'contain' => ['AnalysisSamples', 'AnalysisTypes']
        ]);

        $this->set('analysisResult', $analysisResult);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $analysisResult = $this->AnalysisResults->newEntity();
        if ($this->request->is('post')) {
            $analysisResult = $this->AnalysisResults->patchEntity($analysisResult, $this->request->getData());
            if ($this->AnalysisResults->save($analysisResult)) {
                $this->Flash->success(__('The analysis result has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The analysis result could not be saved. Please, try again.'));
        }
        $analysisSamples = $this->AnalysisResults->AnalysisSamples->find('list', ['limit' => 200]);
        $analysisTypes = $this->AnalysisResults->AnalysisTypes->find('list', ['limit' => 200]);
        $this->set(compact('analysisResult', 'analysisSamples', 'analysisTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Analysis Result id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $analysisResult = $this->AnalysisResults->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $analysisResult = $this->AnalysisResults->patchEntity($analysisResult, $this->request->getData());
            if ($this->AnalysisResults->save($analysisResult)) {
                $this->Flash->success(__('The analysis result has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The analysis result could not be saved. Please, try again.'));
        }
        $analysisSamples = $this->AnalysisResults->AnalysisSamples->find('list', ['limit' => 200]);
        $analysisTypes = $this->AnalysisResults->AnalysisTypes->find('list', ['limit' => 200]);
        $this->set(compact('analysisResult', 'analysisSamples', 'analysisTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Analysis Result id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $analysisResult = $this->AnalysisResults->get($id);
        if ($this->AnalysisResults->delete($analysisResult)) {
            $this->Flash->success(__('The analysis result has been deleted.'));
        } else {
            $this->Flash->error(__('The analysis result could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function details()
    {
        $idResult = $this->request->params['id'];
        if ($this->getCurrentUser()['usertype_id'] != 1 || $this->getCurrentUser()['usertype_id'] != 2 || $this->getCurrentUser()['usertype_id'] != 4) {
            $analysisDetails = $this->AnalysisResults->find()->where(['AnalysisResults.analysisSamples_id' => $idResult])->contain(['AnalysisTypes']);
        } else {
            $analysisDetails = $this->AnalysisResults->find('all');
        }
        $names = null;
        $ppms = null;
        foreach ($analysisDetails as $key => $asam) {
            $names =  $names.'\''.$asam->analysis_type->name.'\''.', ';
            $ppms = $ppms.$asam->ppm.', ';
        }
        $names = substr($names, 0, -2);
        $ppms = substr($ppms, 0, -2);

        $data = ['name' => $names, 'ppm' => $ppms];
        $this->set(compact('analysisDetails', 'data'));

    }


    public function fillPpm()
    {
        $idResult = $this->request->params['id'];
            $analysisDetails = $this->AnalysisResults->find()->where(['AnalysisResults.analysisSamples_id' => $idResult])->contain(['AnalysisTypes','AnalysisSamples']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            pr('======================================');
            $analysisResult = $this->AnalysisResults->newEntities( $this->request->getData()['resultado']);

            foreach ($analysisResult as $ar){
                $ar->analysisSamples_id = $idResult;
                $ar->status = 1;
            }
            if ($this->AnalysisResults->saveMany($analysisResult)) {

                $this->Flash->success(__('Los datos se han guardado correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ha ocurrido un error.'));
        }


        $this->set(compact('analysisDetails'));

    }
}
