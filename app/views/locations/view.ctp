<div class="formats view">  
    <h2>Viewing Format: <?php echo $format['Format']['name']; ?></h2>  
      
  <dl>  
        <dt>Name:</dt>  
        <dd><?php echo $format['Format']['name']; ?></dd>  
          
        <dt>Description:</dt>  
        <dd><?php echo $format['Format']['desc']; ?></dd>  
          
        <dt>Created</dt>  
        <dd><?php echo $format['Format']['created']; ?></dd>  
    </dl>  
      
    <?php if(!empty($format['Dvd'])): ?>  
      
    <div class="related">  
        <h3>DVDs with this Format</h3>  
        <table>  
            <thead>  
                <tr>  
                    <th>Name</th>  
                    <th>Actions</th>  
                </tr>  
            </thead>  
            <tbody>  
                <?php foreach($format['Dvd'] as $dvd): ?>  
                <tr>  
                    <td><?php echo $dvd['name']; ?></td>  
                    <td><?php echo $html->link('View', '/dvds/view/'.$dvd['slug']);?></td>  
                </tr>  
                <?php endforeach; ?>  
            </tbody>  
        </table>  
    </div>  
      
    <?php endif; ?>  
      
    <ul class="actions">  
        <li><?php echo $html->link('List Formats', array('action'=>'index'));?></li>  
    </ul>  
</div>  