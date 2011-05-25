<ol>  
<?php  
// get top rated dvds  
// i'm using the paginator so i can specifiy sql statements here  
$most_active = $this->requestAction('dvds/footer/sort:views/direction:desc/limit:5');  
// loop through dvds  
foreach($most_active as $dvd) {  
    echo "<li><a href='/dvds/view/".$dvd['Dvd']['slug']."'>".$dvd['Dvd']['name']."</a></li>";  
}  
?>  
</ol>  