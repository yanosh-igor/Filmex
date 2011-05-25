
<div class="formats view">  
    <h2>Viewing Dvd: <?php echo $dvd['Dvd']['name']; ?></h2>  
      
  <dl>  
        <dt>Name:</dt>  
        <dd><?php echo $dvd['Dvd']['name']; ?></dd>  
          
        <dt>Image:</dt>  
        <dd>
        	<img src="<?php echo $this->webroot; ?><?php echo $dvd['Dvd']['image']; ?>" alt="Dvd Image" width="200" />  </dd>  
          <dt>Format:</dt>
        <dd><?php echo $dvd['Format']['name']; ?></dd>
        
        <dt>Type:</dt>
        <dd><?php echo $dvd['Type']['name']; ?></dd>
        
        <dt>Location:</dt>
        <dd><?php echo $dvd['Location']['name']; ?></dd>
		
		<dt>Rating:</dt>
        <dd><?php echo $dvd['Dvd']['rating']; ?></dd>
		
		<dt>Genres:</dt>
		<dd><?php echo $dvd['Dvd']['genres']; ?></dd>
         
        <dt>Created</dt>  
        <dd><?php echo $dvd['Dvd']['created']; ?></dd>  
     
   <?php if(!empty($dvd['Dvd']['imdb'])):?>
        <dt>Imdb</dt>  
        <dd><?php echo $html->link($dvd['Dvd']['name'],$dvd['Dvd']['imdb']); ?></dd>  
    
   <?php endif;?>
   <?php if(!empty($dvd['Dvd']['episodes'])):?>
        <dt>Episodes</dt>  
        <dd><?php echo $dvd['Dvd']['episodes']; ?></dd>  
  
   <?php endif;?>
       </dl>  
</div>  <ul class="actions">  
        <li><?php echo $html->link('List dvds', array('action'=>'index'));?></li>  
    </ul> 