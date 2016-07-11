<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <title>Login</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url('/assets/materialize/css/materialize.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/admin.css'); ?>" rel="stylesheet">
</head>

<body class="login">
    
    <div class="container">
<!--
        <form action="<?php echo site_url('/welcome/logincheck'); ?>" method="get">
        
-->
        <form action="<?php echo site_url('/welcome/logincheck'); ?>" method="get">
            <div class="login_area z-depth-3">
                <div class="row nomarg">
                    <div class="login_head">
                        <h4 class="nomarg">Login</h4>
                    </div>
                </div> 
                <div class="login_details">
                    <div class="row nomarg">
                        <div class="input-field">
                            <input id="email" name="email" type="text" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row nomarg">
                        <div class="input-field">
                            <input id="password" type="password" name="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <button type="submit" class="waves-effect waves-light btn">Login</button>
                </div>
            </div>  
        </form>
    </div>

    
    
    <script type="text/javascript" src="<?php echo base_url('/assets/materialize//js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/materialize//js/materialize.js'); ?>"></script>
</body>
    
</html>

    
    
</form>-->