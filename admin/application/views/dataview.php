<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <title>Billmate</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url('/assets/materialize/css/materialize.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/admin.css'); ?>" rel="stylesheet">
</head>

<body>
    <nav>
        <div class="navbar-wrapper">
            <div id="menu" class="left center">
                <div id="nav-icon3">
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                </div>
            </div>
            <a href="#" class="brand-logo center">Billmate</a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a class="dropdown-button left" href="#" data-activates='dropdown1'>
                        <i class="material-icons md-36 left" style="margin:5% 0%">person</i>
                        <p class="nomarg left " ><?php echo ucfirst($this->sessiondata['name']); ?></p>
                        <i class="material-icons left" style="margin-top:12%">arrow_drop_down</i>
                    </a>
                    <ul id="dropdown1" class="dropdown-content">
                        <li>
                            <a href="<?php echo site_url('/welcome/logout'); ?>">
                                <i class="material-icons md-36 left nomarg">power_settings_new</i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
    <div class="admin_panel"></div>

    <div>
        <ul class="side-nav">
            <li><a href="<?php echo site_url('/').'welcome/dashboard'; ?>">Dashboard</a></li>

            <?php foreach($this->tables as $tablename) { ?>
            <li><a href="<?php echo site_url('/').$tablename->TABLE_NAME.'/getdataview'; ?>"><?php echo $tablename->TABLE_NAME; ?></a></li>
            <?php }; ?>

        </ul>

    </div>

    <div class="container">
        <div class="row">
            <div class="col m8">
                <h2><?php echo ucfirst($this->tablename); ?> Table</h2>
            </div>
            <div class="col m4">
                <a class="btn waves-effect waves-light" type="button" style="margin-top:18%" href="<?php echo site_url('/').$this->tablename.'/create'; ?>">Create</a>
            </div>
        </div>


              <table class="striped responsive-table">
                    <thead>
                        <tr>
                            <!--<th data-field="id">Sr.no</th>-->
                            <?php
                                $i=0;
                                foreach($this->table as $column) {
                                  if($column->COLUMN_COMMENT!=='password' && $column->COLUMN_COMMENT!='file')
                                  {
                            ?>
                            <th><?php
                                    echo $column->COLUMN_NAME;
                                      
                                      if(++$i==4)
                                    {
                                        break;
                                    };
                                      
                                  } ?>
                            </th>
                            <?php
                                
                                                                                                                                       };  ?>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if(count($alldata)>0)
                        {
                          foreach($alldata as $user) { ?>
                        <tr>

                                <?php
                                $i = 0;

                                foreach($this->table as $column){ ?>
                            
                                <?php
                                    if($column->COLUMN_COMMENT!=='password' && $column->COLUMN_COMMENT!='file'){
                                        if($column->COLUMN_COMMENT=='textarea'){
                                ?>
                                <td>
                                <p style="overflow: hidden !important;max-height: 65px;">
                                    <?php
                                            $field = $column->COLUMN_NAME;
                                            echo $user->$field;
                                    ?>
                                            </p>
                                    <?php
                                        }else{
                                            if($column->COLUMN_COMMENT=='yes/no'){
                                                ?>
                                                <td>
                                                <?php
                                              $field = $column->COLUMN_NAME;
                                              if($user->$field == 1)
                                              {
                                                echo "Yes";
                                              }else{
                                                echo "No";
                                              }
                                            }else{
                                    ?>
                            <td>
                                    <?php
                                              $field = $column->COLUMN_NAME;
                                              echo $user->$field;
                                            }
                                        }
                                        if(++$i==4)
                                    {

                                        break;
                                    };
                                    }

                                    ;?>
                            </td>
                                <?php

                                    
                                     };
                                    ?>

                            <td><a class="waves-effect waves-light btn" href="<?php echo site_url('/'.$this->tablename.'/edit?id=').$user->id; ?>">Edit</a></td>
                            <td><a class="btn-floating waves-effect waves-light red  modal-trigger" idval="<?php echo site_url('/'.$this->tablename.'/deleterow?id=').$user->id; ?>"><i class="material-icons">clear</i></a></td>
                        </tr>
                        <?php }; }; ?>



                    </tbody>
                </table>

            <?php echo $links; ?>

    </div>



<div id="modal1" class="modal">
    <div class="modal-content">
      <h6>Are you sure you want to delete this?</h6>

    </div>
    <div class="modal-footer">
      <a href="" class=" modal-action modal-close waves-effect red btn" id="deleteaccept">Yes</a>
        <a style="margin-right: 10px;" href="" class=" modal-action modal-close waves-effect green btn">No</a>
    </div>
  </div>

    <script type="text/javascript" src="<?php echo base_url('/assets/materialize/js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/materialize/js/materialize.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/main.js'); ?>"></script>
    <script>
        $(document).ready(function(){

            $('.modal-trigger').click(function(){
                $('#modal1').openModal();
                var deleteurl = $(this).attr('idval');
                $('#deleteaccept').attr('href', deleteurl );
            });


  });
    </script>
    <div style="height:50px"></div>
</body>


</html>
