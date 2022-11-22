<?php 
   session_start();
   include "../db_conn.php";
   include 'filesLogic.php';
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Upload Task</title>
    <link rel="icon" type="image/png" href="Images/NeuonAI_Logo.png"/>
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Boxiocns CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
    <a href="../home.php">
				<img src="Images/NeuonAI_Logo.png" height="75px" width="75px">
			</a>
      <span class="logo_name">NeounAI</span>
    </div>
    <ul class="nav-links">
    <li>
        		<a href="../User_Task.php">
          			<i class='bx bx-task' ></i>
          			<span class="link_name">Task</span>
        		</a>
        	<ul class="sub-menu blank">
          	<li><a class="link_name" href="../User_Task.php">Task</a></li>
        	</ul>
      	</li>
      <li>
        <a href="../User_AnnotateTool.php">
          <i class='bx bx-images'></i>
          <span class="link_name">Annotate Tool</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../User_AnnotateTool.php">Annotate Tool</a></li>
        </ul>
      </li>

      <li>
					<div class="iocn-link">
						<a href="../user_upload/User_UploadTask.php">
							<i class='bx bx-upload'></i>
							<span class="link_name">Upload Task</span>
						</a>
							<i class='bx bxs-chevron-down arrow' ></i>
					</div>
					<ul class="sub-menu">
						<li><a class="link_name" href="../user_upload/User_UploadTask.php">Upload Task</a></li>
						<li><a href="../user_viewtask/User_ViewTask.php">View Task</a></li>
					</ul>
				</li>

      <li>
    <div class="profile-details">
    <div class="profile-content">
        					<!--<img src="image/profile.jpg" alt="profileImg">-->
      					</div>
      					<div class="name-job">
        					<div class="profile_name"><?=$_SESSION['name']?></div>
        					<div class="job"><a href="../logout.php">Logout</a></div>
      					</div>
      					<a href="../logout.php"><i class='bx bx-log-out' ></i></a>
    				</div>
  				</li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Upload Task</span>
    </div>
    <div class=home-body>

        <div class="wrap">
          <div class="card">
          <div class="container">
      <div class="row">
        <form action="User_UploadTask.php" method="post" enctype="multipart/form-data" >
          
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save">upload</button>
        </form>
      </div>
        <div class ="row">
                <table>
                    <thead>
                        <th>ID</th>
                        <th>FileName</th>
                        <th>Size (in mb)</th>
                        <th>Downloads</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php foreach($files as $file): ?>
                        
                        <tr>
                            <td><?php echo $file['id'];?></td>
                            <td><?php echo $file['name'];?></td>
                            <td><?php echo $file['size']/1000 . "KB";?></td>
                            <td><?php echo $file['downloads'];?></td>
                            <td>
                                <a href="User_UploadTask.php?file_id=<?php echo
                                    $file['id']?>">Download</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
            </table>
        </div>
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
	header("Location: ../index.php");
} ?>