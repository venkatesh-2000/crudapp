<?php
	include 'action.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD APP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="p-3 bg-warning justify-content-center">
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">CRUD App</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Create</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Read</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Update</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Delete</a>
      </li>
    </ul>
  </div>
  <div>
  	<form class="form-inline">
  		<input  class="form-control mr-sm-2" type="text" name="search" placeholder="search">
  		<button class="btn btn-primary" type="submit">Search</button>
  	</form>
  </div>
</nav><br>
<h1 class="text-center p-2 bg-success">My CRUD App</h1><hr>

<?php if(isset($_SESSION['response'])){ ?>
	<div class="alert alert-<?=$_SESSION['res_type']; ?> alert-dissmissible text-center">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?= $_SESSION['response'];?>
	</div>
<?php } unset($_SESSION['response']); ?>

<div class="row md-10 p-4">
	<div class="col-md-4 p-2">
		<h3 class="text-center text-success">Add Details</h3>
		<form action="action.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<input type="text" name="Name"  class="form-control" placeholder="Enter your name" required>
			</div>
			<div class="form-group">
				<input type="email" name="e-mail"  class="form-control" placeholder="Enter your email" required>
			</div>
			<div class="form-group">
				<input type="tel" name="phone"  class="form-control" placeholder="Enter your phone" required>
			</div>
			<div class="form-group">
				<input type="file" name="image"  class="form-control" required>
			</div>
			<div class="form-group">
				<input type="submit" name="add" class="btn btn-primary btn-block" value="Add record">
			</div>
		</form>

	</div>
	<div class="col-md-8">
		<?php
			$query="SELECT  * FROM crud_app";
			$stmt=$conn->prepare($query);
			$stmt->execute();
			$result=$stmt->get_result();
		 ?>
		<h3 class="text-center text-success">Records</h3>
		<hr>
			<table class="table table-striped table-hovers">
	         	<tr>
	         		<th>Id</th>
	         		<th>Image</th>
	         		<th>Name</th>
	         		<th>Email</th>
	         		<th>Phone</th>
	         		<th>Action</th>
	         	</tr>
	         	 
	         	<?php while($row=$result->fetch_assoc()){ ?>
	         	<tr>
	         		<td><?= $row['id']; ?></td>
	         		<td><img src="<?= $row['photo']; ?>" width="25"></td>
	         		<td><?= $row['name']; ?></td>
	         		<td><?= $row['email']; ?></td>
	         		<td><?= $row['phone']; ?></td>
	         		<td>
	         			<a href="#" class="badge badge-success">Edit</a>  |
	         			<a href="#" class="badge badge-info">Det</a>  |
	         			<a href="#" class="badge badge-danger">Del</a>  			
	         		</td>
	         	</tr>
	         	<?php } ?>
			</table>
	</div>
	
</div>
</body>
</html>

