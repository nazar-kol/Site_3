<?php
require("connect_db.php");

$sql='SELECT * FROM main';
$res=mysqli_query($connect, $sql);
$result=mysqli_fetch_array($res);
?>


<div class="py-2 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
			    		<div class="col-md-7 pr-5 d-flex topper align-items-center">
			    			<div class="icon bg-fifth mr-2 d-flex justify-content-center align-items-center"><span class="icon-map"></span></div>
						    <span class="text"><?php echo $result['adress']; ?></span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon bg-secondary mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <a class="text" href="mailto:<?php echo $result['email']; ?>"><?php echo $result['email']; ?></a>
					    </div>
					    <div class="col-md pr-3 d-flex topper align-items-center">
					    	<div class="icon bg-tertiary mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <a  class="text" href="tel://<?php echo $result['phone']; ?>"><?php echo $result['phone']; ?></a>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
	    	<a class="navbar-brand" href="index.php">Новосільський заклад загальної<br> середньої освіти І-ІІІ ступенів</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Меню
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item"><a href="index.php" class="nav-link pl-0">Головна</a></li>
	        	<li class="nav-item"><a href="about.php" class="nav-link">Про школу</a></li>
	        	<li class="nav-item"><a href="teacher.php" class="nav-link">Вчителі</a></li>
	        	<li class="nav-item"><a href="documents.php" class="nav-link">Документація</a></li>
	        	<li class="nav-item"><a href="blog.php" class="nav-link">Новини</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Контакти </a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>