<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <title>Create</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url('/assets/materialize/css/materialize.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/admin.css'); ?>" rel="stylesheet">
</head>

<body id="create">
    <div class="blue_bg"></div>
    <div class="gray_bg"></div>
    <div class="container">
        <div class="create_area z-depth-3">
            <div class="row nomarg">
                <h3 class="col l12"><?php if($inputtype == 'insert'){ echo "CREATE"; }else{ echo "EDIT"; }; ?></h3>
            </div>
            <form action="<?php if($inputtype == 'insert'){ echo site_url('/').$this->tablename.'/insertdata'; }else{ echo site_url('/').$this->tablename.'/editdata?id='.$id; };  ?>" method="post" id="createform" enctype="multipart/form-data">
            <?php
        foreach ($users as $field)
        {
            if($field->COLUMN_COMMENT!='id' && $field->COLUMN_COMMENT!='insertuser' && $field->COLUMN_COMMENT!='now' )
            {
                if($field->COLUMN_COMMENT=='yes/no')
                {
    ?>                  <!--YES/NO-->
                        <div class="row" style="margin-left:0px">
                            <div class="switch col l12">
                                <p><?php echo $field->COLUMN_NAME;?></p>
                                <label>
                                  No
                                  <input type="checkbox" name="<?php echo $field->COLUMN_NAME; ?>" id="<?php echo $field->COLUMN_NAME; ?>" value="">
                                  <span class="lever"></span>
                                  Yes
                                </label>
                            </div>
                        </div>
      <?php
                }
                else
                {
                     if(substr($field->COLUMN_COMMENT,0,8) == 'dropdown')
                       { ?>

                        <!--DROPDOWN-->
                        <div class="row nomarg">
                            <div class="input-field col l12">
                                <select name="<?php echo $field->COLUMN_NAME; ?>" value="<?php echo $field->value; ?>">
                                  <option value="0" selected >Choose your option</option>
                                   <?php
                                     foreach($dropdown[$field->COLUMN_NAME] as $data)
                                     { ?>
                                        <option value="<?php echo $data->id; ?>" <?php if($data->id == $field->value){ echo 'selected'; }; ?>><?php echo $data->name; ?></option>
                                    <?php } ?>

                                </select>
                                <label><?php echo $field->COLUMN_NAME; ?></label>
                            </div>
                        </div>

                <?php }else{


                 if($field->COLUMN_COMMENT=='textarea')
                  {

                    ?>
                     <!--TEXT AREA-->
                        <div class="row nomarg">
                            <div class="input-field col l12">
                              <textarea name="<?php echo $field->COLUMN_NAME; ?>" class="materialize-textarea"><?php echo $field->value; ?></textarea>
                              <label for="textarea1"><?php echo $field->COLUMN_NAME; ?></label>
                            </div>
                        </div>
                     <?php
                  }
                  else
                  {
                      if(substr($field->COLUMN_COMMENT,0,4)=='file')
                      { ?>
                            <!--file-->
                            <div class="row nomarg">
                                <div class="file-field input-field col l12">
                                  <p><?php echo $field->COLUMN_NAME;?></p>
                                  <div class="btn">
                                    <span>img</span>
                                    <input type="file" accept="<?php echo substr($field->COLUMN_COMMENT,4); ?>" name="<?php echo $field->COLUMN_NAME; ?>" size="20">
                                  </div>
                                  <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" name="<?php echo $field->COLUMN_NAME;?>">
                                  </div>
                                </div>
                            </div>
                    <?php
                      }else{
                          if($field->COLUMN_COMMENT=='date')
                          {
                              ?>
                                <!--date-->
                                <div class="row nomarg">
                                    <div class="col l12">
                                        <label><?php echo $field->COLUMN_NAME; ?></label>
                                        <input type="date" class="datepicker" id="dateo" name="<?php echo $field->COLUMN_NAME; ?>"  value="<?php echo $field->value; ?>">

                                    </div>
                                </div>
                        <?php
                          }else{

                              if($field->COLUMN_COMMENT=='time'){
                                  ?>
                                    <div class="row nomarg">
                                    <div class="col l12">
                                        <label><?php echo $field->COLUMN_NAME; ?></label>
                                        <input type="time" class="timepicker" id="timeo" name="<?php echo $field->COLUMN_NAME; ?>"  value="<?php echo $field->value; ?>">

                                    </div>
                                </div>
                        <?php
                              }else{





                    ?>
            <!--TEXT PASSWORD NUMBER EMAIL-->
            <div class="row nomarg">
                <div class="input-field col l12">
                     <input name="<?php echo $field->COLUMN_NAME;?>" type="<?php echo $field->COLUMN_COMMENT;?>" class="validate" value="<?php echo $field->value; ?>">
                     <label for="first_name"><?php echo $field->COLUMN_NAME;?></label>
                </div>
            </div>
       <?php
                                    };
                                };
                            };
                        };
                    };
                };
            };
        };
    ?>

            <!--SUBMIT-->
            <div class="row nomarg_sub">
                <div class="col m3">
                    <a class="waves-effect waves-light btn green" id="formsubmit">Submit</a>
                </div>
                <div class="col m3">
                    <a class="waves-effect waves-light btn red" href="<?php echo site_url('/').$this->tablename.'/getdataview'; ?>">Cancel</a>
                </div>
            </div>
    </form>





            <!--radio-->
            <!--<div class="row nomarg">
                <div class="col l12">
                    <p>Gender</p>
                    <p>
                      <input name="group1" type="radio" id="test1" />
                      <label for="test1">Male</label>
                    </p>
                    <p>
                      <input name="group1" type="radio" id="test2" />
                      <label for="test2">Female</label>
                    </p>
                </div>
            </div>-->



            <!--checkbox-->
            <!--<div class="row nomarg">
                <div class="col l12">
                    <p>Checkbox</p>
                    <p>
                      <input type="checkbox" id="test6" checked="checked" />
                      <label for="test6">Blue</label>
                    </p>
                    <p>
                      <input type="checkbox" id="test7" checked="checked" />
                      <label for="test7">Yellow</label>
                    </p>
                </div>
            </div>-->




        </div>

    </div>

    <!-- UPLOAD Modal Structure -->
    <div id="modal1" class="modal" style="text-align: center;">
      <div class="modal-content">
        <h4>Uploading Data</h4>
        <div class="preloader-wrapper small active">
      <div class="spinner-layer spinner-green-only">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>
    <p>Please wait while we upload the content to database</p>
      </div>

    </div>


    <script type="text/javascript" src="<?php echo base_url('/assets/materialize/js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/materialize/js/materialize.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/main.js'); ?>"></script>

    <script>
        $(document).ready(function(){

          <?php
                  foreach ($users as $field)
                  {
                      if($field->COLUMN_COMMENT=='yes/no'){
                          if($field->value == '1')
                          {
                              ?>
                                  $('#<?php echo $field->COLUMN_NAME; ?>').prop('checked', true);
                              <?php
                          }else{
                              ?>
                                  $('#<?php echo $field->COLUMN_NAME; ?>').prop('checked', false);
                              <?php
                          };
                      };
                  };
                          ?>

            $('#formsubmit').click(function(){
              $('#modal1').openModal();
               <?php
                    foreach ($users as $field)
                    {
                        if($field->COLUMN_COMMENT=='yes/no'){
                            ?>
                            if($('#<?php echo $field->COLUMN_NAME; ?>').prop('checked') == true)
                            {
                                $('#<?php echo $field->COLUMN_NAME; ?>').attr('value', '1');
                            }else{
                                console.log('giving value to false');
                                $('#<?php echo $field->COLUMN_NAME; ?>').prop('checked', true)
                                $('#<?php echo $field->COLUMN_NAME; ?>').attr('value', '0');
                            };
                            console.log($('#<?php echo $field->COLUMN_NAME; ?>').val());
                            <?php
                        };
                    };
                ?>
                console.log($('#done').val());
                $('#createform').submit();
            });
        });
    </script>
</body>

</html>
