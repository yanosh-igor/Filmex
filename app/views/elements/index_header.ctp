
<div id="wrapper-header">  
    <div id="header">  
       <div class="logo">  
         <h1><?php echo $this->Html->link('Filmex', '/'); ?></h1>  
            <h2>Track and catalog your collection of films</h2>      
        </div>  
  
        <div class="filters">  
            <form action="" method="post">  
                <fieldset>  
               
                   
        <div id="click" style="display:none">

                     <div class="input"> 
                   
                     <?php echo $form->input('format', array(  
    'label'     => '',   
    'type'      => 'select',   
    'options'   => $formats, 
    'selected'  => $this->data['format']  
    )); ?> 
                    </div>
                    <div class="input">  
                       <?php echo $form->input('type', array(  
    'label'     => '',   
    'type'      => 'select',   
    'options'   => $types,  
    'selected'  => $this->data['type']  
    )); ?>  
                    </div>  
                    <div class="input">  
                       <?php echo $form->input('location', array(  
    'label'     => '',   
    'type'      => 'select',   
    'options'   => $locations,  
    'selected'  => $this->data['location']  
    )); ?>  
                    </div>  
                    <div class="input">  
                                       <?php echo $form->input('genre', array(  
    'label'     => '',   
    'type'      => 'select',   
    'options'   => $genres,  
    'selected'  => $this->data['genre']  
    )); ?>     
    </div>  
              </div>  

   
<div id='search'> <a href="#" >advanced search</a>   </div>   
 <script>
    $("#search").click(function () {
    $("#click").show("slow");
    });
    </script>
                 	   
                  
                  <div class="input">  
                       <?php echo $form->input('search', array(
							'label'		=> '',
							'type'		=> 'text',
							'value'		=> $this->data['search'],
								'placeholder'=>'Search'
							)); ?>
								
							    </div>  
                    <div class="input">  
                        <input type="image" name="data[filter]" src="<?php echo $this->webroot; ?>img/sprite-icons.png" value="filter">
                                </div>     

 

				  <div id="user-nav">	<?php if($logged_in): ?>Welcome, <?php echo $users_username;?>. <p><?php echo $html->link('Logout',array('controller'=>'users', 'action'=>'admin_logout','admin'=>'true'));?>	</p>
			<?php else:?>
			<?php echo $html->link('Register ',array('controller'=>'users', 'action'=>'add','admin'=>'true'));?>or
			<?php echo $html->link('Login',array('controller'=>'users', 'action'=>'login','admin'=>'true'));?>
			<?php endif;?>
			</div> 
                </fieldset>  
            </form>  
          
    </div>  
</div> 
