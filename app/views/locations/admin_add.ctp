<div class="formats form">  
<?php echo $form->create('Location');?>  
    <fieldset>  
        <legend>Add a Location</legend>  
        <?php  
        // create the form inputs  
        echo $form->input('name', array('label'=>'Name: '));  
        echo $form->input('desc', array('label'=>'Description:', 'type'=>'textarea'));  
        ?>  
    </fieldset>  
<?php echo $form->end('Add');?>  
</div>  
  
<ul class="actions">  
    <li><?php echo $html->link('List Locations', array('action'=>'index'));?></li>  
</ul>  