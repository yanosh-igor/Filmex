<?php
class MiscHelper extends AppHelper{
	function display_errors($errors){
	$output = '';
	$temp = '';
	if(is_array($errors) ){
	foreach($errors as $error){
	$temp .= "<li>{$error}</li>"; 
}
	
}else{
	$temp .= "<li>{$errors}</li>"; 
	}
	$output = "<ul class='flash_bad'>{$temp}</ul>";

return $output;  	
}
	
}

?>