<div class="formats index">  
  
    <h2>Genres Index</h2>  
    <p>Currently displaying all Genres in the application.</p>  
    <?php
   if(isset($genres) && !empty($genres)) :  
    ?>  
  
    <table>  
        <thead>  
            <tr>  
                <th>Name</th>  
               <th>Action</th>  
             </tr>  
        </thead>  
        <tbody>  
        	<?php  
            // initialise a counter for striping the table  
            $count = 0;  
  
            // loop through and display format  
            foreach($genres as $genre):  
                // stripes the table by adding a class to every other row  
                $class = ( ($count % 2) ? " class='altrow'": '' );  
                // increment count  
                $count++;  
            ?>  
            <tr<?php echo $class; ?>>  
                <td><?php echo $genre['Genre']['name']; ?></td>  
                <td>
                	<?php echo $html->link('Veiw', array('action'=>'view', $genre['Genre']['slug']) );?> 
                </td>  
                
            </tr>  
            <?php endforeach; ?>  
        </tbody>  
    </table>  
      
    <?php  
    else:  
        echo 'There are currently no Genres in the database.';  
    endif;  
    ?>  
      
   
  
</div>  

 