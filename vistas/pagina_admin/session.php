<html>
<head>
<meta charset="utf-8">
<title>Administracion - Login</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?php echo IMG;?>icono.png">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!--=====================================
  PLUGINS DE CSS
  ======================================-->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo JS;?>plugins/bootstrap/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo JS;?>plugins/font-awesome/css/font-awesome.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo CSS;?>Adminlte/css/AdminLTE.min.css">
  
  
 
</head>


<body class="hold-transition skin-green sidebar-collapse sidebar-mini login-page">
<div class="login-box">

  <div class="login-logo">
    <img src="<?php echo IMG; ?>logo.png" class="img-responsive" style="padding:10px 50px;">
  </div>
  <!-- /.login-logo -->

  <div class="login-box-body">
    
    <p class="login-box-msg">Ingresar al sistema</p>

    <form  method="post" action="session.php">

      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="user" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="pass" required>
        <input type="hidden" name="pro" value="loginadmin">
        
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <input type="submit"  class="btn btn-primary btn-block btn-flat" value="Ingresar" style="height:auto;">
        </div>
        <!-- /.col -->
      </div>

 

    </form>

  </div>
  <!-- /.login-box-body -->

</div>
<!-- /.login-box -->

</body>
</html>


