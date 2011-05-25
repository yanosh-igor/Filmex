<?php 
class Location extends AppModel{
var $name = 'Location';

var $hasMany = array(
	'Dvd'=>array(
		'className'=>'Dvd'
	)
);

}

?>