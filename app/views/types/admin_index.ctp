<div class="formats index">  
  
    <h2>Types Admin Index</h2>  
    <p>Currently displaying all types in the application.</p>  
    <?php
   if(isset($types) && !empty($types)) :  
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
            foreach($types as $type):  
                // stripes the table by adding a class to every other row  
                $class = ( ($count % 2) ? " class='altrow'": '' );  
                // increment count  
                $count++;  
            ?>  
            <tr<?php echo $class; ?>>  
                <td><?php echo $type['Type']['id']; ?></td>  
                <td><?php echo $type['Type']['name']; ?></td>  
                <td><?php echo $type['Type']['slug']; ?></td>  
                <td><?php echo $type['Type']['desc']; ?></td>  
                <td><?php echo $type['Type']['created']; ?></td>  
                <td><?php echo $type['Type']['modified']; ?></td>  
                <td>  
                <?php echo $html->link('Edit', array('action'=>'admin_edit', $type['Type']['id']) );?>  
                <?php echo $html->link('Delete', array('action'=>'admin_delete', $type['Type']['id']), null, sprintf('Are you sure you want to delete Type: %s?', $type['Type']['name']));?>  
                </td>  
            </tr>  
            <?php endforeach; ?>  
        </tbody>  
    </table>  
      
    <?php  
    else:  
        echo 'There are currently no Types in the database.';  
    endif;  
    ?>  
      
    
  
</div>  
<ul class="actions">  
        <li><?php echo $html->link('Add a Type', array('action'=>'add')); ?></li>  
    </ul>  