<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="icon" type="image/png" href="Images/NeuonAI_Logo.png"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<script src="jscript/annotorious.min.js"></script>
</head>
<body>
    <?php if ($_SESSION['role'] == 'admin') {?>
      	<!-- For Admin -->
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
							<h1>Statistics</h1>
							<hr>
							<p>Content</p>
							<p>Paragraph</p>
							<input type="button" value="button">
          				</div>

						<div class="card"> 
							<h1>User</h1>
							<hr>
							<p>Content</p>
							<p>Paragraph</p>
							<input type="button" value="button">
						</div>
        			</div>
    			</div>
  			</section>
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

      	<?php }else if ($_SESSION['role'] == 'manager') { ?>
      		<!-- FORE MANAGER -->
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
          				<li><a class="link_name" href="Manager_Statictis.php">Statictics</a></li>
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
							<h1>Statistics</h1>
							<hr>
							<p>Content</p>
							<p>Paragraph</p>
							<input type="button" value="button">
          				</div>

						<div class="card"> 
							<h1>User</h1>
							<hr>
							<p>Content</p>
							<p>Paragraph</p>
							<input type="button" value="button">
						</div>
        			</div>
    			</div>
  			</section>
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

      	<?php } else { ?>
      		<!-- FORE USERS -->
      		<div class="sidebar close">
    <div class="logo-details">
      <img src="Images/NeuonAI_Logo.png" height="75px" width="75px">
      <span class="logo_name">NeounAI</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-task' ></i>
          <span class="link_name">Task</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Task</a></li>
        </ul>
      </li>
      <li>
        <a href="User_AnnotateTool.php">
          <i class='bx bx-images'></i>
          <span class="link_name">Annotate Tool</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="User_AnnotateTool.php">Annotate Tool</a></li>
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
            <h1>Task</h1>
            <hr>
            <p>  <div id="content">
    <img id="hallstatt" src="hallstat.jpg">
  </div>
  <script>
    (function() {
      var anno = Annotorious.init({
        image: 'hallstatt'
      });

      anno.loadAnnotations('annotations.w3c.json');
    })()
  </script>
  <script type="text/javascript" src="annotorious.min.js"></script></p>
            <p></p>
          </div>

      
    </div>
  </section>
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
      	<?php } ?>
      </div>
</body>
</html>
<?php }else{
	header("Location: index.php");
} ?>