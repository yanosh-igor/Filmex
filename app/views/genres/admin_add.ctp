<div class="formats form">  
<?php echo $form->create('Genre');?>  
    <fieldset>  
        <legend>Add a Genre</legend>  
        <?php  
        // create the form inputs  
        echo $form->input('name', array('label'=>'Name: '));  
        ?>  
    </fieldset>  
<?php echo $form->end('Add');?>  
</div>  
  
<ul class="actions">  
    <li><?php echo $html->link('List Genre', array('action'=>'index'));?></li>  
</ul>  