<?php
class AppController extends Controller{
	 
	 var $components = array( 
	  'Auth'=>array(
	 	'admin'=>'true'
	 		 	
	 ),'Session');
	 
	 function slug($str) {  
       
        $str = strtolower(str_replace(' ', '_', $str));  
  
        
        $pattern = "/[^a-zA-Z0-9_]/";  
  
      
        $str = preg_replace($pattern, '', $str);  
  
    return $str;  
    }  
    
    function uploadFiles($folder, $formdata, $itemId = null) {  
    // setup dir names absolute and relative  
    $folder_url = WWW_ROOT.$folder;  
    $rel_url = $folder;  
      
    // create the folder if it does not exist  
    if(!is_dir($folder_url)) {  
        mkdir($folder_url);  
    }  
          
    // if itemId is set create an item folder  
    if($itemId) {  
        // set new absolute folder  
        $folder_url = WWW_ROOT.$folder.'/'.$itemId;   
        // set new relative folder  
        $rel_url = $folder.'/'.$itemId;  
        // create directory  
        if(!is_dir($folder_url)) {  
            mkdir($folder_url);  
        }  
    }  
      
    // list of permitted file types, this is only images but documents can be added  
    $permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');  
      
    // loop through and deal with the files  
    foreach($formdata as $file) {  
        // replace spaces with underscores  
        $filename = str_replace(' ', '_', $file['name']);  
        // assume filetype is false  
        $typeOK = false;  
        // check filetype is ok  
        foreach($permitted as $type) {  
            if($type == $file['type']) {  
                $typeOK = true;  
                break;  
            }  
        }  
          
        // if file type ok upload the file  
        if($typeOK) {  
            // switch based on error code  
            switch($file['error']) {  
                case 0:  
                    // check filename already exists  
                    if(!file_exists($folder_url.'/'.$filename)) {  
                        // create full filename  
                        $full_url = $folder_url.'/'.$filename;  
                        $url = $rel_url.'/'.$filename;  
                        // upload the file  
                        $success = move_uploaded_file($file['tmp_name'], $url);  
                    } else {  
                        // create unique filename and upload file  
                        ini_set('date.timezone', 'Europe/Kiev');  
                        $now = date('Y-m-d-His');  
                        $full_url = $folder_url.'/'.$now.$filename;  
                        $url = $rel_url.'/'.$now.'-'.$filename;  
                        $success = move_uploaded_file($file['tmp_name'], $url);  
                    }  
                    // if upload was successful  
                    if($success) {  
                        // save the url of the file  
                        $result['urls'][] = $url;  
                    } else {  
                        $result['errors'][] = "Error uploaded $filename. Please try again.";  
                    }  
                    break;  
                case 3:  
                    // an error occured  
                    $result['errors'][] = "Error uploading $filename. Please try again.";  
                    break;  
                default:  
                    // an error occured  
                    $result['errors'][] = "System error uploading $filename. Contact webmaster.";  
                    break;  
            }  
        } elseif($file['error'] == 4) {  
            // no file was selected for upload  
            $result['nofiles'][] = "No file Selected";  
        } else {  
            // unacceptable file type  
            $result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";  
        }  
    }  
return $result;  
}  

	function beforeFilter(){
	//	$this->Auth->allow('index','view','display','home');
		$this->Auth->allow(array('controller'=>'dvds','action'=>'index','index','view','display' ));
		$this->authError = 'Please login to view the page.';
		$this->loginError = 'Incorrect username/password combination.';
		$this->loginRedirect = array('controller' => 'dvds','action' => 'index');
		$this->logoutRedirect = array('controller' => 'dvds','action' => 'index');
		
		
		$this->set('logged_in', $this->_loggedIn());
		$this->set('users_username', $this->_usersUsername());
		$this->set('users_userid', $this->_usersUserid());
	}
	
	
	
	function _loggedIn(){
		$logged_in = FALSE;
		if ($this->Auth->user()){
			$logged_in = TRUE;
		}
		return $logged_in;
	}
	function _usersUsername(){
		$users_username = NULL;
		if($this->Auth->user()){
			$users_username = $this->Auth->user('username');
			}
			return $users_username;
	}
	function _usersUserid(){
		$users_userid = NULL;
		if($this->Auth->user()){
			$users_userid = $this->Auth->user('id');
			}
			return $users_userid;
	}
	

    
}
?>