<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {




//http://www.moonmile.net/blog/archives/4855
//http://book.cakephp.org/2.0/ja/tutorials-and-examples/blog-auth-example/auth.html
 
 public function beforeFilter() {
        parent::beforeFilter();
        // ユーザー自身による登録とログアウトを許可する
        $this->Auth->allow('add');
    }
//http://www.moonmile.net/blog/archives/4855
    /*
  ログイン*/
public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            //$this->redirect($this->Auth->redirect());
             $this->redirect(array('controller'=>'posts','action'=>'index'));
        } else {
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }
}
 
/**
 * ログアウト
 */
public function logout() {
    $this->redirect($this->Auth->logout());
}
 

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }
 
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            //__('文字列')はグローバル定数で国際化に利用
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }
 
/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }
 
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }
 
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }




     //履歴について  
    public function history($id=null){
        $this->User->id=$id;
        $this->set('user',$this->User->read());

    }
}