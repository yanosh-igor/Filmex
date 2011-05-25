 <ol>  
                <?php
           $top_rated = $this->requestAction('dvds/footer/sort:created/direction:desc/limit:5');
           foreach($top_rated as $dvd){
           echo "<li><a href='dvds/view/".$dvd['Dvd']['slug']."'>".$dvd['Dvd']['name']."</a></li>";
           
       }
           ?>
            </ol>  