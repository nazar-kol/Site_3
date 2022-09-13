<!DOCTYPE html>
<?php require_once("connect_db.php");
$id=$_GET['id'];
$sql="SELECT * FROM news WHERE id='$id'";
$res=mysqli_query($connect, $sql);
$news=mysqli_fetch_array($res);
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
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo $news['main_foto'] ?>');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread"><?php echo $news['name'] ?></h1>
             <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Головна <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="index.html">Новини<i class="ion-ios-arrow-forward"></i></a></span> <span><?php echo $news['name'] ?></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section">
			<div class="container">
				<div class="row">
          <div class="col-lg-8 ftco-animate">
            <h2 class="mb-3"><?php echo $news['name'] ?></h2>
            <p><?php echo $news['text'] ?></p>
            <p>
            <?php 
				$f=array();
				$a=0;
        $m="";
				for($i=0;$i<strlen($news['fotos']);$i++){
					if($news['fotos'][$i]=="*"){
						$a++;
            $f[]=$m;
            $m="";
					} else {
						$m=$m.$news['fotos'][$i];
					}
				}
				for($i=0;$i<count($f);$i++){

					echo "<img src=".$f[$i]." width='250px'>";
				}
			?>
            </p>
            
          </div> <!-- .col-md-8 -->

          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box ftco-animate">
            	<h3>корисні посилання</h3>
              <ul class="categories">
                <li><a href="https://mon.gov.ua/ua">МОН України </a></li>
                <li><a href="http://oblosvita.te.ua/">Управління освіти і науки Тернопільської обласної державної адміністрації </a></li>
                <li><a href="https://imzo.gov.ua/">Державна наукова установа “Інститут модернізації змісту освіти”</a></li>
                <li><a href="https://testportal.gov.ua/">Український центр оцінювання якості освіти </a></li> 
              </ul>
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