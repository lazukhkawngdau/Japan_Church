<?php 
session_start();
require "../config/config.php";

if (empty($_SESSION['username']) && empty($_SESSION['user_id'])) {
	header("location: login.php");
}

if ($_POST) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$image = $_FILES['image']['name'];
	$file = 'images/'.($_FILES['image']['name']);
	$fileType = pathinfo($file, PATHINFO_EXTENSION);

		if ($fileType != 'png' && $fileType != 'jpg' && $fileType != 'jpeg') {
			echo "<script>alert('Image must be PNG,JPG,JPEG');</script>";
		} else {

		move_uploaded_file($_FILES['image']['tmp_name'], $file);
		$stmt = $pdo->prepare('INSERT INTO news (title,description,image) VALUES (:title,:description,:image)');
		$result = $stmt->execute(
			[':title'=>$title, ':description'=>$description, ':image'=>$image]
		);

		if ($result) {
			echo "<script>alert('Successfully Created');location.href='index.php';</script>";
		}
	}
}
?>
<?php include('header.php'); ?>

	<div class="container mt-5 mb-5">
		<div class="row">

			<div class="col-md-3">
				<ul class="list-group">
					<a href="#"><li class="list-group-item">ADMIN PANEL</li></a>
					<a href="index.php"><li class="list-group-item">News</li></a>
					<a href="videos.php"><li class="list-group-item">Videos</li></a>
					<a href="admin.php"><li class="list-group-item">Admin</li></a>
				</ul>
			</div>

			<div class="col-md-9">
				<button href="logout.php" class="btn btn-warning" style="float: right;">Logout</button>
				<div>
					
					<h1>CREATE NEW</h1>
						<form action="" method="POST" class="" enctype="multipart/form-data">
							<div class="form-outline mb-4">
								<label class="form-label" for="form1Example1">Title</label>
		    					<input type="text" name="title" id="form1Example1" class="form-control" required />
		  					</div>
							<div class="form-group">
								<label for="">Description</label>
								<textarea cols="8" name="description" rows="5" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label for="">Image</label><br>
								<input type="file" name="image" class="" required />
							</div>
							<div class="form-outline mb-4">
		    					<input type="submit" class="btn btn-primary" />
		  					</div>
							
						</form>
				</div>
			</div>
			
		</div>
	</div>
</body>
<?php include('footer.php'); ?>