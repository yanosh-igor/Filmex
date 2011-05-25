<div class="types view">  
    <h2>Viewing Type: <?php echo $type['Type']['name']; ?></h2>  
      
  <dl>  
        <dt>Name:</dt>  
        <dd><?php echo $type['Type']['name']; ?></dd>  
          
        <dt>Description:</dt>  
        <dd><?php echo $type['Type']['desc']; ?></dd>  
          
        <dt>Created</dt>  
        <dd><?php echo $type['Type']['created']; ?></dd>  
    </dl>  
      
    <?php if(!empty($type['Dvd'])): ?>  
      
    <div class="related">  
        <h3>DVDs with this Type</h3>  
        <table>  
            <thead>  
                <tr>  
                    <th>Name</th>  
                    <th>Actions</th>  
                </tr>  
            </thead>  
            <tbody>  
                <?php foreach($type['Dvd'] as $dvd): ?>  
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
        <li><?php echo $html->link('List Types', array('action'=>'index'));?></li>  
    </ul>  
</div>  