<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Create Account</title>
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
                <a href="CreateAccount.php">
                    <i class='bx bx-user-plus'></i>
                    <span class="link_name">Create Account</span>
                </a>
            
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="CreateAccount.php">Create Account</a></li>
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
            <span class="text">Create Account</span>
        </div>
    
        <div class=home-body>
            <div class="wrap">
                <div class="card">
                    <!--Content STARTS HERE-->
                    <div class ="container">
                        <form action="php/create.php" method="post">
                            <h4 class="display-4 text-center">Register</h4><hr><br>
        
                            <?php if (isset($_GET['error'])){ ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_GET['error']; ?>
                                </div>
                            <?php } ?>
				
			    <div class= "form-group">
                                <label for="NAME"  
		                class="form-label">Full Name</label>
		                <input type="text" 
                                class="form-control" 
                                name="NAME" 
                                id="NAME"
                                value="<?php if(isset($_GET['NAME']))
                                    echo $_GET['NAME'];?>">
                            </div>

                            <div class="form-group">
                                <label for="name"
                                class="form-label">Full Name</label>
                                <input type="text"
                                class="form-control"
                                name="name"
                                id="name"
                                value="<?php if(isset($_GET['name']))
                                echo $_GET['name'];?>">
                            </div>

                            <div class= "form-group">
                                <label for="username"
                                class="form-label">Username</label>
		                        <input type="text"
                                class="form-control"
                                name="username"
                                id="username"
                                value="<?php if(isset($_GET['username']))
                                echo $_GET['username'];?>">
		                    </div>
		  
                            <div class="form-group">
                                <label for="password" 
                                class="form-label">Password</label>
                                <input type="password" 
                                name="password" 
                                class="form-control" 
                                id="password"
                                value="<?php if(isset($_GET['password']))
                                    echo $_GET['password'];?>">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Select User Type:</label>
                            </div>
                
                            <select class="form-select mb-3"
                                name="role" 
                                aria-label="Default select example">
                                <option selected value="user">User</option>
                                <option value="manager">Manager</option>
                                <option value="admin">Admin</option>
                            </select>
                                <button type="create" name="create" class="btn btn-primary">create</button>
                        </form>
                    </div>
                    <!--Content ENDS HERE-->
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
</body>
</html>
<?php }else{
	header("Location: index.php");
} ?>
