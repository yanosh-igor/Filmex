<div class="formats index">  
  
    <h2>Locations Admin Index</h2>  
    <p>Currently displaying all Locations in the application.</p>  
    <?php
   if(isset($locations) && !empty($locations)) :  
    ?>  
  
    <table>  
        <thead>  
            <tr>  
                <th>Id</th>  
                <th>Name</th>  
                <th>Slug</th>  
                <th>Description</th>  
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
            foreach($locations as $location):  
                // stripes the table by adding a class to every other row  
                $class = ( ($count % 2) ? " class='altrow'": '' );  
                // increment count  
                $count++;  
            ?>  
            <tr<?php echo $class; ?>>  
                <td><?php echo $location['Location']['id']; ?></td>  
                <td><?php echo $location['Location']['name']; ?></td>  
                <td><?php echo $location['Location']['slug']; ?></td>  
                <td><?php echo $location['Location']['desc']; ?></td>  
                <td><?php echo $location['Location']['created']; ?></td>  
                <td><?php echo $location['Location']['modified']; ?></td>  
                <td>  
                <?php echo $html->link('Edit', array('action'=>'admin_edit', $location['Location']['id']) );?>  
                <?php echo $html->link('Delete', array('action'=>'admin_delete', $location['Location']['id']), null, sprintf('Are you sure you want to delete Location: %s?', $location['Location']['name']));?>  
                </td>  
            </tr>  
            <?php endforeach; ?>  
        </tbody>  
    </table>  
      
    <?php  
    else:  
        echo 'There are currently no Formats in the database.';  
    endif;  
    ?>  
      
    
  
</div>  
<ul class="actions">  
        <li><?php echo $html->link('Add a Location', array('action'=>'add')); ?></li>  
    </ul>  