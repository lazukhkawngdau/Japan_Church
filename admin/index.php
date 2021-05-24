<?php 
session_start();
require "../config/config.php";

if (empty($_SESSION['username']) && empty($_SESSION['user_id'])) {
	header("location: login.php");
}

$stmt = $pdo->prepare('SELECT * FROM news ORDER BY id DESC');
$stmt->execute();
$result = $stmt->fetchAll();

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
				<a href="logout.php" class="btn btn-warning" style="float: right;">Logout</a>
				<div>
					
					<h1>News</h1>
					<a href="create_new.php" class="btn btn-success mb-2">Create New New</a>

					<table class="table table-bordered">
						<tr>
							<th>No</th>
							<th>Title</th>
							<th>Description</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
						<?php 
						$i = 1;
						foreach ($result as $value) { ?>
							<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $value['title']; ?></td>
							<td><?php echo substr($value['description'],0,10); ?></td>
							<td><?php echo date("Y-m-d h:i:s", strtotime($value['created_at'])); ?></td>


							<td>
								<a href="edit_new.php?id=<?php echo $value['id']; ?>" class="btn btn-primary">Edit</a>
								<a href="delete_new.php?id=<?php echo $value['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this item')">Delete</a>
							</td>
						</tr>
						<?php 
						$i++;
						}
						?>
					</table>
				</div>
			</div>
			
		</div>
	</div>
</body>
<?php include('footer.php'); ?>