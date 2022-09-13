<?php
require("connect_db.php");

$sql='SELECT * FROM main';
$res=mysqli_query($connect, $sql);
$result=mysqli_fetch_array($res);
?>
<footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-4">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Контакти</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text"><?php echo $result['adress']; ?></span></li>
	                <li><span class="icon icon-phone"></span><span class="text"><?php echo $result['phone']; ?></span></li>
	                <li><span class="icon icon-envelope"></span><span class="text"><?php echo $result['email']; ?></span></li>
	              </ul>
	            </div>
            </div>
          </div>
          <?php 
          $sql='SELECT * FROM news ORDER BY id DESC';
          $res=mysqli_query($connect, $sql);
          $news=array();
          for($i=0;$i<3;$i++){
            $news[]=mysqli_fetch_array($res);
          }
          
          ?>
          <div class="col-md-6 col-lg-4">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Останні новини</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(<?php echo $news[0]['main_foto'] ?>);" href="blog-single.php?id=<?php echo $news[0]['id'] ?>"></a>
                <div class="text">
                  <h3 class="heading"><a href="blog-single.php?id=<?php echo $news[0]['id'] ?>"><?php echo $news[0]['name'] ?></a></h3>
                  <div class="meta">
                    <div><a href="blog-single.php?id=<?php echo $news[0]['id'] ?>"><span class="icon-calendar"></span> <?php echo $news[0]['date']; ?></a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-5 d-flex">
                <a class="blog-img mr-4" style="background-image: url(<?php echo $news[1]['main_foto'] ?>);" href="blog-single.php?id=<?php echo $news[1]['id'] ?>"></a>
                <div class="text">
                  <h3 class="heading"><a href="blog-single.php?id=<?php echo $news[1]['id'] ?>"><?php echo $news[1]['name'] ?></a></h3>
                  <div class="meta">
                    <div><a href="blog-single.php?id=<?php echo $news[1]['id'] ?>"><span class="icon-calendar"></span><?php echo $news[1]['date']; ?></a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Меню</h2>
              <ul class="list-unstyled">
                <li><a href="index.php"><span class="ion-ios-arrow-round-forward mr-2"></span>Головна</a></li>
                <li><a href="about.php"><span class="ion-ios-arrow-round-forward mr-2"></span>Про школу</a></li>
                <li><a href="teacher.php"><span class="ion-ios-arrow-round-forward mr-2"></span>Вчителі</a></li>
                <li><a href="documents.php"><span class="ion-ios-arrow-round-forward mr-2"></span>Документація</a></li>
                <li><a href="blog.php"><span class="ion-ios-arrow-round-forward mr-2"></span>Новини</a></li>
				<li><a href="contact.php"><span class="ion-ios-arrow-round-forward mr-2"></span>Контакти</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>