<?php 
class Format extends AppModel{
var $name = 'Format';

var $hasMany = array(
	'Dvd'=>array(
		'className'=>'Dvd'
	)
);

	var $validate = array(
		'name' => array(
			'rule'    => 'notEmpty',
			'message' => 'Please enter a Format Name'
		)
	);


}

?>