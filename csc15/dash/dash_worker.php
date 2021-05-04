<?php 

 session_start();
 include 'db_connect.php';
 mysqli_select_db($conn,$dbname);

 if (isset($_GET['logout'])) {
	 //checks if logout is clicked(set)
	session_destroy();
	unset($_SESSION['username']);
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
	unset($_SESSION['position']);
    header("location: ../index.html");
 }
 
if(isset($_POST['sub_mit'])){
	//get items requested from dash_worker.php page
	 $itemm = $_POST["item_name"];
	 $statss = $_POST["statss"];
	 $requester = $_SESSION['username'];

	//place all items requested for in a table in the DataBase
	 $query = "INSERT INTO requests(username,Item,Stats) 
	 VALUES('$requester', '$itemm', '$statss')";

    if (mysqli_query($conn, $query)) { ?>
	<script>alert('Request submitted')</script>
    <?php } else { ?>
		<script>alert('Request not submitted...connection failure')</script>	
    <?php  }
}
?>

<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">
	<link rel="stylesheet" href="../assets/css/style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="../index.html" class="logo d-flex align-items-center">
					<img src="../assets/img/logo.png" alt="">
					<span style="color: #012970; font-weight: 700; margin-top: 3px; font-size: 30px; letter-spacing: 1px;
					">CG15</span>
				  </a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								<span class="notification">3</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													New user registered
												</span>
												<span class="time">5 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-success"> <i class="la la-comment"></i> </div>
											<div class="notif-content">
												<span class="block">
													Rahmad commented on Admin
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-img"> 
												<img src="assets/img/person.png" alt="Img Profile">
											</div>
											<div class="notif-content">
												<span class="block">
													HR send messages to you
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-danger"> <i class="la la-heart"></i> </div>
											<div class="notif-content">
												<span class="block">
													Farrah liked Admin
												</span>
												<span class="time">17 minutes ago</span> 
											</div>
										</a>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="assets/img/person.png" alt="user-img" width="36" class="img-circle"><span >Avatar</span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="assets/img/person.png"></div>
										<div class="u-text">
											<!--Gets the name and position from the database using sessions-->
											<h4><?php echo $_SESSION['position']." ".$_SESSION['username']; ?></h4>
											<p class="text-muted">example@group.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
									<a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
									<div class="dropdown-divider"></div>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="assets/img/person.png">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
								<?php echo $_SESSION['position']." ".$_SESSION['username'];?>

								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								
							</div>
						</div>
					</div>
					<div class="profile-tab-nav border-right">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#inventory" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							Inventory
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#assets" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Assets
						</a>
						
						<a class="nav-link" id="application-tab" data-toggle="pill" href="#chat" role="tab" aria-controls="application" aria-selected="false">
							<i class="fa fa-tv text-center mr-1"></i> 
							Chat
						</a>
						<li class="nav-item update-pro">
							<button  data-toggle="modal" data-target="../index.html">
								<i class="la la-hand-pointer-o"></i>
								<a href="dash_worker.php?logout='1'" style="color:black";>Log Out</a>
							</button>
						</li>
					</div>
				</div>
				</div>
			</div>
			<div class="main-panel tab-content">
				<div class="content tab-pane fade show active" id="inventory" role="tabpanel" aria-labelledby="account-tab">
					<div class="container-fluid">
						<h4 class="page-title">Inventory in DataBase</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
											<img id="img6" src="assets/img/image.jpeg" width="250" height="200" alt="Psychopomp" />
											<a class="card-description" href="https" id="btn" onclick="myBtn(document.getElementById('img6').src,document.getElementById('lp').innerHTML)" data-toggle="modal" data-target="#myModal">
											<!--Gets the quantity and name of assets from the database for display-->
											<?php   $query = "SELECT `Quantity`,`Item` FROM `office items` WHERE `id`= 1 ";
                                                    $result = mysqli_query($conn, $query);
													$row=mysqli_fetch_assoc($result);
													$_SESSION['item1'] = $row["Item"];?>
												<h2 id="lp"><?php echo $_SESSION['item1'];?></h2>
												<p>
													<?php echo $row["Quantity"]." "."Pieces"; ?> 
											</p>
										</a>
										
									</div>
								</div>
								<div class="card">
									<div class="card-header">
											<img id="img5" src="assets/img/frige.jpeg" width="250" height="200" alt="Psychopomp" />
											<a class="card-description" href="https" id="btn" onclick="myBtn(document.getElementById('img5').src,document.getElementById('reg').innerHTML)" data-toggle="modal" data-target="#myModal">
											<!--Gets the quantity and name of assets from the database for display-->
											<?php   $query = "SELECT `Quantity`,`Item` FROM `office items` WHERE `id`= 2 ";
                                                    $result = mysqli_query($conn, $query);
													$row=mysqli_fetch_assoc($result);
													$_SESSION['item'] = $row["Item"];?>
												<h2 id="reg"><?php echo $_SESSION['item'];?></h2>
												<p>
													<?php echo $row["Quantity"]." "."Pieces"; ?> 
											</p>
											</a>
									</div>
								</div>
								<div class="card">
									<div class="card-header">
											<img id="img4" src="assets/img/funiture.jpeg" width="250" height="200" alt="Psychopomp" />
											<a class="card-description" href="https" id="btn" onclick="myBtn(document.getElementById('img4').src,document.getElementById('fn').innerHTML)" data-toggle="modal" data-target="#myModal">
											<!--Gets the quantity and name of assets from the database for display-->
											<?php   $query = "SELECT `Quantity`,`Item` FROM `office items` WHERE `id`= 3 ";
                                                    $result = mysqli_query($conn, $query);
													$row=mysqli_fetch_assoc($result);
													$_SESSION['item'] = $row["Item"];?>
												<h2 id="fn"><?php echo $_SESSION['item'];?></h2>
												<p>
													<?php echo $row["Quantity"]." "."Pieces"; ?> 
											</p>
											</a>
									</div>
								</div>
								<div class="card">
									<div class="card-header">
											<img  id="img3" src="assets/img/ac.jpeg" width="250" height="200" alt="Psychopomp" />
											<a class="card-description" href="https" id="btn" onclick="myBtn(document.getElementById('img3').src,document.getElementById('ar').innerHTML)" data-toggle="modal" data-target="#myModal">
											<!--Gets the quantity and name of assets from the database for display-->
											<?php   $query = "SELECT `Quantity`,`Item` FROM `office items` WHERE `id`= 4 ";
                                                    $result = mysqli_query($conn, $query);
													$row=mysqli_fetch_assoc($result);
													$_SESSION['item'] = $row["Item"];?>
												<h2 id="ar"><?php echo $_SESSION['item'];?></h2>
												<p>
													<?php echo $row["Quantity"]." "."Pieces"; ?> 
											</p>
											</a>
									</div>
								</div>
								<div class="card">
									<div class="card-header">
											<img id="img2" src="assets/img/printer.jpeg" width="250" height="200" alt="Psychopomp" />
											<a class="card-description" href="https" id="btn" onclick="myBtn(document.getElementById('img2').src,document.getElementById('pr').innerHTML)" data-toggle="modal" data-target="#myModal">
											<!--Gets the quantity and name of assets from the database for display-->
											<?php   $query = "SELECT `Quantity`,`Item` FROM `office items` WHERE `id`= 5 ";
                                                    $result = mysqli_query($conn, $query);
													$row=mysqli_fetch_assoc($result);
													$_SESSION['item'] = $row["Item"];?>
												<h2 id="pr"><?php echo $_SESSION['item'];?></h2>
												<p>
													<?php echo $row["Quantity"]." "."Pieces"; ?> 
											</p>
										</a>

									</div>
								</div>
								<div class="card">
									<div class="card-header">
										<img  id ="img" src="assets/img/cabinet.jpeg" width="250" height="200" alt="Psychopomp" />
										 <a id="btn"  onclick="myBtn(document.getElementById('img').src,document.getElementById('ca').innerHTML)" data-toggle="modal" data-target="#myModal">
										 <!--Gets the quantity and name of assets from the database for display-->
										 <?php   $query = "SELECT `Quantity`,`Item` FROM `office items` WHERE `id`= 6 ";
                                                    $result = mysqli_query($conn, $query);
													$row=mysqli_fetch_assoc($result);
													$_SESSION['item'] = $row["Item"];?>
												<h2 id="ca"><?php echo $_SESSION['item'];?></h2>
												<p>
													<?php echo $row["Quantity"]." "."Pieces"; ?> 
											</p>
										</a>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Modal Assets -->
				<div class = "modal fade" id="myModal" role="dialog">
					
				</div>

				<div class="content tab-pane fade" id="assets" role="tabpanel" aria-labelledby="password-tab">
				<div class="container-fluid">
						<h4 class="page-title">Assets</h4>
						<div class="row">

								<div class="container">
						
									<table class="table">
									
										
										<thead>
											<tr>
												<th><h3>Items</h3></th>
											</tr>
										</thead>
										<tbody>
										<?php
										$user1 = $_SESSION['username'];
									    $sql1 = "SELECT `Items`,`Stats` FROM `".$user1." assets` ";
										//echo "<pre>Debug: $sql1</pre>\m";....for sql debugging
										      $result1 = mysqli_query($conn, $sql1);
											  if (mysqli_num_rows($result1) > 0) {
												// output data of each row
												while($row = mysqli_fetch_assoc($result1)) { ?>
											<tr>
												<td>
													<div class="user-info">
														<div class="user-info__img">
															<img src="../dash/assets/img/cabinet.jpeg" alt="User Img">
														</div>
														<div class="user-info__basic">
															<h5 class="mb-0"><?php echo $row["Items"];?></h5>
														</div>
													</div>
												</td>
												<td>
													<!--colour of button depends on if stats is granted or not in the Database-->
													<?php if($row["Stats"] == 'Granted'){ ?>
													    <span class="btn btn-success"><?php echo "Status: ".$row["Stats"];?></span>
													<?php } else { ?>
														<span class="btn btn-danger"><?php echo "Status: ".$row["Stats"];?></span>
													<?php } ?>
												</td>
												
												<?php

													
												}
											} else {
												?>
												<div class="user-info">
														<div class="user-info__img">
															<img src="../dash/assets/img/cabinet.jpeg" alt="User Img">
														</div>
														<div class="user-info__basic">
															<h5 class="mb-0">No Assets Selected</h5>
														</div>
													</div>
												</td>
												<?php
											}
										       ?>
											</tr>
										</tbody>
									</table>
								</div>
							</section>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<script>
	function myBtn(m,p) {
    document.getElementById("myModal").innerHTML = '<div class="modal-dialog"><div class="modal-content"><div class="row justify-content-center"><div class="login-wrap p-4 p-md-5"><img src='+m+' width="250" height="200" alt="Psychopomp" /><div><h2>'+ p +'</h2><form action=dash_worker.php method="POST">item: <input type="text" name="item_name" value = '+p+' readonly><br>Status: <input type = "text" name = "statss" value = "pending" readonly><br><input class="btn-primary" type="submit" name ="sub_mit"></form></div></div></div></div></div>';}
    </script>
	
</body>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>