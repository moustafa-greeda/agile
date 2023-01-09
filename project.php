<?php 

include 'config.php';

error_reporting(0);

if(!isset($_SESSION))
	session_start();

$id_user = $_SESSION['id_user'];

if (isset($_POST['submit'])) {
	$project_name = $_POST['project_name'];
  $description  = $_POST['description'];

	if ($project_name) {
		$sql = "SELECT * FROM project WHERE name_of_project='$project_name'";
		$result = mysqli_query($conn, $sql);

		if (!$result->num_rows > 0) {
            $sql = "INSERT INTO  project ( `name_of_project` , `description` ,`id_user`) 
                    VALUES ('$project_name' , '$description' ,$id_user)";
			$result = mysqli_query($conn, $sql);

			if ($result) {

				$sql = "SELECT id_user FROM user WHERE email='$email'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				$_SESSION['id_user'] = $row['id_user'];
				$_SESSION['sprint'] = true;

				$project_name = "";
        $description  = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! project Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('project Not Matched.')</script>";
	}
}

$tableName="project";
$columns= ['id_project','name_of_project' , 'description'];
$fetchData = fetch_data($conn, $tableName, $columns,$id_user);

function fetch_data($conn, $tableName, $columns,$userid){
 if(empty($conn)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{
  $columnName = implode(", ", $columns);
  $query = "SELECT ".$columnName." FROM $tableName WHERE id_user=$userid";
  $result = $conn->query($query);
  if($result== true){ 
  if ($result->num_rows > 0) {
      $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
      $msg= $row;
  } else {
      $msg= "No Data Found"; 
  }
  }else{
    $msg= mysqli_error($conn);
  }
}
return $msg;
}
// delete project
if(isset($_GET["delete_project"])){
  include('delete_project.php');
}
?>
<!-- ********************************* start html ************************************** -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <!-- cdn font owsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
<body>
<!-- ********************************* start header ************************************** -->
<nav id="nav">
      <div class="container">
        <h2>Logo</h2>
        <ul>
            <li><a href="welcome.php">Home</a></li>
            <li><a href="tasks_assign.php">tasks asign</a></li>
            <li><a href="project.php">project</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="logout.php">Log out</a></li>
        </ul>
      </div>
</nav>
<!-- ********************************* start aside ************************************** -->
<section class="parent">
<aside>
<form action="" method="post">
  <label for="">project name</label>
    <input type="text" name="project_name" value="<?php echo  $project_name?>" placeholder="project name">
  <label for="">project discription</label>
    <input type="text" name="description" value="<?php echo  $description?>" placeholder="description ">
    <input type="submit" name="submit" value="creat project">
</form>
</aside>
<!-- ********************************* start table ************************************** -->
<section class="table-project">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive"> 
      <table>
       <thead><tr><th>N.P</th>
         <th>name of project</th>
         <th>description</th>
         <th>sprints</th>
         <!-- <th>Delete</th> -->
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
        $query = "SELECT * FROM sprint WHERE id_project=".$data['id_project']."";
        $result = $conn->query($query);
          if ($result->num_rows > 0) {
            $sprints= mysqli_fetch_all($result, MYSQLI_ASSOC);
            $sprintsdisplay = "";
            $userstoriesdisplay = "";
            $tasksdisplay = "";
            foreach($sprints as $sprint){
              $sprintsdisplay .= "<il><a href='sprint.php?id=".$sprint['id_sprint']."' data-id='".$sprint['id_sprint']."'>".$sprint['name_sprint']."</a></il><br>";

              $query = "SELECT * FROM user_story WHERE id_sprint=".$sprint['id_sprint']."";
              $result = $conn->query($query);
              if ($result->num_rows > 0) {
                $userstories = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach($userstories as $userstory){
                  $userstoriesdisplay .= "<a href='user_story.php?id=".$userstory['id_user_stories']."' data-id='".$userstory['id_user_stories']."'>".$userstory['name_user_story']."</a><br>";
                
                  $query = "SELECT * FROM tasks WHERE id_user_story=".$userstory['id_user_stories']."";
                  $result = $conn->query($query);
                  if ($result->num_rows > 0) {
                    $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach($tasks as $task){
                      $tasksdisplay .= "<a href='tasks.php?id=".$task['id_tasks']."' data-id='".$task['id_tasks']."'>".$task['name_task']."</a><br>";
                    }
                  }
                  $tasksdisplay .= "<hr>";
                }
              }
              $userstoriesdisplay .= "<hr>";
            }
          } else {
              $msg= "No Data Found"; 
          }
    ?>
      <tr>
      <td><?php echo $sn;  ?></td>
      <td><?php echo $data['name_of_project']??''; ?></td>
      <td><?php echo $data['description']??''; ?></td>
      <td><?php $x='sprint.php?id='.$data['id_project'];  echo "<a href =".$x."> sprints</a>"; ?></td>
      <!-- <td><?php $x='project.php?delete_project='.$data['id_project'];  echo "<a href =".$x."> <i class='fa-solid fa-trash'></i></a>"; ?></td> -->
    </tr>
     <?php $sprintsdisplay=""; $userstoriesdisplay=""; $tasksdisplay =""; $sn++;}}else{ ?>
      <tr>
        <td colspan="15">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php } ?>
    </tbody>
     </table>
   </div>
</section>
</section>
<!-- ********************************* start about ************************************** -->
<section class="parent-about">
  <div class="my-header">
    <h1>agile</h1>
    <p>what meaning agile?</p>
  </div>
<div class="about">
  <div class="img-about">
    <img src="imags/Agile-Company.jpeg" alt="img about">
  </div>
  <div class="content-about">
    <p>Agile is the ability to create and respond to change. It is a way of dealing with,
       and ultimately succeeding in,an uncertain and turbulent environment.</p>
    <p>Agile is a mindset informed by the Agile Manifesto’s values and principles. 
      Those values and principles provide guidance on how to create and respond to change and how to deal with uncertainty.</p>
      <a href="welcome.php">read more</a>
  </div>
     </div>
</section>
<!-- ********************************* start footer ************************************** -->
<footer>
  <h3>all copy right &copy; reserved</h3>
</footer>
</body>
</html>
<!--********************************* php delete project  *******************************-->
