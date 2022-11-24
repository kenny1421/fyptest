<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Task</title>
    <link rel="icon" type="image/png" href="Images/NeuonAI_Logo.png"/>
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Boxiocns CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="sidebar close">
    		<div class="logo-details">
			<a href="home.php">
				<img src="Images/NeuonAI_Logo.png" height="75px" width="75px">
			</a>
      		<span class="logo_name">NeounAI</span>
    		</div>
    		<ul class="nav-links">
      		<li>
        		<a href="User_ToDoList.php">
          			<i class='bx bx-task' ></i>
          			<span class="link_name">To Do List</span>
        		</a>
        	<ul class="sub-menu blank">
          	<li><a class="link_name" href="User_ToDoList.php">To Do List</a></li>
        	</ul>
      	</li>
      	<li>
        	<a href="User_AnnotateTool.php">
          		<i class='bx bx-images'></i>
          		<span class="link_name">Annotation Tool</span>
        	</a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="User_AnnotateTool.php">Annotation Tool</a></li>
        </ul>
      </li>

	  <li>
					<div class="iocn-link">
						<a href="../final/user_upload/User_UploadTask.php">
							<i class='bx bx-upload'></i>
							<span class="link_name">Upload Task</span>
						</a>
							<i class='bx bxs-chevron-down arrow' ></i>
					</div>
					<ul class="sub-menu">
						<li><a class="link_name" href="../final/user_upload/User_UploadTask.php">Upload Task</a></li>
						<li><a href="../final/user_viewtask/User_ViewTask.php">View Task</a></li>
					</ul>
				</li>
      <li>
    <div class="profile-details">
    <div class="profile-content">
        					<!--<img src="image/profile.jpg" alt="profileImg">-->
      					</div>
      					<div class="name-job">
        					<div class="profile_name"><?=$_SESSION['name']?></div>
        					<div class="job"><a href="logout.php">Logout</a></div>
      					</div>
      					<a href="logout.php"><i class='bx bx-log-out' ></i></a>
    				</div>
  				</li>
</ul>
  </div>
  <section class="home-section">
    			<div class="home-content">
      				<i class='bx bx-menu' ></i>
      				<span class="text">Task</span>
    			</div>

    			<div class=home-body>
        			<div class="wrap">
          				<div class="card">
						  <div class = "container">

							<table class="table">
								<thead>
									<tr>
										<th scope="col">Task NO</th>
										<th scope="col">Task Description</th>
										<th scope="col">Annotators Name</th>
										<th scope="col">Annotators Email</th>
										<th scope="col">Task Comment</th>
									</tr>
								</thead>
								<tbody>
									<?php

									$sql="Select * from `crud`";
									$result=mysqli_query($conn,$sql);
									if($result){
									while($row=mysqli_fetch_assoc($result)){
										$id=$row['id'];
										$taskdescription=$row['taskdescription'];
										$name=$row['name'];
										$email=$row['email'];
										$taskcomment=$row['taskcomment'];
										echo ' <tr>
										<th scope="row">'.$id.'</th>
										<td>'.$taskdescription.'</td>
										<td>'.$name.'</td>
										<td>'.$email.'</td>
										<td>'.$taskcomment.'</td>
										<td> 

									</td>
										
									</tr>';
									}
									}

									?>


								</tbody>
							</table>
						</div>
        			</div>
    			</div>
  			</section>

  <script src="script_upload.js"></script>

  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>
</body>
</html>
<?php }else{
	header("Location: index.php");
} ?>