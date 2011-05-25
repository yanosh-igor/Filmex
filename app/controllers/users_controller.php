<?php 
class UsersController extends AppController {  
    // name variable  
    var $name = 'Users';  
  
   
    var $helpers = array('Html', 'Form');  
  
  
   function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('admin_add');
		
		if ($this->action == 'admin_add' || $this->action == 'admin_edit'){
			$this->Auth->authenticate = $this->User;
		}
		
	}
	
	
	function admin_login(){
		
	}
	function admin_logout(){
		$this->redirect($this->Auth->logout());
	}
	
	function admin_index() {
		$this->User->recursive = 0;
		
		
       $this->set('users',$this->User->find('all', array('conditions' => array('User.id' =>  $this->Auth->user('id')))));
	}
	
	function admin_add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
	}
	
	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
  
} 
?>