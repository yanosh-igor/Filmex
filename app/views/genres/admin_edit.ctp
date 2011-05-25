<div class="formats form">  
<?php echo $form->create('Genre');?>  
    <fieldset>  
        <legend>Edit Genre</legend>  
        <?php  
        // create the form inputs  
        echo $form->input('id', array('type' => 'hidden') );
        echo $form->input('name', array('label'=>'Name: '));  
       
        ?>  
    </fieldset>  
<?php echo $form->end('Edit');?> 

<?php if(!empty($this->data['Dvd'])): ?>  
      
    <div class="related">  
        <h3>Related DVDs</h3>  
        <table>  
            <thead>  
                <tr>  
                    <th>Name</th>  
                    <th>Actions</th>  
                </tr>  
            </thead>  
            <tbody>  
            <?php foreach($this->data['Dvd'] as $dvd): ?>  
<tr>  
    <td><?php echo $dvd['name']; ?></td>  
    <td><?php echo $html->link('Edit', array('action'=>'admin_edit','controller'=>'dvds', $dvd['id']) );?></td>  
</tr>  
<?php endforeach; ?>  
            </tbody>  
        </table>  
    </div>  
      
    <?php endif; ?>  
      
</div>  
  

  
<ul class="actions">  
    <li><?php echo $html->link('List Genres', array('action'=>'index'));?></li>  
    <li><?php echo $html->link('Add a Genre', array('action'=>'add')); ?></li> 
</ul>  