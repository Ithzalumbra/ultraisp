<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * User Controller
 *
 * @property \App\Model\Table\UserTable $User
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usertypes']
        ];
        $user = $this->paginate($this->User);

        $this->set(compact('user'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->User->get($id, [
            'contain' => ['Usertypes', 'Analysissamples']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->User->newEntity();
        if ($this->request->is('post')) {
            $user = $this->User->patchEntity($user, $this->request->getData());
            if ($this->User->save($user)) {
                $this->Flash->success(__('El usuario se ha registrado correctamentes.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ha ocurrido un error, por favor intente nuevamente.'));
        }
        $usertypes = $this->User->Usertypes->find('list', ['limit' => 200]);
        $this->set(compact('user', 'usertypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->User->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->User->patchEntity($user, $this->request->getData());
            if ($this->User->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $usertypes = $this->User->Usertypes->find('list', ['limit' => 200]);
        $this->set(compact('user', 'usertypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->User->get($id);
        if ($this->User->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if ($this->request->is(['post'])) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('RUT o contraseña incorrecto.'));
            }
        }
    }

    public function logout()
    {
        $this->Flash->success('Has cerrado sesión correctamente.');
        return $this->redirect($this->Auth->logout());
    }

    public function register()
    {
        $user = $this->User->newEntity();
        if ($this->request->is('post')) {
            $user = $this->User->patchEntity($user, $this->request->getData());
            if($user->usertype_id == 3 || $user->usertype_id == 5){
                if ($this->User->save($user)) {
                    $this->Flash->success(__('El usuario se ha registrado correctamentes.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Ha ocurrido un error, por favor intente nuevamente.'));
            }
            else{
                $this->Flash->error(__('Por favor no modificar datos NO autorizados.'));
            }
        }
        $usertypes = $this->User->Usertypes->find('list', ['limit' => 200]);
        $this->set(compact('user', 'usertypes'));
    }
}
