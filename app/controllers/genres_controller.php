<?php
class GenresController extends AppController{
	var $name = 'Genres';
	var $helpers = array('Html','Form','Javascript','Misc' );
	
	
	function index(){
    $genres = $this->Genre->find('all',array('conditions'=>array('status' => 1)));  
    $this->set('genres', $genres); 
}

	function view($slug = null){
	if(!$slug){
	$this->Session->setFlash('Invalid id for Genre', 'flash_bad');
	$this->redirect(array('action'=>'index'));  
	}
	$genre = $this->Genre->findBySlug($slug);
	
	if(!empty($genre))	{
	$this->set('genre',$genre);
		}else{
	$this->Session->setFlash('Invalid id for Genre', 'flash_bad');
	$this->redirect(array('action'=>'index'));  
	}
}

	function admin_index(){
$recursive=0;
$genres = $this->Genre->find('all',array('conditions'=>array('Genre.status' => 1),
									'order' => array('Genre.name' => 'ASC'))
);  
    $this->set('genres', $genres);  
	}
	
	function admin_add(){
	if(!empty($this->data)){
		$this->Genre->create();
		$this->data['Genre']['slug'] = $this->slug($this->data['Genre']['name'] );
		if($this->Genre->save($this->data)){
		$this->Session->setFlash(__('The Genre has been saved', true));
				$this->redirect(array('action' => 'index'));
		}else {
				$this->Session->setFlash(__('The Genre could not be saved. Please, try again.', true));
			}
		
	}
	}
	
	function admin_edit($id = null){
		if(!$id && empty($this->data)){
	 $this->Session->setFlash('Invalid Genre', 'flash_bad');  
        // redirect the user  
        $this->redirect(array('action'=>'index')); 
	
}
	
	if(!empty($this->data)){
		
		$this->data['Genre']['slug'] = $this->slug($this->data['Genre']['name'] );
		if($this->Genre->save($this->data)){
		$this->Session->setFlash(__('The Genre has been saved', true));
				$this->redirect(array('action' => 'index'));
		}else {
				$this->Session->setFlash(__('The Genre could not be saved. Please, try again.', true));
			}
		
	}
	
	if (empty($this->data)){
	$this->data = $this->Genre->read(null,$id);
	
}
	}
	
	function admin_delete($id = null){
	 if (!$id) {  
        $this->Session->setFlash('Invalid id for Genre', 'flash_bad');  
        $this->redirect(array('action'=>'index'));  
    }  
	$this->Genre->id = $id;
	if($this->Genre->saveField('status',0) ){
	  $this->Session->setFlash('The Genre was successfully deleted.', 'flash_good');  
	  }else{
	   $this->Session->setFlash('The Genre could not be deleted. Please try again.', 'flash_bad'); 
	   }
	 $this->redirect(array('action'=>'index'));  
	}
	
	
	
	
}

?>