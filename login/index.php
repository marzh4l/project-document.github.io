<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DocumenApp</title>
    <link href="../logo/ukb.png" rel="icon">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Font Awesome -->
    <link href="../assets/vendors-adm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../assets/vendors-adm/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../assets/vendors-adm/animate.css/animate.min.css" rel="stylesheet">
    
    
    <!-- Custom Theme Style -->
    
    <link href="../assets/custom.min.css" rel="stylesheet">
    <style>
      .logo{width: 30%;}
      .akun{padding-left: 50px;}
      .icon1{
        margin-top: 58px;
        border-right: 1px solid #ccc;
        left: 5px;
      }
      .icon2{
        margin-top: 115px;
        border-right: 1px solid #ccc;
        left: 5px;
      }
    </style>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
        <img src="../logo/ukb.png" class="rounded mx-auto d-block logo" alt="../logo/ukb.png">
          <section class="login_content">
          <?php 
            if(isset($_GET['pesan'])){
              if($_GET['pesan'] == "gagal"){
                echo "Login gagal! username dan password salah!";
              }else if($_GET['pesan'] == "logout"){
                echo "Anda telah berhasil logout";
              }else if($_GET['pesan'] == "belum_login"){
                echo "Anda harus login untuk mengakses halaman admin";
              }
            }
          ?>
            <form method="post" action="ps_login.php" class="form-label-left input_mask">
              <h1>Login DocumentApp</h1>
              <div class="form-group has-feedback">
                <input type="text" class="form-control akun" id="username" placeholder="Username" name="username">
                <span class="fa fa-user form-control-feedback icon1" aria-hidden="true"></span>
              </div>
              <div class="form-group has-feedback icon">
                <input type="password" class="form-control akun" id="password" placeholder="Password" name="password">
                <span class="fa fa-key form-control-feedback icon2" aria-hidden="true"></span>
              </div>
              <div>
                <button class="btn btn-outline-dark submit" type="submit"><i class="fa fa-key"></i> Login</button>
                <!-- <button class="btn btn-default reset" type="reset">Reset</button> -->
                <!-- <a class="btn btn-default submit" href="index.html">Lo
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>g in</a> -->
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!-- <p class="change_link">New to site? -->
                  <!-- <a href="#signup" class="to_register"> Create Account </a> -->
                <!-- </p> -->

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> DocumentApp</h1>
                  <p>©2022 All Rights Reserved.<br> Create by <b>Universitas Kader Bangsa Palembang</b></p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
    	<!-- Bootstrap -->
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
  </body>
</html>
