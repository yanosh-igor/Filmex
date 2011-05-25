<div class="dvds form">  
	
<?php echo $form->create('Dvd', array('type' => 'file'));?>  
    <fieldset>  
        <legend>Add a Dvd</legend>  
        <?php  
        // create the form inputs  
        echo $form->input('name', array('label'=>'Name: '));
        echo $form->input('format_id', array('label'=>'Format: ', 'type'=>'select', 'options'=>$formats));  
        echo $form->input('type_id', array('label'=>'Type: ', 'class'=>'type_select'));  
        echo $form->input('discs', array('label'=>'Number of Discs:', 'class'=>'tv_hide'));  
        echo $form->input('episodes', array('label'=>'Number of Episodes:', 'class'=>'tv_hide'));  
        echo $form->input('location_id', array('label'=>'Location: ')); 
        echo $form->input('File.image', array('label' => 'Image:', 'type' => 'file' )) ;
        echo $form->input('rating', array('label'=>'Rating:'));  
        echo $form->input('website', array('label'=>'Website URL:'));  
        echo $form->input('imdb', array('label'=>'Imdb URL:'));  
         echo $form->input('Genre',array(

            'label' => __('Genres',true),

            'type' => 'select',

            'multiple' => 'checkbox',

            'options' => $genres

           

        ));
       // echo $form->input('genres', array('label'=>'Genres:', 'type'=>'select','multiple'=>'checkbox' ));    
         echo $form->input('user_id', array('value'=> $users_userid, 'type'=>'hidden'));  
        ?> 
    </fieldset>  
<?php echo $form->end('Add');?>  
</div>  
 
<ul class="actions">  
    <li><?php echo $html->link('List DVDs', array('action'=>'index'));?></li>  
</ul>  