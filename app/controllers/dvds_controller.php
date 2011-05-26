<?php
class DvdsController extends AppController{
	var $name = 'Dvds';
	var $helpers = array('Html','Form','Javascript','Misc' );
	
	var $ratings = array('0'=>'0', '1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9', '10'=>'10');
	
	function index(){
		$formats = $this->Dvd->Format->find('list', array(
			'fields' => 'id, name', 
			'order'=>'Format.name', 
			'conditions'=> array(
				'Format.status'=>'1'
			)
		));
		$types = $this->Dvd->Type->find('list', array(
			'fields'=>'id, name', 
			'order'=>'Type.name', 
			'conditions'=> array(
				'Type.status'=>'1'
			)
		));
		$locations = $this->Dvd->Location->find('list', array(
			'fields'=>'id, name',
			'order'=>'Location.name', 
			'conditions'=> array(
				'Location.status'=>'1'
			)
		));
		$genres = $this->Dvd->Genre->find('list', array(
			'fields'=>'id, name', 
			'order'=>'Genre.name',
			'conditions'=> array(
				'Genre.status'=>'1'
			)
		));
		// add name to option
		$formats 	= array(''=>'Formats') + $formats;
		$types	 	= array(''=>'Types') + $types;
		$locations 	= array(''=>'Locations') + $locations;
		$genres 	= array(''=>'Genres') + $genres;
		// if form submitted
		if (!empty($this->data)) {
			// if reset button pressed redirect to index page
			if(isset($this->data['reset'])) {
				$this->redirect(array('action'=>'index'));
			}
		// init
			$url = '';
		// remove search key if not set
			if($this->data['search'] == '') {
				unset($this->data['search']);
			}
		// loop through filters
			foreach($this->data as $key=>$filter) {
				// ignore submit button
				if($key != 'filter') {
					// init
					$selected = '';
					switch($key) {
						case 'format':
							$selected = $formats[$filter];
						break;
						case 'type':
							$selected = $types[$filter];
						break;
						case 'location':
							$selected = $locations[$filter];
						break;
						case 'genre':
							$selected = $genres[$filter];
						break;
						case 'search':
							$selected = $filter;
						break;
					}
					// if filter value is not empty
					if(!empty($filter)) {
						$selected = $this->slug($selected);
						$url .= "/$key/$selected";
					}
				}
			}
			$this->redirect('/dvds/index/'.$url);
		} else {
			// set form options
			$this->data['format'] = '';
			$this->data['type'] = '';
			$this->data['location'] = '';
			$this->data['genre'] = '';
			$this->data['search'] = '';
		}
		// if any parameters have been passed
		if(!empty($this->params['pass'])) {
			// only select active dvds
			$conditions = array('Dvd.status'=>1);

			// get params
			$params = $this->params['pass'];
			// loop
			foreach($params as $key=>$param) {
				// get the filter value
				if(isset($params[$key+1])) {
					$value = $params[$key+1];
				}
				// switch on param
				switch($param)
				{
					case 'format':
						// get format
						$format = $this->Dvd->Format->find('first', array(
							'recursive' => 0,
							'conditions' => array(
								'Format.slug'=>$value
							)
						));
						// set where clause
						$conditions['Dvd.format_id'] = $format['Format']['id'];
						// save value for form
						$this->data['format'] = $format['Format']['id'];
					break;
					case 'type':
						// get type
						$type = $this->Dvd->Type->find('first', array(
							'recursive' => 0,
							'conditions' => array(
								'Type.slug'=>$value
							)
						));
						// set where clause
						$conditions['Dvd.type_id'] = $type['Type']['id'];
						// save value for form
						$this->data['type'] = $type['Type']['id'];
					break;
					case 'location':
						// get type
						$location = $this->Dvd->Location->find('first', array(
							'recursive' => 0,
							'conditions' => array(
								'Location.slug'=>$value
							)
						));
						// set where clause
						$conditions['Dvd.location_id'] = $location['Location']['id'];
						// save value for form
						$this->data['location'] = $location['Location']['id'];
					break;
					case 'genre':
						// get genre
						$genre = $this->Dvd->Genre->find('first', array(
							'recursive' => 0,
							'conditions' => array(
								'Genre.slug'=>$value
							)
						));
						// save value for form
						$this->data['genre'] = $genre['Genre']['id'];
					break;
					case 'search':
						// setup like clause
						$conditions['Dvd.name LIKE'] = "%{$value}%";
						// save search string for form
						$this->data['search'] = str_replace('_', ' ', $value);
					break;
				}
			}
			// get all dvds with param conditions
			$dvds = $this->Dvd->find('all', array(
				'order'	=> 'Dvd.name',
				'conditions' => $conditions
			));

			// if genre filter has been set
			if(isset($genre)) {
				// loop through dvds
				foreach($dvds as $key=>$dvd) {
					// init
					$found = FALSE;
					// loop through genres
					foreach($dvd['Genre'] as $k=>$g) {
						// if the genre id matches the filter genre no need to continue
						if($g['id'] == $genre['Genre']['id']) {
							$found = TRUE;
							break;
						}
					}
					if(!$found) {
						// remove from list
						unset($dvds[$key]);
					}
				}
			}
		} else {
			// get all dvds from database where status = 1, order by name
			$dvds = $this->Dvd->find('all', array(
				'order'	=> 'Dvd.name',
				'conditions' => array(
					'Dvd.status'=>1
				)
			));
		}
		$this->pageTitle = 'Filmes - Index Page';
		// set layout file
		$this->layout = 'index';
		// save the dvds in a variable for the view
		$this->set(compact('formats', 'types', 'locations', 'genres', 'dvds'));
	}

	function view($slug = null){
	if(!$slug){
	$this->Session->setFlash('Invalid id for Dvd', 'flash_bad');
	//$this->redirect(array('action'=>'index'));  
	}
	$dvd = $this->Dvd->findBySlug($slug);
	if(!empty($dvd))	{
	$this->set('dvd',$dvd);
		}else{
	$this->Session->setFlash('Invalid id for Dvd', 'flash_bad');
	//$this->redirect(array('action'=>'index'));  
	}
	if(!empty($dvd)) {  
    // save genres string  
    $dvd['Dvd']['genres'] = $this->_create_genre_string($dvd['Genre']);  
    // set the dvd for the view  
    $this->set('dvd', $dvd);  
  
    // increment the number of items the dvd was viewed  
    $this->Dvd->save(array(  
        'Dvd' => array(  
            'id' => $dvd['Dvd']['id'],  
            'views' => ($dvd['Dvd']['views'] + 1)  
        )  
    ));  
}  
}

	function admin_index(){
$recursive=0;
$dvds = $this->Dvd->find('all',array('conditions'=>array('Dvd.status' => 1,'User.id'=>$this->Auth->user('id'))),
	array('order' => array('Dvd.name' => 'ASC'))
);  
    $this->set('dvds', $dvds);  
	}
	
	function admin_add(){
	 if (!empty($this->data)) {  
       // check for image  
        $image_ok = $this->_upload_image();  
  if(isset($errors)) {  
    echo $misc->display_errors($errors);  
}  else{
        // if the image was uploaded successfully  
        if($image_ok) {  
            // initialise the Dvd model  
        $this->Dvd->create();  
  
        // create the slug  
        $this->data['Dvd']['slug'] = $this->slug($this->data['Dvd']['name']);  
          
        // check for a dvd with the same slug  
        $dvd = $this->Dvd->find('first', array(  
            'conditions' => array(  
                'Dvd.slug'=>$this->data['Dvd']['slug'],  
                'Dvd.status' => '1'  
            )  
        ));  
        }  }
        // if slug is not taken  
        if(empty($dvd)) {  
            // try saving the format  
            if ($this->Dvd->save($this->data)) {  
                // set a flash message  
                $this->Session->setFlash('The DVD has been saved', 'flash_good');  
  
                // redirect  
                $this->redirect(array('action'=>'index'));  
            } else {  
                // set a flash message  
                $this->Session->setFlash('The DVD could not be saved. Please, try again.', 'flash_bad');  
            }  
        } else {  
            // set a flash message  
            $this->Session->setFlash('The DVD could not be saved. The Name has already been taken.', 'flash_bad');  
        }  
    }  
 $formats    = $this->Dvd->Format->find('list',array('conditions'=>array('Format.status' => 1	))); 
 $types      = $this->Dvd->Type->find('list',array('conditions'=>array('status' => 1	)));
 $locations  = $this->Dvd->Location->find('list',array('conditions'=>array('status' => 1	)));  
 $genres  = $this->Dvd->Genre->find('list',array('fields' => array('Genre.slug'),)); 
 $ratings    = $this->ratings;  
  
    // set the variables so they can be accessed from the view  
    $this->set(compact('formats', 'types', 'locations', 'ratings','genres')); 
	
	}
	
	function admin_edit($id = null){
	if (!$id && empty($this->data)) {  
    // set a flash message  
    $this->Session->setFlash('Invalid Dvd', 'flash_bad');  
    // redirect the admin  
    $this->redirect(array('action'=>'index'));  
}  
	
	if(!empty($this->data)){
		
		// check for image  
        $image_ok = $this->_upload_image();  
  if(isset($errors)) {  
    echo $misc->display_errors($errors);  
}  else{
        // if the image was uploaded successfully  
        if($image_ok) {  
          
        $this->data['Dvd']['slug'] = $this->slug($this->data['Dvd']['name']);  
          
        // check for a dvd with the same slug  
        $dvd = $this->Dvd->find('first', array(  
            'conditions' => array(  
                'Dvd.slug'=>$this->data['Dvd']['slug'],  
                'Dvd.status' => '1'  
            )  
        ));  
        }  }
            // if slug is not taken  
        if(empty($dvd) || $dvd['Dvd']['id'] == $id) {  
            // try saving the format  
            if ($this->Dvd->save($this->data)) {  
                // set a flash message  
                $this->Session->setFlash('The DVD has been saved', 'flash_good');  
  
                // redirect  
                $this->redirect(array('action'=>'index'));  
            } else {  
                // set a flash message  
                $this->Session->setFlash('The DVD could not be saved. Please, try again.', 'flash_bad');  
            }  
        } else {  
            // set a flash message  
            $this->Session->setFlash('The DVD could not be saved. The Name has already been taken.', 'flash_bad');  
        }  
		
	}
	if (empty($this->data)){
	$this->data = $this->Dvd->read(null,$id);
	
}
 $formats    = $this->Dvd->Format->find('list',array('conditions'=>array('Format.status' => 1	))); 
 $types      = $this->Dvd->Type->find('list',array('conditions'=>array('status' => 1	)));
 $locations  = $this->Dvd->Location->find('list',array('conditions'=>array('status' => 1	))); 
 $genres     = $this->Dvd->Genre->find('list',array('fields' => array('id','slug')));  
 $ratings    = $this->ratings;  
  $this->set(compact('formats', 'types', 'locations', 'ratings','genres')); 
	}
	
	function admin_delete($id = null){
	 if (!$id) {  
        $this->Session->setFlash('Invalid id for Format', 'flash_bad');  
        $this->redirect(array('action'=>'index'));  
    }  
	$this->Dvd->id = $id;
	if($this->Dvd->saveField('status',0) ){
	  $this->Session->setFlash('The Format was successfully deleted.', 'flash_good');  
	  }else{
	   $this->Session->setFlash('The Format could not be deleted. Please try again.', 'flash_bad'); 
	   }
	 $this->redirect(array('action'=>'index'));  
	}
	
	function _upload_image(){
	$image_ok = TRUE;
	if($this->data['File']['image']['error'] !=4 ){
	 $result = $this->uploadFiles('img/dvds', $this->data['File']);  
  
        // if there are errors  
        if(array_key_exists('errors', $result)) {  
            // set image ok to false  
            $image_ok = FALSE;  
            // set the error for the view  
            $this->set('errors', $result['errors']);  
        } else {  
            // save the url  
            $this->data['Dvd']['image'] = $result['urls'][0];  
        }  
    }  
  
return $image_ok;  
}

function footer() {  
    // if the data has been requested  
    if(isset($this->params['requested'])) {  
        // only get from dvd table, no joins  
        $this->Dvd->recursive = -1;  
        // return the dvds  
        return $this->paginate();  
    } else {  
        // redirect to index if called directly from url  
        $this->redirect(array('action'=>'index'));  
    }  
}  
  
function top_genres() {  
   
    if(isset($this->params['requested'])) {  
       
        $genres = $this->Dvd->Genre->find('all');  
       
        $sorted = array();  
       
        foreach($genres as $key=>$g) {  
            $sorted[$g['Genre']['slug']] = count($g['Dvd']);  
        }  
       
        arsort($sorted);  
  
        return array_slice($sorted, 0, 5);  
    } else {  
       
        $this->redirect(array('action'=>'index'));  
    }  
}  

function _create_genre_string($genres) {  
    // init  
    $genre_string = '';  
  if(!empty($genres)) {  
     
        foreach($genres as $g) {  
            $genre_string .= $g['name'].", ";  
        }  
    }  
 return $genre_string;  
}  
}
?>