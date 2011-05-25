<div class="formats index">  
  
    <h2>Genres Admin Index</h2>  
    <p>Currently displaying all formats in the application.</p>  
    <?php
   if(isset($genres) && !empty($genres)) :  
    ?>  
  
    <table>  
        <thead>  
            <tr>  
                <th>Name</th>  
                <th>Slug</th>  
                <th>Created</th>  
                <th>Modified</th>  
                <th>Actions</th>  
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
                <td><?php echo $genre['Genre']['slug']; ?></td>    
                <td><?php echo $genre['Genre']['created']; ?></td>  
                <td><?php echo $genre['Genre']['modified']; ?></td>  
                <td>  
                <?php echo $html->link('Edit', array('action'=>'admin_edit', $genre['Genre']['id']) );?>  
                <?php echo $html->link('Delete', array('action'=>'admin_delete', $genre['Genre']['id']), null, sprintf('Are you sure you want to delete Genre: %s?', $genre['Genre']['name']));?>  
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
<ul class="actions">  
		
        <li><?php echo $html->link('Add a Genre', array('action'=>'add')); ?></li> 
        
    </ul>  