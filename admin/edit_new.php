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
	$file = 'images/'.$_FILES['image']['name'];
	$fileType = pathinfo($file, PATHINFO_EXTENSION);

	if ($fileType != 'png' && $fileType != 'jpg' && $fileType != 'jpeg') {
		echo "<script>alert('Image must be PNG,JPG,JPEG');</script>";
	} else {
		move_uploaded_file($_FILES['image']['tmp_name'], $file);
		$stmt = $pdo->prepare("UPDATE news set title='$title',description='$description',image='$image' WHERE id=".$_GET['id']);
		$result = $stmt->execute();

		if ($result) {
			echo "<script>alert('Successfully Updated');location.href='index.php';</script>";
		}
	}
}


$stmt = $pdo->prepare("SELECT * FROM news WHERE id=".$_GET['id']);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

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
					
					<h1>EDIT NEW</h1>
						<form action="" method="POST" class="" enctype="multipart/form-data">
							<div class="form-outline mb-4">
								<label class="form-label" for="form1Example1">Title</label>
		    					<input type="text" name="title" id="form1Example1" class="form-control"  value="<?php echo $result['title'] ?>" required />
		  					</div>
							<div class="form-group">
								<label for="">Description</label>
								<textarea cols="8" name="description" rows="5" class="form-control"><?php echo $result['title']; ?></textarea>
							</div>
							<div class="form-group">
								<label for="">Image</label><br>
								<input type="file" name="image" class="" required style="display: block" />
								<img src="images/<?php echo $result['image']; ?>" width="200" height="200" class="mt-2">
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