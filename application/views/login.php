<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>SI KOSTUM</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url();?>assets/img/costume.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?php echo base_url();?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/login.css">
</head>
<body>
	<div class="sidenav">
         <div class="login-main-text">
         	<div style="padding-left: 25px;">
         	<h2>SI KOSTUM<br></h2>
            <p>Sistem Informasi Persewaan Kostum</p>
         	</div>
            <img src="<?php echo base_url()?>assets/img/store.png" width="500px" >
         </div>
      </div>
      <div class="main">
         <div class="col-md-10 col-sm-12">

            <div class="login-form">
            	
               <form action="<?php echo base_url();?>login/proses_login" method="POST">
               	  <div class="form-group">
               	  	<h1 style="color: #15abeb;">LOGIN</h1>	
               	  </div>
                    <?php
                     $hasil = $this->session->flashdata('hasil');
                     if (empty($hasil)) {
                        echo " ";
                     }else{
                  ?>
                  <div class="alert alert-primary">
                     <button type="button" class="close" data-dismiss="alert" aria-label="close">
                       
                     </button>
                     <?php echo $hasil  ?><br>
                  </div>
                  
                  <?php
                  }
                  ?>
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" class="form-control" placeholder="Username" name="username" required>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" placeholder="password" name="password" required>
                  </div>
                   <div class="form-group">
                     <div class="text-right">
                        <button type="submit" name="submit" class="btn btn-black">Masuk</button>
                     </div>
                  
                	</div>
               </form>
            </div>
         </div>
      </div>
	
	</div>
	<!--   Core JS Files   -->
	<script src="<?php echo base_url();?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/core/popper.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/core/bootstrap.min.js"></script>

	<script type="text/javascript">
   window.setTimeout(function(){
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
         $(this).remove();
      });
   },3000);
</script>

	
</body>
</html>