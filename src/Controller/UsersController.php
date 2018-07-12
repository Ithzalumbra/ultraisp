<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Search.Prg', [
            'actions' => ['index']
        ]);
    }

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
        $users = $this->Users->find('search', ['search' => $this->request->query])->contain('Usertypes');

        $this->set(compact('users'));
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
        $user = $this->Users->get($id, [
            'contain' => ['Usertypes', 'AnalysisSamples']
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
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->status = 1 ;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario se ha guardado correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ha ocurrido un error.'));
        }
        $usertypes = $this->Users->Usertypes->find('list', ['limit' => 200]);
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
        $id = $this->request->params['id'];
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Los datos se han guardado correctamente.'));

                return $this->redirect('/perfil/'.$this->getCurrentUser()['id']);
            }
            $this->Flash->error(__('Ha ocurrido un error.'));
        }
        $usertypes = $this->Users->Usertypes->find('list', ['limit' => 200]);
        $this->set(compact('user', 'usertypes'));
    }

    public function changeState($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if($user->status == 1)
                $user->status = 0;
            else
                $user->status = 1;
            if ($this->Users->save($user)) {
                return $this->redirect('/usuario');
            }
            $this->Flash->error(__('Ha ocurrido un error.'));
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
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
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
                if ($user['status'] == 1 ){
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }
                else{
                    $this->Flash->error(__('Su usuario se encuentra deshabilitado, hable con el administrador.'));
                }
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
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if($user->usertype_id == 3 || $user->usertype_id == 5){
                $user->status = 1;
                if ($this->Users->save($user)) {
                    if($user->usertype_id == 5 ){
                        $phone = $this->Users->Phones->newEntity();
                        $phone->phone =  $this->request->data['phone'];
                        $phone->user_id = $user->id;
                        if ($this->Users->Phones->save($phone)) {

                        }
                    }
                    else{
                        $contact = $this->Users->Contacts->newEntity();
                        $contact = $this->Users->Contacts->patchEntity($contact, $this->request->data['contact']);
                        $contact->user_id = $user->id;
                        $contact->rut = $this->request->data['contact']['rut'];
                        if ($this->Users->Contacts->save($contact)) {

                        }
                    }
                    $this->Flash->success(__('El usuario se ha registrado correctamentes.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Ha ocurrido un error, por favor intente nuevamente.'));
            }
            else{
                $this->Flash->error(__('Por favor no modificar datos NO autorizados.'));
            }
        }
//        $usertypes = $this->Users->Usertypes->find('list', ['limit' => 200]);
//        $this->set(compact('user', 'usertypes'));
    }

    public function extras($id = null)
    {
        if  ($this->getCurrentUser()['usertype_id']  == 3){
            $data = $this->Users->Contacts->find('all')->where(['user_id' => $this->getCurrentUser()['id']]);
        }
        else {
            $data = $this->Users->Phones->find('all')->where(['user_id' => $this->getCurrentUser()['id']]);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {


            if  ($this->getCurrentUser()['usertype_id']  == 3){


                $contacts = $this->Users->Contacts->newEntities($this->request->data['contact']);
                foreach ($contacts as $con){
                    $con->user_id = $this->getCurrentUser()['id'];
                }
                if ($this->Users->Contacts->saveMany($contacts)) {
                    $this->Flash->success(__('Los contactos se han guardado correctamente.'));

                    return $this->redirect('/perfil/'.$this->getCurrentUser()['id']);
                }
                $this->Flash->error(__('Ha ocurrido un error.'));
            }
            else {

                $phones = $this->Users->Phones->newEntities($this->request->data['phone']);
                foreach ($phones as $con){
                    $con->user_id = $this->getCurrentUser()['id'];
                }
                if ($this->Users->Phones->saveMany($phones)) {
                    $this->Flash->success(__('Los telefonos se han guardado correctamente.'));

                    return $this->redirect('/perfil/'.$this->getCurrentUser()['id']);
                }
                $this->Flash->error(__('Ha ocurrido un error.'));
            }

        }
        $this->set(compact('data'));
    }
}
