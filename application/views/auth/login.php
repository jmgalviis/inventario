 <?php 
    $identity = array('name' => 'identity',
        'class' => 'form-control',
        'placeholder' => '',
        'id' => 'identity',
        'required' => 'True'
        );
    $password = array('name' => 'password',
        'class' => 'form-control',
        'type' => 'password',
        'id' => 'password',
        'required' => 'True'
        );
    $enviar = array(
        'class' => 'btn btn-success btn-lg');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INVETARIO</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/freelancer.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/jquery-ui.theme.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
  <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>">InvetAPP</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
<hr>
<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><?php echo lang('login_heading');?></h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                        <?php echo form_open("auth/login");?>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls">
                                <?php echo lang('login_identity_label', 'identity');?>
                                <?php echo form_input($identity);?>
                            </div>                            
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls">
                                <?php echo lang('login_password_label', 'password');?>
                                <?php echo form_input($password);?>
                            </div>
                        </div>
                        <div id="infoMessage" class="row control-group"><?php echo $message;?></div>
                        <br>
                         <div class="row">
                            <div class="form-group col-xs-12">
                              <?php echo lang('login_remember_label', 'remember');?>
                              <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?><br>
                              <?php echo form_submit($enviar,lang('login_submit_btn'));?>
                              <a href="forgot_password" class="btn btn-warning btn-lg"><?php echo lang('login_forgot_password');?></a></p>
                              <?php echo form_close();?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>


<!-- <h1></h1>
<p><?php //echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>



  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p> -->


</body>