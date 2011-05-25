<?php 
class Type extends AppModel{
var $name = 'Type';

var $hasMany = array(
	'Dvd'=>array(
		'className'=>'Dvd'
	)
);

}

?>