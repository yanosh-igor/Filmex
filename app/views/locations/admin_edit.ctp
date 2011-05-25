<div class="formats form">  
<?php echo $form->create('Location');?>  
    <fieldset>  
        <legend>Edit Location</legend>  
        <?php  
        // create the form inputs  
        echo $form->input('id', array('type' => 'hidden') );
        echo $form->input('name', array('label'=>'Name: '));  
        echo $form->input('desc', array('label'=>'Description:', 'type'=>'textarea'));  
        ?>  
    </fieldset>  
<?php echo $form->end('Edit');?>  
</div>  
  

<?php if(!empty($this->data['Dvd'])): ?>  
  
<div class="related">  
    <h3>DVDs in this Location</h3>  
    <table>  
        <thead>  
            <tr>  
                <th>Id</th>  
                <th>Name</th>  
                <th>Actions</th>  
            </tr>  
        </thead>  
        <tbody>  
            <?php foreach($this->data['Dvd'] as $dvd): ?>  
            <tr>  
                <td><?php echo $dvd['id']; ?></td>  
                <td><?php echo $dvd['name']; ?></td>  
                <td><?php echo $html->link('Edit', '/admin/dvds/edit/'.$dvd['id']);?></td>  
            </tr>  
            <?php endforeach; ?>  
        </tbody>  
    </table>  
</div>  
  
<?php endif; ?>  
  
<ul class="actions">  
    <li><?php echo $html->link('List Location', array('action'=>'index'));?></li>  
</ul>  