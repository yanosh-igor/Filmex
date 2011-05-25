<?php
class FormatsController extends AppController{
	var $name = 'Formats';
	var $helpers = array('Html','Form');
	
	function index(){
$this->Format->recursive = 0;  
   
    $formats = $this->Format->find('all',array('conditions'=>array('status' => 1	)));  
    $this->set('formats', $formats); 
}

	function view($slug = null){
	if(!$slug){
	$this->Session->setFlash('Invalid id for Format', 'flash_bad');
	$this->redirect(array('action'=>'index'));  
	}
	$format = $this->Format->findBySlug($slug);
	if(!empty($format))	{
	$this->set('format',$format);
		}else{
	$this->Session->setFlash('Invalid id for Format', 'flash_bad');
	$this->redirect(array('action'=>'index'));  
	}
}

	function admin_index(){
$this->Format->recursive = 0;  
   
    $formats = $this->Format->find('all',array('conditions'=>array('status' => 1	)));  
    $this->set('formats', $formats);  
	}
	
	function admin_add(){
	if(!empty($this->data)){
		$this->Format->create();
		$this->data['Format']['slug'] = $this->slug($this->data['Format']['name'] );
		if($this->Format->save($this->data)){
		$this->Session->setFlash(__('The format has been saved', true));
				$this->redirect(array('action' => 'index'));
		}else {
				$this->Session->setFlash(__('The film could not be saved. Please, try again.', true));
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
		
		$this->data['Format']['slug'] = $this->slug($this->data['Format']['name'] );
		if($this->Format->save($this->data)){
		$this->Session->setFlash(__('The format has been saved', true));
				$this->redirect(array('action' => 'index'));
		}else {
				$this->Session->setFlash(__('The film could not be saved. Please, try again.', true));
			}
		
	}
	
	if (empty($this->data)){
	$this->data = $this->Format->read(null,$id);
	
}
	}
	
	function admin_delete($id = null){
	 if (!$id) {  
        $this->Session->setFlash('Invalid id for Format', 'flash_bad');  
        $this->redirect(array('action'=>'index'));  
    }  
	$this->Format->id = $id;
	if($this->Format->saveField('status',0) ){
	  $this->Session->setFlash('The Format was successfully deleted.', 'flash_good');  
	  }else{
	   $this->Session->setFlash('The Format could not be deleted. Please try again.', 'flash_bad'); 
	   }
	 $this->redirect(array('action'=>'index'));  
	}
}

?>