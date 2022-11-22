<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Manage Account</title>
    <link rel="icon" type="image/png" href="Images/NeuonAI_Logo.png"/>
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Boxiocns CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/delete_account.js"></script>
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
					<a href="Admin_Task.php">
						<i class='bx bx-task' ></i>
						<span class="link_name">Task</span>
					</a>
					<ul class="sub-menu blank">
						<li><a class="link_name" href="Admin_Task.php">Task</a></li>
					</ul>
				</li>
      <li>
        <a href="Admin_AnnotateTool.php">
          <i class='bx bx-images'></i>
          <span class="link_name">Annotation Tool</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="Admin_AnnotateTool.php">Annotation Tool</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="Admin_ManageTask.php">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Manage Task</span>
          </a>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="Admin_ManageTask.php">Manage Task</a></li>
        </ul>
      </li>

      <li>
					<div class="iocn-link">
						<a href="../final/admin_upload/Admin_UploadTask.php">
							<i class='bx bx-upload'></i>
							<span class="link_name">Upload Task</span>
						</a>
							<i class='bx bxs-chevron-down arrow' ></i>
					</div>
					<ul class="sub-menu">
						<li><a class="link_name" href="../final/admin_upload/Admin_UploadTask.php">Upload Task</a></li>
						<li><a href="../final/admin_viewtask/Admin_ViewTask.php">View Task</a></li>
					</ul>
				</li>

      <li>
        <a href="Admin_CreateAccount.php">
          <i class='bx bx-user-plus'></i>
          <span class="link_name">Create Account</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="Admin_CreateAccount.php">Create Account</a></li>
        </ul>
      </li>
      <li>
        <a href="Admin_ManageAccount.php">
        <i class='bx bx-user-circle'></i>
          <span class="link_name">Manage Account</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="Admin_ManageAccount.php">Manage Account</a></li>
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
      <span class="text">Manage Account</span>
    </div>
    <div class=home-body>

        <div class="wrap">
          <div class="card">
            <div class = "container">
            
      
              <table class="table">
        <thead>
          <tr>
          <th scope="col">ID</th>
          <th scope="col">Annotators' Name</th>
            <th scope="col">Account's Username</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Operation</th>
          </tr>
        </thead>
        <tbody>
          <?php
      
          $sql="Select * from `users`";
          $result=mysqli_query($conn,$sql);
          if($result){
              while($row=mysqli_fetch_assoc($result)){
                  $id=$row['id'];
                  $username=$row['username'];
                  $NAME=$row['name'];
                  $email=$row['email'];
                  $role=$row['role'];
                  $status=$row['status'];
                  echo ' <tr>';
                  echo '<th scope="row">'.$id.'</th>';
                  echo'<td>'.$username.'</td>';
                  echo'<td>'.$NAME.'</td>';
                  echo'<td>'.$email.'</td>';
                  echo'<td>'.$role.'</td>';
                  echo'<td>'.$status.'</td>';
                  
                  
                 echo '<td>';
                  if($status=="Activate")
                  {
                  echo '<a href="AccountStatus_Deactivate.php?id='.$id.'" >
                  <button class="btn btn-primary">Deactivate</button>
                  </a>';

                  }else
                  {
                    echo '<a href="AccountStatus_Activate.php?id='.$id.'" >
                    <button class="btn btn-primary">Activate</button>
                    </a>';
                  }

                  echo '
                    <button type="button" class="btn btn-danger delete_btn" id='.$id.'>Delete</a></button>
                  </button>';
          
              echo '</td>';
                  
                echo '</tr>';
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