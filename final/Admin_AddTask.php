<?php 
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['id'])) { 
include 'db_conn.php';

if(isset($_POST['submit'])){
    $taskdescription=$_POST['taskdescription'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $taskcomment=$_POST['taskcomment'];
    



    $sql="insert into `crud`(taskdescription,name,email,taskcomment)
    values('$taskdescription','$name','$email','$taskcomment')";

    $result=mysqli_query($conn,$sql);

    if($result){
        //echo "Data inserted successful";
        header('location:Admin_ManageTask.php');
    }else{
        die(mysqli_error($conn));
    }
}



?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Add Task</title>
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
					<a href="Admin_ToDoList.php">
						<i class='bx bx-task' ></i>
						<span class="link_name">Todo List</span>
					</a>
					<ul class="sub-menu blank">
						<li><a class="link_name" href="Admin_ToDoList.php">Todo List</a></li>
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
      <span class="text">Add Task</span>
    </div>
    <div class=home-body>

        <div class="wrap">
          <div class="card">
            <div class="container my-5">

              <form method="post">
                  <div class="form-group">
                      <label>Task Description</label>
                      <input type="text" class="form-control" placeholder="Enter task description" name="taskdescription" autocomplete="off">
                  </div>
                  <div class="form-group">
                      <label>Annotators Name</label>
                      <input type="text" class="form-control" placeholder="Enter annotators name" name="name" autocomplete="off">
                  </div>
                  <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" placeholder="Enter annotators email" name="email" autocomplete="off">
                  </div>
                  <div class="form-group">
                      <label>Task Comment</label>
                      <input type="text" class="form-control" placeholder="Enter task comment" name="taskcomment" autocomplete="off">
                  </div>
      
      
      
      
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </form>
      
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
