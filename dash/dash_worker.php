<?php 
	//connect database 
	require 'db_connect.php';
	mysqli_select_db($conn,$dbname);

	session_start();

	$sql = "SELECT * FROM `office items` ";
	$result = mysqli_query($conn,$sql);
	$result = mysqli_fetch_all($result, MYSQLI_ASSOC);

	//submitting the requests to the database
	if (isset($_POST['submit'])){

		//  $sql = "INSERT INTO requests (username,item,image,quantity) VALUES ($_SESSION['username'], 5, 70)";
		$sql = "INSERT INTO requests (username,item,image,time,quantity) VALUES ('".$_SESSION['username']."', '".$_POST['n']."', '".$_POST['img']."', '".$_POST['tn']."', '".$_POST['quantity']."')";
		mysqli_query($conn,$sql);
	};
		
	
	

	mysqli_close($conn);
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
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="assets/img/person.png" alt="user-img" width="36" class="img-circle"><span ><?php echo $_SESSION['username'];?></span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="assets/img/person.png"></div>
										<div class="u-text">
											<h2><?php $row['username']?></h2>
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
								<h2>
								<?php echo $_SESSION['username'];?>
								</h2>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								
							</div>
						</div>
					</div>
					<div class="profile-tab-nav border-right">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#inventory" role="tab" aria-controls="account" aria-selected="true">
							<i class="la la-home text-center mr-1"></i> 
							Inventory
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#assets" role="tab" aria-controls="password" aria-selected="false">
							<i class="la la-database text-center mr-1"></i> 
							Assets
						</a>
						
						<a class="nav-link" id="application-tab" data-toggle="pill" href="#chat" role="tab" aria-controls="application" aria-selected="false">
							<i class="la la-envelope text-center mr-1"></i> 
							Chats
						</a>

						<!-- logging the user out -->
						<li class="nav-item update-pro">
							<form action="../logout.php" method= "POST">
								<button  type = "submit" name= "logout" > 
									<i class="la la-hand-pointer-o"></i>
									<p>Log Out</p>
								</button>
							</form>
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
							
							<!-- displaying the items from the database -->
								<?php
									for($i=0; $i<count($result); $i++){
										$name = $result[$i]['Item'];
										echo '<div class="card">
										<div class="card-header">
												<img id="img6" src="'.$result[$i]['img'].'" width="250" height="200" alt="Psychopomp" />
												<a class="card-description" href="https" id="btn" data-toggle="modal" data-target="#myModal'.$i.'">
													<h2 id="lp">'.$result[$i]['Item'].'</h2> 
												<p style ="font-size: 20px";>Number of item in stock: <span style=color:blue;> '.$result[$i]['Quantity'].'</span></p>
											</a>
										</div>
									</div>
									<div class = "modal fade" id="myModal'.$i.'" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="row justify-content-center">
													<div class="login-wrap p-4 p-md-5">
														<img src='.$result[$i]['img'].' width="250" height="200" alt="Psychopomp" />
														<div>
														   <h2>'.$result[$i]['Item'].'</h2>
															
															<form action="dash_worker.php" method="POST">
															<input type="hidden" name="n" value='.$result[$i]['Item'].'">
															<input type="hidden" name="tn" value='.date(" h:i:sa").'>
															<input type="hidden" name="img" value='.$result[$i]['img'].'">
																Quantity: <input type="text" name="quantity">
															 <input class="btn-primary" name ="submit" type="submit">
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									';
									}

									
							
								?>
								
							</div>
						</div>
					</div>
				</div>

				<!-- Modal Assets -->

				<div class="content tab-pane fade" id="assets" role="tabpanel" aria-labelledby="password-tab">
				<div class="container-fluid">
						<h4 class="page-title">Assets</h4>
						<div class="row">

								<div class="container">
						
									<table class="table">
										<thead>
											<tr>
												<th>Items</th>
												<th>Status</th>
												<th>Check Time</th>
												<th>Stock Id</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="user-info">
														<div class="user-info__img">
															<img src="../dash/assets/img/cabinet.jpeg" alt="User Img">
														</div>
														<div class="user-info__basic">
															<h5 class="mb-0">Cabinet Item</h5>
														</div>
													</div>
												</td>
												<td>
													<span class="btn btn-success">Been used</span>
												</td>
												<td>
													<h6 class="mb-0">06:00 PM</h6>
													<small>php date</small>
												</td>
												<td>
													<h6 class="mb-0">#91 9876543215</h6>
													<a href="#!"><small>Contact</small></a>
												</td>
												
												<td>
													<div class="dropdown open">
														<a href="#!" class="px-2" id="triggerId1" data-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false">
																	<i class="fa fa-ellipsis-v"></i>
														</a>
														<div class="dropdown-menu" aria-labelledby="triggerId1">
															<a class="dropdown-item" href="#"><i class="fa fa-pencil mr-1"></i> Edit</a>
															<a class="dropdown-item text-danger" href="#"><i class="fa fa-trash mr-1"></i> Delete</a>
														</div>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="user-info">
														<div class="user-info__img">
															<img src="../dash/assets/img/frige.jpeg" alt="User Img">
														</div>
														<div class="user-info__basic">
															<h5 class="mb-0">Frige Item</h5>
														</div>
													</div>
												</td>
												<td>
													<span class="btn btn-danger">Not Used</span>
												</td>
												<td>
													<h6 class="mb-0">06:00 PM</h6>
													<small>2 Feb 2021</small>
												</td>
												<td>
													<h6 class="mb-0">#91 9876543215</h6>
													<a href="#!"><small>Contact</small></a>
												</td>
												
												<td>
													<div class="dropdown open">
														<a href="#!" class="px-2" id="triggerId1" data-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false">
																	<i class="fa fa-ellipsis-v"></i>
														</a>
														<div class="dropdown-menu" aria-labelledby="triggerId1">
															<a class="dropdown-item" href="#"><i class="fa fa-pencil mr-1"></i> Edit</a>
															<a class="dropdown-item text-danger" href="#"><i class="fa fa-trash mr-1"></i> Delete</a>
														</div>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="user-info">
														<div class="user-info__img">
															<img src="../dash/assets/img/ac.jpeg" alt="User Img">
														</div>
														<div class="user-info__basic">
															<h5 class="mb-0">Ac Item</h5>
															
														</div>
													</div>
												</td>
												<td>
													<span class="btn btn-success">Been Used</span>
												</td>
												<td>
													<h6 class="mb-0">06:00 PM</h6>
													<small>30 april 2021</small>
												</td>
												<td>
													<h6 class="mb-0">#91 9876543215</h6>
													<a href="#!"><small>Contact</small></a>
												</td>
												<td>
													<div class="dropdown open">
														<a href="#!" class="px-2" id="triggerId1" data-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false">
																	<i class="fa fa-ellipsis-v"></i>
														</a>
														<div class="dropdown-menu" aria-labelledby="triggerId1">
															<a class="dropdown-item" href="#"><i class="fa fa-pencil mr-1"></i> Edit</a>
															<a class="dropdown-item text-danger" href="#"><i class="fa fa-trash mr-1"></i> Delete</a>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</section>

							<!-- php script -->
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	
</body>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>