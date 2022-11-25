<?php 
   session_start();
   include "../db_conn.php";
   include 'filesLogic.php';
    require_once '../vendor/autoload.php';


    use MicrosoftAzure\Storage\Blob\BlobRestProxy;
    use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
    use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;
    use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
    use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;
$connectionString = "DefaultEndpointsProtocol=https;AccountName='fypblobstorage1';AccountKey='AjZJkdXUn30JxqF9/3cevJ1ucreLhgxXflkk/dQSB4ekJ8mEBATRoPRkpGiGDkM2UoLwyE9bHmOe+AStYE5M6A=='";

$containerName="testingupload2";
// Create blob client.
$blobClient = BlobRestProxy::createBlobService($connectionString);
$listBlobsOptions = new ListBlobsOptions();
    //$listBlobsOptions->setPrefix("Pass Task 1.1.pdf");
$blobList = $blobClient->listBlobs($containerName, $listBlobsOptions);

//fpassthru($blob->getContentStream());   


   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Upload Task</title>
    <link rel="icon" type="image/png" href="../Images/NeuonAI_Logo.png"/>
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
				<img src="../Images/NeuonAI_Logo.png" height="75px" width="75px">
			</a>
      <span class="logo_name">NeounAI</span>
    </div>
    <ul class="nav-links">
    <li>
					<a href="../Admin_ToDoList.php">
						<i class='bx bx-task' ></i>
						<span class="link_name">Todo List</span>
					</a>
					<ul class="sub-menu blank">
						<li><a class="link_name" href="../Admin_ToDoList.php">Todo List</a></li>
					</ul>
				</li>
      <li>
        <a href="../Admin_AnnotateTool.php">
          <i class='bx bx-images'></i>
          <span class="link_name">Annotation Tool</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../Admin_AnnotateTool.php">Annotation Tool</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="../Admin_ManageTask.php">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Manage Task</span>
          </a>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="../Admin_ManageTask.php">Manage Task</a></li>
        </ul>
      </li>

      <li>
				<div class="iocn-link">
					<a href="Admin_UploadTask.php">
						<i class='bx bx-upload'></i>
							<span class="link_name">Upload Task</span>
						</a>
					    	<i class='bx bxs-chevron-down arrow' ></i>
					</div>
					<ul class="sub-menu">
						<li><a class="link_name" href="Admin_UploadTask.php">Upload Task</a></li>
						<li><a href="../admin_viewtask/Admin_ViewTask.php">View Task</a></li>
					</ul>
				</li>

      <li>
        <a href="../Admin_CreateAccount.php">
          <i class='bx bx-user-plus'></i>
          <span class="link_name">Create Account</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../Admin_CreateAccount.php">Create Account</a></li>
        </ul>
      </li>
      <li>
        <a href="../Admin_ManageAccount.php">
                    <i class='bx bx-user-circle'></i>
                    <span class="link_name">Manage Account</span>
                </a>
                
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../Admin_ManageAccount.php">Manage Account</a></li>
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
      <div class="row1">
        <form action="Admin_UploadTask.php" class="form" method="post" enctype="multipart/form-data" >
          
	<br>
          <label for="form" class="form-label">Upload file here</label>
          <input type="file" class ="form-control" name="myfile"> <br>
	<br>
          <button class="btn btn-primary" type="submit" name="save">Upload</button>

        </form>
      </div>
	<br>
        <div class ="row">
                <table class="table">
                    <thead>
                        <th scope="col">ID</th>
                        <th scope="col">FileName</th>
                        <th scope="col">Action</th>
                        
                    </thead>
                    <tbody>
                        <?php
                            $count = 1;
                           foreach ($blobList->getBlobs() as $blob)
                            { ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $blob->getName();?></td>
                                <td>
                                    <a href=" Admin_UploadTask.php?file_id=<?php echo
                                    $blob->getName()?>"><button class="btn btn-primary">Download</button></a>
                                
                                
                                    <a href=" Admin_UploadTask.php?delete_id=<?php echo
                                    $blob->getName()?>"><button class="btn btn-danger delete_btn">Delete</button></a>
                                </td>
                            </tr>
                        <?php
                               $count++;
                                //echo $blob->getName().": ".$blob->getUrl()."<br />";
                            }
       
       
                        ?>
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
