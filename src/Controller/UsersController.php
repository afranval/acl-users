<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
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
        $this->Auth->allow(['logout']);
    }
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);        
        $this->loadModel('Roles');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $conditionsRol = [];
        $conditionsUser = [];
        /**
         * Get query to search
         */
        if(@$this->request->getQuery('search')){            
            $conditionsUser[] = [
                "username LIKE" => "%" . $this->request->getQuery('username') . "%",
                "email LIKE"    => "%" . $this->request->getQuery('email') . "%", 
            ];
            $conditionsRol[] = @$this->request->getQuery('role_id') ? ['Roles.id' => $this->request->getQuery('role_id')] : null;            
            $this->set("get", $this->request->getQuery());
        }

        $this->paginate = [
            'contain' => [
                'Roles'=> [
                    'conditions' => $conditionsRol
                ]
            ],
            'conditions' => $conditionsUser
        ];        
        $users = $this->paginate($this->Users);
        $roles = $this->Roles->find('list', ['keyField' => 'id', 'valueField' => 'name', 'limit' => 200]);

        $this->set(compact('users','roles'));
    }
    /**
     * Login method
     * 
     * @return \Cake\Http\Response|null
     */

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                // User data saving in the session
                $this->request->session()->write("User.data", $this->Users->get($user['id'], [
                    'contain' => ['Roles']
                ]));
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }
    /**
     * Logout method
     * 
     * @return \Cake\Http\Response|null
     */
    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        $this->request->session()->consume("User");
        return $this->redirect($this->Auth->logout());
    }
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->checkRoleAdmin();
        $user = $this->Users->get($id, [
            'contain' => ['Roles'],
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
        $this->checkRoleAdmin();
        
        $errors = [];
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
            
            $errors = @$user->getErrors();
            $this->set(compact("errors"));
        }
        $roles = $this->Roles->find('list', ['keyField' => 'id', 'valueField' => 'name', 'limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->checkRoleAdmin();
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Roles->find('list', ['keyField' => 'id', 'valueField' => 'name', 'limit' => 200]);                    
        $this->set(compact('user', 'roles'));
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
        $this->checkRoleAdmin();
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
