<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="ThemeStarz">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/selectize.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/user.css">

	<title>Tour Land | <?php echo $title ?></title>

</head>
<body>
    <div class="page home-page">
        <!--*********************************************************************************************************-->
        <!--************ HERO ***************************************************************************************-->
        <!--*********************************************************************************************************-->
        <section class="hero">
            <div class="hero-wrapper">
                <!--============ Secondary Navigation ===============================================================-->
                <div class="secondary-navigation">
                    <div class="container">
                        <ul class="left">
                            <li>
                            <span>
                                <i class="fa fa-phone"></i> +256 700000000
                            </span>
                            </li>
                        </ul>
                        <!--end left-->
                        <ul class="right">

                            <li>
                                <a href="register.html">
                                    <i class="fa fa-pencil-square-o"></i>Register
                                </a>
                            </li>
                        </ul>
                        <!--end right-->
                    </div>
                    <!--end container-->
                </div>
                <!--============ End Secondary Navigation ===========================================================-->
                <!--============ Main Navigation ====================================================================-->
                <div class="main-navigation">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                            <a class="navbar-brand" href="index.html">
                                <img src="assets/img/logo.png" alt="">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbar">
                                <!--Main navigation list-->
                                <?php  $this->load->view('layouts/menu');  ?>
                                <!--Main navigation list-->
                            </div>
                            <!--end navbar-collapse-->
                        </nav>
                        <!--end navbar-->

                        <!--end breadcrumb-->
                    </div>
                    <!--end container-->
                </div>
                <!--============ End Main Navigation ================================================================-->
                <!--============ Page Title =========================================================================-->


        <?php echo $contents ?>

        <!--*********************************************************************************************************-->
        <!--************ FOOTER *************************************************************************************-->
        <!--*********************************************************************************************************-->
        <footer class="footer">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                      

                        <!--end col-md-3-->
                        <div class="col-md-4">
                            <h2>Contact</h2>
                            <address>
                                <figure>
                                    124 Makerere University<br>
                                    Kampala, Uganda
                                </figure>
                                <br>
                                <strong>Email:</strong> <a href="#">hello@example.com</a>
                                <br>
                                <strong>Skype: </strong> tour
                                <br>
                                <br>
                                <a href="contact.html" class="btn btn-primary text-caps btn-framed">Contact Us</a>
                            </address>
                        </div>
                        <!--end col-md-4-->
                    </div>
                    <!--end row-->
                </div>
                <div class="background">
                    <div class="background-image original-size">
                        <img src="<?php echo base_url(); ?>assets/img/footer-background-icons.jpg" alt="">
                    </div>
                    <!--end background-image-->
                </div>
                <!--end background-->
            </div>
        </footer>
        <!--end footer-->
    </div>
    <!--end page-->

	<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/selectize.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/masonry.pkgd.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/icheck.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
  <?php if (isset($script)){ ?>

  <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDbB1bX23MDkleWZpvWrFd8GqhIUXKO9AM&libraries=places"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>

  <script>
      var latitude = <?php echo $coordinates[0]; ?>;
      var longitude = <?php echo $coordinates[1]; ?>;
      var markerImage = "<?php echo base_url(); ?>assets/img/map-marker.png";
      var mapTheme = "light";
      var mapElement = "map-small";
      simpleMap(latitude, longitude, markerImage, mapTheme, mapElement, 30);
  </script>
  <?php } ?>
<!-- <?php if (isset($script)) { $this->load->view('script'); } ?> -->
</body>
</html>
