<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Phone Controller
 *
 * @property \App\Model\Table\PhoneTable $Phone
 *
 * @method \App\Model\Entity\Phone[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhoneController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Particulars']
        ];
        $phone = $this->paginate($this->Phone);

        $this->set(compact('phone'));
    }

    /**
     * View method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $phone = $this->Phone->get($id, [
            'contain' => ['Particulars']
        ]);

        $this->set('phone', $phone);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $phone = $this->Phone->newEntity();
        if ($this->request->is('post')) {
            $phone = $this->Phone->patchEntity($phone, $this->request->getData());
            if ($this->Phone->save($phone)) {
                $this->Flash->success(__('The phone has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The phone could not be saved. Please, try again.'));
        }
        $particulars = $this->Phone->Particulars->find('list', ['limit' => 200]);
        $this->set(compact('phone', 'particulars'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $phone = $this->Phone->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $phone = $this->Phone->patchEntity($phone, $this->request->getData());
            if ($this->Phone->save($phone)) {
                $this->Flash->success(__('The phone has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The phone could not be saved. Please, try again.'));
        }
        $particulars = $this->Phone->Particulars->find('list', ['limit' => 200]);
        $this->set(compact('phone', 'particulars'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $phone = $this->Phone->get($id);
        if ($this->Phone->delete($phone)) {
            $this->Flash->success(__('The phone has been deleted.'));
        } else {
            $this->Flash->error(__('The phone could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
