<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title><?php echo $title_for_layout; ?></title>  
<?php  
// include css file  
echo $html->css('style');  
// if the javscript helper is set include the javascript library  
if(isset($javascript)) {  
    echo $javascript->link(array('jquery-1.6.1', 'common'), true);  
}  
// variable for any other javascript  
echo $scripts_for_layout;  
?>  
</head>  
  
<body>  
<?php  
// include a header element  
echo $this->element('index_header');  
// echo out view code  
echo $content_for_layout;  
// include a footer element  
echo $this->element('index_footer');  
// if debug is on echo to screen  

?>  
</body>  
</html>  