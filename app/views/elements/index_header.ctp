
<div id="wrapper-header">  
    <div id="header">  
        <div class="logo">  
           <h1>Filmex</h1>  
            <h2>an online application to track and catalog your collection of dvds built using cakephp</h2>   
        </div>  
  
        <div class="filters">  
            <form action="" method="post">  
                <fieldset>  
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
                    <div class="clear"></div>  
                    <div class="input">  
                       <?php echo $form->input('search', array(
							'label'		=> '',
							'type'		=> 'text',
							'value'		=> $this->data['search']
							)); ?>
								
							    </div>  
                    <div class="input">  
                        <button type="submit" name="data[filter]" value="filter">Search</button>  
                        <button type="submit" name="data[reset]" value="reset">Reset</button>  
                    </div> 
                      <div id="user-nav">	
			<?php if($logged_in): ?>	
			Welcome, <?php echo $users_username;?>. <?php echo $html->link('Logout',array('controller'=>'users', 'action'=>'admin_logout','admin'=>'true'));?>	
			<?php else:?>
			<?php echo $html->link('Register ',array('controller'=>'users', 'action'=>'add','admin'=>'true'));?>or
			<?php echo $html->link('Login',array('controller'=>'users', 'action'=>'login','admin'=>'true'));?>
			<?php endif;?>
			</div> 
                </fieldset>  
            </form>  
          
        </div>  
    </div>  
</div>  