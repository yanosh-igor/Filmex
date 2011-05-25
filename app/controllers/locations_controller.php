<?php
class LocationsController extends AppController{
	var $name = 'Locations';
	var $helpers = array('Html','Form');
	
	function index(){
$this->Location->recursive = 0;  
   
    $locations = $this->Location->find('all',array('conditions'=>array('status' => 1)));  
    $this->set('locations', $locations); 
}

	function view($slug = null){
	if(!$slug){
	$this->Session->setFlash('Invalid id for Location', 'flash_bad');
	$this->redirect(array('action'=>'index'));  
	}
	$location = $this->Location->findBySlug($slug);
	if(!empty($location))	{
	$this->set('location',$location);
		}else{
	$this->Session->setFlash('Invalid id for Location', 'flash_bad');
	$this->redirect(array('action'=>'index'));  
	}
}

	function admin_index(){
$this->Location->recursive = 0;  
   
    $locations = $this->Location->find('all',array('conditions'=>array('status' => 1	)));  
    $this->set('locations', $locations);  
	}
	
	function admin_add(){
	if(!empty($this->data)){
		$this->Location->create();
		$this->data['Location']['slug'] = $this->slug($this->data['Location']['name'] );
		if($this->Location->save($this->data)){
		$this->Session->setFlash(__('The location has been saved', true));
				$this->redirect(array('action' => 'index'));
		}else {
				$this->Session->setFlash(__('The Location could not be saved. Please, try again.', true));
			}
		
	}
	}
	
	function admin_edit($id = null){
	if(!$id && empty($this->data)){
	 $this->Session->setFlash('Invalid Format', 'flash_bad');  
        // redirect the user  
        $this->redirect(array('action'=>'index')); 
	
}
	
	if(!empty($this->data)){
		
		$this->data['Location']['slug'] = $this->slug($this->data['Location']['name'] );
		if($this->Location->save($this->data)){
		$this->Session->setFlash(__('The Location has been saved', true));
				$this->redirect(array('action' => 'index'));
		}else {
				$this->Session->setFlash(__('The Location could not be saved. Please, try again.', true));
			}
		
	}
	
	if (empty($this->data)){
	$this->data = $this->Location->read(null,$id);
	
}
	}
	
	function admin_delete($id = null){
	 if (!$id) {  
        $this->Session->setFlash('Invalid id for Location', 'flash_bad');  
        $this->redirect(array('action'=>'index'));  
    }  
	$this->Location->id = $id;
	if($this->Location->saveField('status',0) ){
	  $this->Session->setFlash('The Location was successfully deleted.', 'flash_good');  
	  }else{
	   $this->Session->setFlash('The Location could not be deleted. Please try again.', 'flash_bad'); 
	   }
	 $this->redirect(array('action'=>'index'));  
	}
}

?>