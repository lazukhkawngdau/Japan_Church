		<!-- Start Video Section -->
	<section id="footer">
		<div class="container-fluid">
			<div class="footer">
				<p><b><strong>&copy;</strong>copyright </b> Hkun Htoo Aung </p>
			</div>
		</div>
	</section>
	<!-- End Video Section -->


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