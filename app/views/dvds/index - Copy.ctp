<div id="wrapper-contents">  
    <div id="contents"> 
<div class="formats index">  
  
    <h2>Dvds Admin Index</h2>  
    <p>Currently displaying all dvds in the application.</p>  
    <?php
   if(isset($dvds) && !empty($dvds)) :  
    ?>  
  
    <table>  
        <thead>  
            <tr>  
                <th>Id</th>  
                <th>Name</th>  
                <th>Slug</th>  
                <th>Created</th>  
                <th>Modified</th>  
             </tr>  
        </thead>  
        <tbody>  
        	<?php  
            // initialise a counter for striping the table  
            $count = 0;  
  
            // loop through and display format  
            foreach($dvds as $dvd):  
                // stripes the table by adding a class to every other row  
                $class = ( ($count % 2) ? " class='altrow'": '' );  
                // increment count  
                $count++;  
            ?>  
            <tr<?php echo $class; ?>>  
                <td><?php echo $dvd['Dvd']['id']; ?></td>  
                <td><?php echo $dvd['Dvd']['name']; ?></td>  
                <td><?php echo $dvd['Dvd']['slug']; ?></td>  
                <td><?php echo $dvd['Dvd']['created']; ?></td>  
                <td><?php echo $dvd['Dvd']['modified']; ?></td>  
                
            </tr>  
            <?php endforeach; ?>  
        </tbody>  
    </table>  
      
    <?php  
    else:  
        echo 'There are currently no Dvds in the database.';  
    endif;  
    ?>  
      
    
</div>  </div>  </div>  