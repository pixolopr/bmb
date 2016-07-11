<?php echo "you just inserted data in ".$insertedid; ?>
   <table>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>contact</th>
        <th>email</th>
    </tr>
    <?php foreach ($users as $user){ ?>  
    <tr>
        <td><?php echo $user->id ?></td>
        <td><?php echo $user->name ?></td>
        <td><?php echo $user->password ?></td>
        <td><?php echo $user->access ?></td>
    </tr>
    <?php } ?>
</table>