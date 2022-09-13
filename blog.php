<!DOCTYPE html>
<?php require_once("connect_db.php");
function month($a){
	switch($a){
		case "01":
			return "Січня";
			break;
		case "02":
			return "Лютого";
			break;
		case "03":
			return "Березня";
			break;
		case "04":
			return "Квітня";
			break;
		case "05":
			return "Травня";
			break;
		case "06":
			return "Червня";
			break;
		case "07":
			return "Липня";
			break;
		case "08":
			return "Серпня";
			break;
		case "09":
			return "Вересня";
			break;
		case "10":
			return "Жовтня";
			break;
		case "11":
			return "Листопада";
			break;
		case "12":
			return "Грудня";
			break;
	}
}
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
            <h1 class="mb-2 bread">Новини</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Головна <i class="ion-ios-arrow-forward"></i></a></span> <span>Новини </span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row">
          <?php 
          $sql='SELECT * FROM news ORDER BY id DESC';
          $res=mysqli_query($connect, $sql);
          while($news=mysqli_fetch_array($res)){
            echo '<div class="col-md-6 col-lg-4 ftco-animate"><div class="blog-entry"><a href="blog-single.php?id='.$news['id'].'" class="block-20 d-flex align-items-end" style="background-image: url('.$news['main_foto'].');"><div class="meta-date text-center p-2"><span class="day">'.substr($news['date'],0,2).'</span><span class="mos">'.month(substr($news['date'],3,2)).'</span><span class="yr">'.substr($news['date'],6,10).'</span></div></a><div class="text bg-white p-4"><h3 class="heading"><a href="blog-single.php?id='.$news['id'].'">'.$news['name'].'</a></h3><p>'.$news['s_text'].'</p><div class="d-flex align-items-center mt-4"><p class="mb-0"><a href="blog-single.php?id='.$news['id'].'" class="btn btn-secondary">Детальніше <span class="ion-ios-arrow-round-forward"></span></a></p></div></div></div></div>';} ?>
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