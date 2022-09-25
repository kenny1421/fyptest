<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id']))   ?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Admin Homepage - NeounAI</title>
    <link rel="icon" type="image/png" href="Images/NeuonAI_Logo.png"/>
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Boxiocns CDN Link -->
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
        <a href="Manager_Statistic.php">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Statictics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="Manager_Statistic.php">Statictics</a></li>
        </ul>
      </li>
      <li>
        <a href="Manager_AnnotateTool.php">
          <i class='bx bx-images'></i>
          <span class="link_name">Annotate Tool</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="Manager_AnnotateTool.php">Annotate Tool</a></li>
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
          <li><a href="#">Upload Task</a></li>
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
        <div class="profile_name">Admin</div>
        <div class="job">Logout</div>
      </div>
      <i class='bx bx-log-out' ></i>
    </div>
  </li>
</ul>
  </div>

<div class="main-content">
<header>
  <h2>
    <label for = "">
      <span class=" las la-bars"></span>
    </label>

      Dashboard
  </h2>

  <div class="search-wrapper">
    <span class="las la-search"></span>
    <input type="search" placeholder="Search here" />

  </div>
  <div class=" user-wrapper">
    
  </div>

</header>

<main>
<div class = "cards">
  <div class="card-single">
    <div>
      <h1>54</h1>
      <span>Annotators</span>
    </div>
    <div>
      <span class="las la-users"></span>
    </div>

  </div>

  <div class="card-single">
    <div>
      <h1>12</h1>
      <span>Manager</span>
    </div>
    <div>
      <span class="lab la-google-wallet"></span>
    </div>

  </div>

  <div class="card-single">
    <div>
      <h1>79</h1>
      <span>Projects</span>
    </div>
    <div>
      <span class="las la-clipboard-list"></span>
    </div>

  </div>

  <div class="card-single">
    <div>
      <h1>124</h1>
      <span>Upcoming</span>
    </div>
    <div>
      <span class="las la-shopping-bag"></span>
    </div>

  </div>


</div>

  <div class="recent-grid">
    <div class="projects">
      <div class="card">
      <div class="card-header">
        <h3>Recent Projects</h3>

        <button>See all <span class="las la-arrow-right"></span></button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table width="100%">
            <thead>
              <tr>
                <td>Project Title</td>
                <td>Department</td>
                <td>Status</td>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <span class="status purple"></span>
                    
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <span class="status pink"></span>
                    
                  </td>
                  
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <span class="status orange"></span>
                    
                  </td>
                </tr>
  
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <span class="status purple"></span>
                    
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <span class="status pink"></span>
                    
                  </td>
                  
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <span class="status orange"></span>
                    
                  </td>
                </tr>
  
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <span class="status purple"></span>
                    
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <span class="status pink"></span>
                    
                  </td>
                  
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <span class="status orange"></span>
                    
                  </td>
                </tr>
  
               
            </tbody>
  
          </table>
        </div>
      </div>
    </div>
  </div>

    <div class="customers">
      <div class="card">
        <div class="card-header">
          <h3>New Annotators</h3>
  
          <button>See all <span class="las la-arrow-right"></span></button>
        </div>
        <div class="card-body">
      

        <div class="customer">
          <div class="info">
          <img src="Images/ann1.jpg" width="40px" height="40px" alt="">
          <div>
              <h4>Mahmud</h4>
              <small>Annotators</small>
          </div>
        </div>
        <div>
          <span class="las la-user-circle"></span>
          <span class="las la-comment"></span>
          <span class="las la-phone"></span>
        </div>
      </div>

      <div class="customer">
        <div class="info">
        <img src="Images/ann2.jpg" width="40px" height="40px" alt="">
        <div>
            <h4>Vincent</h4>
            <small>Annotators</small>
        </div>
      </div>
      <div>
        <span class="las la-user-circle"></span>
        <span class="las la-comment"></span>
        <span class="las la-phone"></span>
      </div>
    </div>

    <div class="customer">
      <div class="info">
      <img src="Images/ann3.jpg" width="40px" height="40px" alt="">
      <div>
          <h4>Jaz</h4>
          <small>Annotators</small>
      </div>
    </div>

    
    <div>
      <span class="las la-user-circle"></span>
      <span class="las la-comment"></span>
      <span class="las la-phone"></span>
    </div>
  </div>

  <div class="customer">
    <div class="info">
    <img src="Images/ann4.jpg" width="40px" height="40px" alt="">
    <div>
        <h4>Nix</h4>
        <small>Annotators</small>
    </div>
  </div>

  
  <div>
    <span class="las la-user-circle"></span>
    <span class="las la-comment"></span>
    <span class="las la-phone"></span>
  </div>
</div>

<div class="customer">
  <div class="info">
  <img src="Images/ann5.jpg" width="40px" height="40px" alt="">
  <div>
      <h4>Ken</h4>
      <small>Annotators</small>
  </div>
</div>


<div>
  <span class="las la-user-circle"></span>
  <span class="las la-comment"></span>
  <span class="las la-phone"></span>
</div>
</div>
      
    </div>
  </div>
</div>
</main>




</div>

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