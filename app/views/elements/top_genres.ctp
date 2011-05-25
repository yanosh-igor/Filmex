 <ol>  
                 <?php
           $top_rated = $this->requestAction('dvds/top_genres');
           foreach($top_rated as $key=>$value ){
           echo "<li><a href='genres/view/".$key."'>".$key."</a></li>";
           
       }
           ?>
            </ol>  