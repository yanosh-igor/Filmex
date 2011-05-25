<div class="formats view">  
    <h2>Viewing Genre: <?php echo $genre['Genre']['name']; ?></h2>  
      
  <dl>  
        <dt>Name:</dt>  
        <dd><?php echo $genre['Genre']['name']; ?></dd>  
           
    </dl>  
    </br>
    <?php if(!empty($genre['Dvd'])): ?>  
      
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
                <?php foreach($genre['Dvd'] as $dvd): ?>  
                <tr>  
                    <td><?php echo $dvd['name']; ?></td>  
                    <td><?php echo $html->link('View', '/dvds/view/'.$dvd['slug']);?></td>  
                </tr>  
                <?php endforeach; ?>  
            </tbody>  
        </table>  
    </div>  
      
    <?php endif; ?>  
      
   
</div>  
<ul class="actions">  
		
        <li><?php echo $html->link('List a Genre', array('action'=>'index')); ?></li> 
        
    </ul>  