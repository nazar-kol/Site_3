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
<html>
  <head>
    <title>Новосільський заклад загальної середньої освіти І-ІІІ ступенів</title>

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
	  <?php require_once("header.php") ?>
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(images/1e67feef4a5af6698d4ebeae1668577e.jpg);"></div>
      <div class="slider-item" style="background-image:url(images/4f31ee5a46562ccdf36693e76372d606.jpg);"></div>
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
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Останні</span> Новини</h2>
          </div>
        </div>
				<div class="row">
          <?php 
          $sql='SELECT * FROM news ORDER BY id DESC';
          $res=mysqli_query($connect, $sql);
          for($i=0;$i<3;$i++){
            $news=mysqli_fetch_array($res);
          ?>
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.php?id=<?php echo $news['id'] ?>" class="block-20 d-flex align-items-end" style="background-image: url('<?php echo $news['main_foto'] ?>');">
								<div class="meta-date text-center p-2">
                  <span class="day"><?php echo substr($news['date'],0,2); ?></span>
                  <span class="mos"><?php echo month(substr($news['date'],3,2)); ?></span>
                  <span class="yr"><?php echo substr($news['date'],6,10); ?></span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="blog-single.php?id=<?php echo $news['id'] ?>"><?php echo $news['name'] ?></a></h3>
                <p><?php echo $news['s_text'] ?></p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="blog-single.php?id=<?php echo $news['id'] ?>" class="btn btn-secondary">Детальніше <span class="ion-ios-arrow-round-forward"></span></a></p>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
			</div>
		</section>
		
    <?php include_once("footer.php") ?>
    

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