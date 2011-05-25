<div class="formats form">  
<?php echo $form->create('Type');?>  
    <fieldset>  
        <legend>Add a Type</legend>  
        <?php  
        // create the form inputs  
        echo $form->input('name', array('label'=>'Name: '));  
        echo $form->input('desc', array('label'=>'Description:', 'type'=>'textarea'));  
        ?>  
    </fieldset>  
<?php echo $form->end('Add');?>  
</div>  
  
<ul class="actions">  
    <li><?php echo $html->link('List Type', array('action'=>'index'));?></li>  
</ul>  