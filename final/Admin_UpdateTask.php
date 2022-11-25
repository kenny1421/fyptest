<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) { 
include 'db_conn.php';
$id=$_GET['updateid'];
$sql="Select * from `crud` where id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$taskdescription=$row['taskdescription'];
$name=$row['name'];
$email=$row['email'];
$taskcomment=$row['taskcomment'];


if(isset($_POST['submit'])){
    $taskdescription=$_POST['taskdescription'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $taskcomment=$_POST['taskcomment'];



    $sql="update `crud` set id=$id,taskdescription='$taskdescription',
    name='$name',email='$email',taskcomment='$taskcomment'where id=$id";

    $result=mysqli_query($conn,$sql);

    if($result){
        //echo "Data inserted successful";
        header('location: Admin_ManageTask.php');
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
    <title>Update Task</title>
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
      <span class="text">Update Task</span>
    </div>
    <div class=home-body>

        <div class="wrap">
          <div class="card">
            
          <div class="container my-5">

          <form method="post">
            <div class="mb-3">
                <label for="description" class="form-label">Task Description</label>
                <input type="text" class="form-control" placeholder="Enter task description" name="taskdescription" autocomplete="off"
                value=<?php echo $taskdescription;?>>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Annotators Name</label>
                <input type="text" class="form-control" placeholder="Enter annotators name" name="name" autocomplete="off" 
                value=<?php echo $name;?>>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Enter annotators email" name="email" autocomplete="off"
                value=<?php echo $email;?>>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Task Comment</label>
                <input type="text" class="form-control" placeholder="Enter task comment" name="taskcomment" autocomplete="off"
                value=<?php echo $taskcomment;?>>
            </div>
		  <br>



            <button type="submit" class="btn btn-primary" name="submit">Update</button>
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
