<!DOCTYPE html>
<?php require_once("connect_db.php");
$sql='SELECT * FROM main';
$res=mysqli_query($connect, $sql);
$result=mysqli_fetch_array($res);
 ?>
<html lang="en">
  <head>
    <title>Новосільський заклад загальної середньої освіти І-ІІІ ступенів</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  <?php include_once("header.php") ?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/1e67feef4a5af6698d4ebeae1668577e.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Контакти</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Головна <i class="ion-ios-arrow-forward"></i></a></span> <span>Контакти</span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-4 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Адреса</h3>
	            <p><?php echo $result['adress']; ?></p>
	          </div>
          </div>
          <div class="col-md-4 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Телефон</h3>
	            <p><a href="tel://<?php echo $result['phone']; ?>"><?php echo $result['phone']; ?></a></p>
	          </div>
          </div>
          <div class="col-md-4 d-flex">
          	<div class="bg-light align-self-stretch box p-4 text-center">
          		<h3 class="mb-4">Електронна пошта</h3>
	            <p><a href="mailto:<?php echo $result['email']; ?>"><?php echo $result['email']; ?></a></p>
	          </div>
          </div>
        </div>
      </div>
    </section>
		
    
    <section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb" style="background-image: url(images/bg_5.jpg);" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row justify-content-end">
    			<div class="col-md-6 py-5 px-md-5 bg-primary">
	          <div class="heading-section heading-section-white ftco-animate mb-5">
	            <h2 class="mb-4">Задайте питання</h2>
	          </div>
	          <form action="index.php" class="appointment-form ftco-animate" method='post' enctype="multipart/form-data">
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="text" class="form-control" placeholder="Ім'я" name='fname'>
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" placeholder="Прізвище" name='lname'>
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
	    					<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" placeholder="Телефон" name='phone'>
		    				</div>
							<div class="form-group ml-md-4"></div>
	    				</div>
	    				<div class="d-md-flex">
	    					<div class="form-group">
		              <textarea name="message" cols="30" rows="2" class="form-control" placeholder="Повідомлення"></textarea>
		            </div>
		            <div class="form-group ml-md-4">
		              <input type="submit" value="Надіслати" name='1' class="btn btn-secondary py-3 px-4">
		            </div>
	    				</div>
	    			</form>
					<?php
					if(isset($_POST['1'])){
						$date=date("d.m.Y");
						$sql="INSERT INTO question (f_name, l_name, phone, message, date) VALUES ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['phone']."','".$_POST['message']."','$date')";
                        $res=mysqli_query($connect,$sql);
					}
					?>
    			</div>
        </div>
    	</div>
    </section>
    <?php include_once("footer.php") ?>
	

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>