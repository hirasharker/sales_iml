<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ifad Autos Ltd</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url();?>vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="<?php echo base_url();?>login/check_user/">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Email id" required="" name="email_id"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required=""  name="password" />
              </div>

              <?php if($this->session->userdata('error') != NULL){ ?>
                  <div class="form-group">
                      <p class="alarm" style="color:#f00;"><?php echo $this->session->userdata('error'); $this->session->unset_userdata('error'); ?></p>
                  </div>
              <?php } ?>
              

              <div>
                <input class="btn btn-default submit" type="submit" value="Log In"/>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>
              

              <div class="separator">
                <p class="change_link">New to site?
                  Contact IT department
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1> Ifad Autos Ltd</h1>
                  <p>©2017 All Rights Reserved. </p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
