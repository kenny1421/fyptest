<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id']))   ?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Upload Task</title>
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
      <img src="Images/NeuonAI_Logo.png" height="75px" width="75px">
      <span class="logo_name">NeounAI</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="Admin_Statistic.php">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Statictics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="Admin_Statistic.php">Statictics</a></li>
        </ul>
      </li>
      <li>
        <a href="Admin_AnnotateTool.php">
          <i class='bx bx-images'></i>
          <span class="link_name">Annotate Tool</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="Admin_AnnotateTool.php">Annotate Tool</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Manage Task</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Manage Task</a></li>
          <li><a href="#">Assign Task</a></li>
          <li><a href="Admin_UploadTask.php">Upload Task</a></li>
          <li><a href="#">Download Task</a></li>
          <li><a href="#">Delete Task</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user-plus'></i>
          <span class="link_name">Create Account</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Create Account</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-block' ></i>
          <span class="link_name">Disable Account</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Disable Account</a></li>
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
      <span class="text">Web Image Annotation Tool</span>
    </div>
    <div class=home-body>

        <div class="wrap">
          <div class="card">
            <h1>Upload File</h1>

              <!--upload file-->
              <form action="#">
                <input type="file" class="file-input" name="file" hidden>
                <img src="Images/cloud.jpg.png">
                <p>Browse File to Upload</p>
              </form>

              <section class="progress-area">
                <!-- <li class="row">
                  <img src="document.png">
                  <div class="content">
                    <div class="details">
                      <span class="name">image_01.png * Uploading</span>
                      <span class="percent">50%</span>
                    </div>
                    <div class="progress-bar">
                      <div class="progress"></div>
                    </div>
                  </div>
                </li> -->
              </section>

              <section class="uploaded-area">
                <!-- <li class="row">
                  <div class="content">
                    <img src="document.png">
                    <div class="details">
                      <span class="name">image_02.png * Uploaded</span>
                      <span class="size">70 KB</span> <img class="tick" src="tick.png">
                    </div>
                  </div>
                </li>

                <li class="row">
                  <div class="content">
                    <img src="document.png">
                    <div class="details">
                      <span class="name">image_02.png * Uploaded</span>
                      <span class="size">70 KB</span> <img class="tick" src="tick.png">
                    </div>
                  </div>
                </li>

                <li class="row">
                  <div class="content">
                    <img src="document.png">
                    <div class="details">
                      <span class="name">image_02.png * Uploaded</span>
                      <span class="size">70 KB</span> <img class="tick" src="tick.png">
                    </div>
                  </div>
                </li> -->
              </section>

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