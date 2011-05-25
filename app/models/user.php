<?php  
// file: app/model/user.php  
  
class User extends AppModel {  
    var $name = 'User';  
    var $useTable = 'admins';  
  
    /** 
     * check_login() 
     * checks the username and password against the database 
     */  
     var $hasMany = array(
	'Dvd'=>array(
		'className'=>'Dvd'
	)
);
     var $validate = array(
		'username' => array(
			'The username must be between 5 and 15 characters.' => array(
				'rule' => array('notempty','between',5, 15 ),
				'message' => 'The username must be between 5 and 15 characters.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'The username has alredy been taken.' =>array(
				'rule' => 'isUnique',
				'message' => 'The username has alredy been taken.'
				)
		),
		'password' => array(
			'The password must be between 5 and 15 characters.' => array(
				'rule' => array('notempty','between', 5, 15),
				'message' => 'The password must be between 5 and 15 characters.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
				
			'The password do not mutch.' => array(
				'rule'=>'matchPasswords',
				'message'=>'The password do not mutch.'
				)
		),
			'password_confirmation' => array(
		//	'The password must be between 5 and 15 characters.' => array(
			//	'rule' => array('notempty','between', 5, 15),
			//	'message' => 'The password must be between 5 and 15 characters.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)//)
	);
     
  function matchPasswords($data){
		if($data['password'] == $this->data['User']['password_confirmation']){
			return TRUE;
		}
		$this->invalidate('password_confirmation','The passwords do not match.');
			return FALSE;
	}
	
	function hashPasswords($data){
	if (isset($this->data['User']['password']))	{
		$this->data['User']['password'] = Security::hash($this->data['User']['password'], NULL, TRUE);
		return $data;
		}
	return $data;
	}
	
	function beforeSave() {
		$this->hashPasswords(NULL, TRUE);
		return TRUE;
		}
		

    
}  
?>