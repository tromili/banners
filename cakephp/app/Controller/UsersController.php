<?php
class UsersController extends AppController{
	
	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            $this->redirect($this->Auth->redirect());
	        } else {
	            $this->Session->setFlash(__('Invalid username or password, try again'));
	        }
	    }
	}


	public function admin_login() {
		if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            $this->redirect($this->Auth->redirect());
	        } else {
	            $this->Session->setFlash(__('Invalid username or password, try again'));
	        }
	    }
	}

	public function logout() {
	    $this->redirect($this->Auth->logout());
	}
	public function index()
	{
		$this->User->recursive = 0;
		$this->set('users',$this->paginate());
	}
	public function add()
	{
		if($this->request->is('post'))
		{
			$this->User->create();
			
			if ($this->User->save($this->data)) 
			{
				$this->Session->setFlash(__('the user has been saved'));
				$this->redirect(array('action' =>'index'));
			}
			else{
				$this->Session->setFlash(__('the user coul not be saved. Please, try again.'));
			}
		}else{
			//$this->request->data = $this->User->read(null, 1);
            //unset($this->request->data['User']['password']);
		}
	}
	public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}
?>