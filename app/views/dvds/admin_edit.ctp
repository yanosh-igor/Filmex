<div class="dvds form">  
	
<?php echo $form->create('Dvd', array('type' => 'file'));?>  
    <fieldset>  
        <legend>Edit a Dvd</legend>  
        <?php  
        // create the form inputs  
       
        echo $form->input('name', array('label'=>'Name: '));  
        echo $form->input('format_id', array('label'=>'Format: ', 'type'=>'select', 'options'=>$formats));  
        echo $form->input('type_id', array('label'=>'Type: ', 'class'=>'type_select'));  
       echo $form->input('discs', array('label'=>'Number of Discs:', 'class'=>'tv_hide'));  
        echo $form->input('episodes', array('label'=>'Number of Episodes:', 'class'=>'tv_hide'));  
         echo $form->input('location_id', array('label'=>'Location: ')); 
        echo $form->input('id');  
  		
// display image if it exists  
if(!empty($this->data['Dvd']['image'])): ?>  
<div class="input">  
    <label>Current Image:</label>  

     <img src="<?php echo $this->webroot; ?><?php echo $this->data['Dvd']['image']; ?>" alt="Dvd Image" width="300" />  
     <?php //echo// $this->Html->image('dvds/ajax-loader.gif', array('alt' => 'CakePHP'))?>
    
</div>              
<?php endif;  
        echo $form->input('File.image', array('label' => 'Image:', 'type' => 'file' )) ;
        echo $form->input('rating', array('label'=>'Rating:'));  
        echo $form->input('website', array('label'=>'Website URL:'));  
        echo $form->input('imdb', array('label'=>'Imdb URL:'));  
        echo $form->input('Genre',array(

            'label' => __('Genres',true),

            'type' => 'select',

            'multiple' => 'checkbox',

            'options' => $genres,

            'selected' => $html->value('Genre.Genre'),

        )); 
     
        ?> 
    </fieldset>  
<?php echo $form->end('Edit');?>  
</div>  
 
<ul class="actions">  
    <li><?php echo $html->link('List DVDs', array('action'=>'index'));?></li>  
     <li><?php echo $html->link('Add DVDs', array('action'=>'add'));?></li>  
</ul>  