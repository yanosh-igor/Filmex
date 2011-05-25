<?php
class TypesController extends AppController{
	var $name = 'Types';
	var $helpers = array('Html','Form');
	
	function index(){
$this->Type->recursive = 0;  
   
    $types = $this->Type->find('all',array('conditions'=>array('status' => 1)));  
    $this->set('types', $types); 
}

	function view($slug = null){
	if(!$slug){
	$this->Session->setFlash('Invalid id for Type', 'flash_bad');
	$this->redirect(array('action'=>'index'));  
	}
	$type = $this->Type->findBySlug($slug);
	if(!empty($type))	{
	$this->set('type',$type);
		}else{
	$this->Session->setFlash('Invalid id for Type', 'flash_bad');
	$this->redirect(array('action'=>'index'));  
	}
}

	function admin_index(){
$this->Type->recursive = 0;  
   
    $types = $this->Type->find('all',array('conditions'=>array('status' => 1	)));  
    $this->set('types', $types);  
	}
	
	function admin_add(){
	if(!empty($this->data)){
		$this->Type->create();
		$this->data['Type']['slug'] = $this->slug($this->data['Type']['name'] );
		if($this->Type->save($this->data)){
		$this->Session->setFlash(__('The Type has been saved', true));
				$this->redirect(array('action' => 'index'));
		}else {
				$this->Session->setFlash(__('The Type could not be saved. Please, try again.', true));
			}
		
	}
	}
	
	function admin_edit($id = null){
	if(!$id && empty($this->data)){
	 $this->Session->setFlash('Invalid Type', 'flash_bad');  
        // redirect the user  
        $this->redirect(array('action'=>'index')); 
	
}
	
	if(!empty($this->data)){
		
		$this->data['Type']['slug'] = $this->slug($this->data['Type']['name'] );
		if($this->Type->save($this->data)){
		$this->Session->setFlash(__('The Type has been saved', true));
				$this->redirect(array('action' => 'index'));
		}else {
				$this->Session->setFlash(__('The Type could not be saved. Please, try again.', true));
			}
		
	}
	
	if (empty($this->data)){
	$this->data = $this->Type->read(null,$id);
	
}
	}
	
	function admin_delete($id = null){
	 if (!$id) {  
        $this->Session->setFlash('Invalid id for Type', 'flash_bad');  
        $this->redirect(array('action'=>'index'));  
    }  
	$this->Type->id = $id;
	if($this->Type->saveField('status',0) ){
	  $this->Session->setFlash('The Type was successfully deleted.', 'flash_good');  
	  }else{
	   $this->Session->setFlash('The Type could not be deleted. Please try again.', 'flash_bad'); 
	   }
	 $this->redirect(array('action'=>'index'));  
	}
}

?>