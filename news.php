<?php 
require 'config/config.php';
$stmt = $pdo->prepare("SELECT * FROM news ORDER BY id DESC");
$stmt->execute();
$result = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="icon" href="images/fb.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="dist/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dist/index.css">
    <link rel="stylesheet" type="text/css" href="dist/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="dist/aos.css">
    <script src="dist/jquery.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.css">
    <!-- Bootstrap core CSS -->
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <style type="text/css">

    </style>
</head>
<body>
	<!-- header start -->
	<section>
		<div class="container-fluid">
		<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i></button>
        
		<div>
			<div id="header">
				<nav class="navbar navbar-expand-lg navbar-light">
			  	<a class="navbar-brand" href="#">
			  		<img src="images/unnamed.jpg" style="width: 60px; height: 60px;">
			  	</a>

			  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			    	<span class="navbar-toggler-icon"></span>
			  	</button>
				  	<div class="collapse navbar-collapse" id="navbarNavDropdown">
				    	<ul class="navbar-nav ml-auto">
				      		<li class="nav-item">
				        		<a class="nav-link" href="index.html">Home</a>
				      		</li>
				      		<li class="nav-item">
				        		<a class="nav-link" href="aboutus.html">About us</a>
				      		</li>
				      		<li class="nav-item active">
				        		<a class="nav-link" href="news.html">News</a>
				      		</li>
				      		<li class="nav-item">
				        		<a class="nav-link" href="video.html">Video</a>
				      		</li>
				      		<li class="nav-item">
				        		<a class="nav-link" href="contact.html">Contact</a>
				      		</li>
				    	</ul>
				  	</div>
				</nav>
			</div>
	</section>
	<!-- End header -->
	<!-- Start Background Image -->
	<section id="bg-img">
		<div class="container-fluid">
		  
		</div>
	</section>
	<!-- End Background Image -->
	<section id="aboutus">
<!--Main layout-->
    <main class="mt-3">
        <!--Main container-->
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12 mb-12">
                    <div style="height: 60px;"></div>
                    <h2 class="h2-responsive font-weight-bold text-center my-4">News</h2>
                </div>
                
            </div>

            <!-- News Row-->
            <div class="row">

              <!-- Content column-->
              <div class="col-md-12 mb-4">

                <section class="section extra-margins pb-3 text-center text-lg-left">

                    <!--Grid row-->
                    <div class="row">
                        <?php 
                        foreach ($result as $value) { ?>
                            <!--Grid column-->
                        <div class="col-lg-3 mb-4">
                            <!--Featured image-->
                            <div class="view overlay z-depth-1">
                                <a href="newdetail.html"><img src="images/<?php echo $value['image'] ?>" class="img-fluid" alt="News" style="height:290px; width: 100%;"></a>
                               
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-7 ml-xl-1 mb-4">
                            

                            <h6 class="mb-3 dark-grey-text mt-0">
                                <strong>
                                    <a href="new.html"><b><p class="dark-grey-text"><?php echo $value['title']; ?></p></b></a>
                                </strong>
                            </h6>
                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-xl-2 col-md-6 text-sm-center text-md-right text-lg-left">
                                    <p class="red-text font-small font-weight-bold mb-1 spacing">
                                        <a>
                                            <strong>Date ::</strong>
                                        </a>
                                    </p>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-xl-5 col-md-6 text-sm-center text-md-left">
                                    <p class="font-small grey-text">
                                        <em> <?php echo date('d-M-Y h:m:s', strtotime($value['created_at'])) ?></em>
                                    </p>
                                </div>
                                <!--Grid column-->

                            </div>
                            <!--Grid row-->
                            <p class="dark-grey-text">
                               <?php echo substr($value['description'], 0,700); ?>
                            </p>

                            <!--Deep-orange-->
                            <a href="newdetail.html" class="btn btn-danger btn-rounded btn-sm waves-effect waves-light">Read more</a>
                        </div>
                        <!--Grid column-->
                        <?php }
                        ?>
                    </div>
                    <!--Grid row-->

                        <hr class="mb-5">

                <!-- Pagination -->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-12 col-md-12 mb-12">

                        <nav>
                          <ul class="pagination pg-dark d-flex justify-content-center">
                            <li class="page-item">
                              <a class="page-link" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item active"><a class="page-link">1</a></li>
                            <li class="page-item"><a class="page-link">2</a></li>
                            <li class="page-item"><a class="page-link">3</a></li>
                            <li class="page-item"><a class="page-link">4</a></li>
                            <li class="page-item"><a class="page-link">5</a></li>
                            <li class="page-item">
                              <a class="page-link" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav>

                    </div>
                    <!--Grid column-->

                </div>
                <!--End Pagination -->

                </section>

              </div>
              <!-- End Content Column-->

   



            
       </div>
        <!--End Main Container-->
    </main>
    <!--Main layout-->
	<section id="footer">
		<div class="container-fluid">
			<div class="footer">
				<p> &copy; copyright Tokyo Kachin Baptist Church</p>
<!-- 				<address>TKBC<br>
					New Life Bld; 4F, Nishi-Waseda 3-31-11<br>
					 Shinjuku-ku,Tokyo
					 169-0051 Japan
				</address> -->
			</div>
		</div>
	</section>

	


<script src="dist/aos.js"></script>
<script>
  AOS.init({
    easing: 'ease-in-out-sine'
  });
</script>

<!-- script -->
<script>
//Get the button
var mybutton = document.querySelector("#myBtn");
// When the user scrolls down 50px from the top of the document, resize the header's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    // document.getElementById("header").style.fontSize = "17px";
    // document.getElementById("header").style.paddingTop = "0px";
    // document.getElementById("header").style.paddingBottom = "0px";
    // document.getElementById("header").style.transition = "0.5s";
    
    // document.getElementById("header").style.fontSize = "20px";
  } else {
    // document.getElementById("header").style.fontSize = "17px";
    // document.getElementById("header").style.paddingTop = "15px";
    // document.getElementById("header").style.paddingBottom = "15px";
  }

  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    mybutton.style.opacity = "100%";

  } else {
    mybutton.style.opacity = "0%";
  }


}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</body>
</html>