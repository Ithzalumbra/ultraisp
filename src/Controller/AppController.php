<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    private $_currentUser = null;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'loginAction' => [
               'controller' => 'Users',
               'action' => 'login'
            ],
            'loginRedirect' => [
               'controller' => 'Users',
               'action' => 'index'
            ],
            'logoutRedirect' => [
               'controller' => 'Users',
               'action' => 'logout'
            ],
            'authError' => 'No puedes acceder a esa sección.',
            'flash' => [
                'element' => 'error'
            ],
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Users',
                    'fields' => ['username' => 'rut', 'password' => 'password']
                ]
            ]
       ]);
        $this->Auth->allow([
          'login'

       ]);



        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function beforeFilter(Event $event){
        if($this->Auth->user() !== null) {
            $this->set('currentUser', $this->Auth->user());
            $this->currentUser = $this->Auth->user();
            if($this->request->getParam("action") == 'login'){
                $this->redirect(['controller' => 'Users', 'action' => 'index']);
            }
        }
    }

    protected function getCurrentUser(){
        return $this->currentUser;
    }
}
