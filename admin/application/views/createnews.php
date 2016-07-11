<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <title><?php echo ucfirst ($inputtype);?></title>
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
                <h3 class="col l12">NEWS</h3>
            </div>
            <form action="<?php if($inputtype == 'create'){ echo site_url('/').'news/insertnews'; }else{ echo site_url('/').'news/insertnews?id='.$id; };  ?>" method="post" id="createform" enctype="multipart/form-data">
            <!--DROPDOWN-->
                      <div id="section1">
                        <div class="row nomarg">
                            <div class="input-field col l12">
                                <select id="language" name="language" value="">
                             <option value="0" <?php if($inputtype=='create'){echo 'selected';}?> >Choose your option</option>
                             <option value="1" <?php if($inputtype=='edit'&& $values->language==1){echo 'selected';}?>>English</option>
                             <option value="4" <?php if($inputtype=='edit'&& $values->language==4){echo 'selected';}?>>Hindi</option>
                             <option value="2" <?php if($inputtype=='edit'&& $values->language==2){echo 'selected';}?>>Gujarati</option>

                                </select>
                                <label>Language</label>
                            </div>
                        </div>

                        <!--CATEGORY-->
                        <div class="row nomarg">
                            <div class="input-field col l12">
                                <select name="category" value="">
                                  <option value="0" selected >Choose your option</option>
                                    <?php foreach($categories as $catname){ ?>
                                    <option value="<?php print_r($catname->id)?>" <?php if($inputtype=='edit' && $values->category==$catname->id){echo 'selected';}?>><?php print_r($catname->name);}?></option>



                                </select>
                                <label>Category</label>
                            </div>
                        </div>

                        <!--HEADLINE-->
            <div class="row nomarg">
                <div class="input-field col l12">
                     <input type="text" name="headline" class="validate" value="<?php if($inputtype=='edit'){echo $values->headline;}?>">
                     <label for="first_name">Headline</label>
                </div>
            </div>

                       <!--SHORT HEADLINE-->
            <div class="row nomarg">
                <div class="input-field col l12">
                     <input type="text" name="shortheadline" class="validate" value="<?php if($inputtype=='edit'){ echo $values->shortheadline;}?>">
                     <label for="first_name">Short Headline</label>
                </div>
            </div>

                        <!--ARTICLE-->
                        <div class="row nomarg">
                            <div class="input-field col l12">
                    <textarea name="article" class="materialize-textarea validate" ><?php if($inputtype=='edit'){echo $values->article ;};?></textarea>
                              <label for="textarea1">Article</label>
                            </div>
                        </div>

                         <!--file-->
                            <div class="row nomarg">
                                <div class="file-field input-field col l12">
                                  <p>Photo</p>
                                  <div class="btn">
                                    <span>img</span>
                                    <input type="file" accept=".jpg,.png" name="photo">
                                  </div>
                                  <div class="file-path-wrapper">
                                    <input class="file-path" type="text" name="photo">
                                  </div>
                                </div>
                            </div>

                        <!--AUTHOR-->
                        <div class="row nomarg">
                            <div class="input-field col l12">
                                <select name="author" value="">
                                  <option value="0" selected >Choose your option</option>
                                  <?php foreach($authors as $autname){ ?>
                                    <option value="<?php print_r($autname->id);?>" <?php if($inputtype=='edit' && $values->author==$autname->id){echo 'selected';}?> ><?php print_r($autname->name);}?></option>

                                </select>
                                <label>Author</label>
                            </div>
                        </div>




                <!--TOP NEWS-->
                        <div class="row" style="margin-left:0px">
                            <div class="switch col l12">
                                <p>MAKE TOP NEWS</p>
                                <label>
                                  No
                                  <input type="checkbox" name="top" id="top" value="<?php if($inputtype=='edit'){echo $values->top;}?>">
                                  <span class="lever"></span>
                                  Yes
                                </label>
                            </div>
                        </div>

                </div>
                      </form>
                       <div id="section2">




                         <div id="showmorephotos">
                             <?php if($inputtype=='edit'){ foreach($moreimages as $image){ ?>
                          <div class='inlinedisplay'><img src='http://www.pixoloproductions.com/nbnews/hiramanekBackend/uploads/<?php echo $image->photo; ?>'  width='80px' class='<?php echo $image->photo; ?> addmoreimg' /><a class="rem btn-floating waves-effect waves-light red removebtn" remove='<?php echo $image->photo; ?>'><i class="material-icons removeicon">remove</i></a></div>
                           <?php
                                                            }
                            }
                           ?>

                         </div>

                         <form method="post" action="" id="upload_file" enctype="multipart/form-data">

   <div class="row nomarg">
       <div class="file-field input-field col l12">
         <p>Photo</p>
         <div class="btn">
           <span>Add</span>
           <input type="file" name="userfile" id="userfile" size="20" accept=".jpg,.png" />
         </div>
         <div class="file-path-wrapper">
           <input class="file-path" type="text" name="userfile">
         </div>
       </div>
   </div>

   </form>
   <div id="files"></div>

                       </div>

                       <a class="waves-effect waves-light btn bluecolor" id="changesecion">Add More Photos</a>




            <!--SUBMIT-->
            <div class="row nomarg_sub">
                <div class="col m3">
                    <a class="waves-effect waves-light btn green" id="formsubmit">Submit</a>
                </div>
                <div class="col m3">
                    <a class="waves-effect waves-light btn red" href="<?php echo site_url('/').$this->tablename.'/getdataview'; ?>">Cancel</a>
                </div>
            </div>







        </div>

    </div>

  <!-- UPLOAD IMAGE Modal Structure -->
  <div id="modal1" class="modal" style="text-align: center;">
    <div class="modal-content">
      <h4>Uploading Photo</h4>
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
  <p>Please wait while we upload the photo</p>
    </div>

  </div>

  <!-- UPLOAD NEWS Modal Structure -->
  <div id="modal2" class="modal" style="text-align: center;">
    <div class="modal-content">
      <h4>Uploading News</h4>
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
  <p>Please wait while we upload the news</p>
    </div>

  </div>


    <script type="text/javascript" src="<?php echo base_url('/assets/materialize/js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/materialize/js/materialize.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/main.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/ajaxfileupload.js'); ?>"></script>

    <script>
        $(document).ready(function(){
  var imagearray=[];
var deleteimage=[];
            <?php if($inputtype=='edit'){ ?>

             if( <?php echo $values->top ;?> == '1' )
                          {
                                  $('#top').prop('checked', true);

                          }else{
                                  $('#top').prop('checked', false);

                          };

            <?php };  ?>



        $("#section2").hide();
            var section = true;
           //
            $("#changesecion").click(function(){
                if(section == true)
                {
                    $("#section1").hide();
                    $("#section2").show();
                    section = false;
                    $(this).html('Back To News');
                }else{
                    $("#section1").show();
                    $("#section2").hide();
                    section = true;
                    $(this).html('Add More Photos');
                };


});







      $('#upload_file').delegate("#userfile",'change',function(){
          var i=0;

          var d = $("input[name^=userfile]").val();
          d=d.substring(12);


            $('#upload_file').submit(function(e) {
                $('#modal1').openModal();
                e.preventDefault();
                $.ajaxFileUpload({
                    url             : "<?php echo site_url('/').'news/upload_file?name='?>"+d,
                    secureuri       :false,
                    fileElementId   :'userfile',
                    data            :{'name' : 20},
                    processData     : false,
                    contentType     : false,
                    dataType: 'JSON',
                    success : function (data)
                    {

                       var obj = jQuery.parseJSON(data);

                        if(obj['status'] == 'success')
                        {


                            imagearray.push(obj['msg']);
                            var img = "<div class='inlinedisplay'><img src='http://www.pixoloproductions.com/nbnews/hiramanekBackend/uploads/"+obj['msg']+"'  width='80px' class='addmoreimg' class='"+obj['msg']+"' /><a class='rem btn-floating waves-effect waves-light red removebtn' remove='"+obj['msg']+"'><i class='material-icons removeicon'>remove</i></a></div>";
                              $('#showmorephotos').append(img);

                           i++
                         }
                        else
                         {

                            $('#files').html('Some failure message');
                          }
                           $('#modal1').closeModal();
                    }
                });
               e.stopImmediatePropagation();
                return false;

            });

          $('#upload_file').submit();


      });
       $('#showmorephotos').delegate('.rem','click',function(){
          $(this).parent().remove();
           if( '<?php echo $inputtype ;?>' == 'edit' )
           {
             var index=imagearray.indexOf($(this).attr('remove'));
               if(index==-1)
               {
                  deleteimage.push($(this).attr('remove'));
               }
           }
           imagearray.splice(imagearray.indexOf($(this).attr('remove')),1);
            return false;

       })


            $('.rem').click(function(){
                $('.'+$(this).attr('remove')).remove();


            });



$('#language').on('change', function() {



  if($('#language').val()==1)
  {
      $('.validate').removeClass("hindifont");
      $('.validate').removeClass("gujufont");
      $('.validate').parent().removeClass('width100');
  }
    else if($('#language').val()==4)
    {

      $('.validate').addClass("hindifont");
      $('.validate').removeClass("gujufont");
        //SOME PROBLEM DURING HNDI NEWS, WIDTH WAS BECOMING SMALL
        $('.validate').parent().addClass('width100');


    }
     else if($('#language').val()==2)
    {

      $('.validate').addClass("gujufont");
      $('.validate').removeClass("hindifont");
        $('.validate').parent().removeClass('width100');
    }

});

            $('#formsubmit').click(function(){
              $('#modal2').openModal();
               if($('#top').prop('checked') == true)
                            {
                                $('#top').attr('value', '1');
                            }
                else{


                                $('#top').prop('checked', true);

                                $('#top').attr('value', '0');

                            }
                if(imagearray.length>0)
                {

                    var input =[];
                    for(var i=0;i<imagearray.length;i++)
                    {
                        input[i]= $("<input>").attr({"type":"hidden","name":"moreimages"+i}).val(imagearray[i]);

                        }


                        $('#createform').append(input);
                     }
                 if(deleteimage.length>0)
                {

                    var image =[];
                    for(var i=0;i<deleteimage.length;i++)
                    {
                        image[i]= $("<input>").attr({"type":"hidden","name":"deleteimages"+i}).val(deleteimage[i]);

                        }


                        $('#createform').append(image);
                     }
                    $('#createform').submit();
            });
        });
    </script>
</body>

</html>