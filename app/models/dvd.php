<?php 
class Dvd extends AppModel{
var $name = 'Dvd';
var $belongsTo = array(
	'Format'=>array(
		'className'=>'Format'
),
	'Type'=>array(
		'className'=>'Type'
	),
		
	'User'=>array(
		'className'=>'User'
	),
	'Location'=>array(
		'className'=>'Location'
	)
);
var $hasAndBelongsToMany = array(
	'Genre'=>array(
		'className'=>'Genre'
	)
);

	var $validate = array(
		'name'   => array(
			'rule'   => 'notEmpty',
			'message'=> 'Please enter a Dvd Name'
	),
		'format_id' =>array(
			'rule'    =>'numeric'
	),
		'type_id'   => array(
			'rule' =>'numeric'
	),
		'location_id' => array(
			'rule' => 'numeric'
	)
	);

}

?>