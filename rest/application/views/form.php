
   <form action="http://localhost/pixolobackendGen/Version2/pixoloBackend/index.php/users/insertdata" method="post">
    <!--<input type="text" name="id" placeholder="Id"> -->
    
    <?php 
        foreach ($users as $field)
        {
            if($field->COLUMN_COMMENT!='id')
            {
                if($field->COLUMN_COMMENT=='yes/no')
                {
    ?>
     <?php echo $field->COLUMN_NAME;?>:<select name="<?php echo $field->COLUMN_NAME;?>"><br><br>
     <option value="1">Yes</option>
     <option value="0">No</option>
       </select>
      <?php 
                }else
                {
                 echo $field->COLUMN_NAME;
                    ?>
      <input type="<?php echo $field->COLUMN_COMMENT;?>" placeholder="<?php echo $field->COLUMN_NAME;?>" name="<?php echo $field->COLUMN_NAME;?>"><br><br>
       <?php
            }; };};
        
    ?>
       
    <!--FORM FIELDS-->
  
<input type="submit" value="Submit">
</form>