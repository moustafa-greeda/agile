<?php 
include 'config.php';
error_reporting(0);

session_start();

$id_project = $_GET['id'];
$id_user = $_SESSION['id_user'];

    if (isset($_POST['submit'])) {

        $name_sprint  = $_POST['name_sprint'];
        $start_date   = $_POST['start_date'];
        $end_date     = $_POST['end_date'];
        if ( $name_sprint) {
            $sql = "SELECT *  sprint WHERE name_sprint='$name_sprint'";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO `sprint` ( `start_date`, `end_date`, `name_sprint`, `id_project`) 
                VALUES ('$start_date', '$end_date', '$name_sprint', $id_project)";
                echo "<script>alert('Woops! .$sql.')</script>";
                $result = mysqli_query($conn, $sql);
                
                if ($result) {
                    $sql = "SELECT id_project FROM project WHERE id_project='$project_name'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);

                    $_SESON['id_user'] = $row['id_user'];
                    $_SESSIOSIN['user_story'] = true;

                    $name_sprint = "";
                    $start_date  = "";
                    $end_date    = "";

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

    // 

    $db= $conn;
$tableName="sprint";
$columns= ['id_sprint','name_sprint' , 'start_date' , 'end_date'];
$fetchData = fetch_data($db, $tableName, $columns,$id_project);

function fetch_data($db, $tableName, $columns,$id_project){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{
$columnName = implode(", ", $columns);
$query = "SELECT $columnName FROM $tableName WHERE id_project= $id_project";
$result = $db->query($query);

if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found"; 
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}
?>
<!-- *********** start html ************** -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sprint</title>
    <link rel="stylesheet" href="style.css">
    <style>
      label{
        display: flex;
        align-items: flex-start;
        color: #053978;
        font-size: 20px;
        padding-top: 20px;
        padding-left:10px ;
        
}
      input[type="submit"]{padding-top: 20px;
    
    }
      /* start */
* {
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

body {
    font-family: "pt serif", times new roman, Times, serif;
    height: 500px;
}

:root {
    --main-color: rgba(0, 103, 181, 1);
    --main-transition: 0.33s all ease-out;
    --main-padding: 60px 0;
    --main-margin: 60px 0;
}

.container {
    margin: 0 auto;
    padding: 0 15px;
    width: 100%;
}
/* Start Spcial Heading */
.spcial-heading{
    margin: 0;
    padding: 20px 0 0 0;
    font-size: 80px;
    text-align: center;
    font-weight: bolder;
    letter-spacing: -5px;
    color: #EBECED;
}
.spcial-heading + p{
    color: #777;
    text-align: center;
    font-size: 19px;
    transform: translateY(-40px);
    -webkit-transform: translateY(-40px);
    -moz-transform: translateY(-40px);
    -ms-transform: translateY(-40px);
    -o-transform: translateY(-40px);
}
/*********** End Spcial Heading ***********/
/*********** start navbar *************/
nav {
    background-color: #0c2462;
}

nav .container {
    display: flex;
    align-items: center;
}

nav h2 {
    flex: 1;
    color: white;
    font-size: 35px;
}

nav ul {
    display: flex;
    justify-content: space-between;
    list-style: none;
}

nav ul li a {
    text-decoration: none;
    color: white;
    font-size: 20px;
    padding: 20px;
    border-radius: 10px;
    transition: var(--main-transition);
}

nav ul li a:hover {
    background-color: var(--main-color);
}
/********** end navbar *************/
/* ********** start header  **********/
header {
    min-height: 90vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)), url("imags/A11y-in-agile-team-practices-700x300.png" );
    background-size: 100% 100%;
}

header .container .content {
    text-align: center;
    color: white;
}

header .container .content h1 {
    margin: 0;
}

header .container .content button {
    outline: none;
    border: 1px solid;
    background-color: #d35400;
    color: white;
    border-radius: 5px;
    padding: 15px 50px;
    cursor: pointer;
    font-size: 22px;
    transition: var(--main-transition);
}

header .container .content button:hover {
    font-weight: bold;
    background-color: transparent;
    color: white;
}
/********** start about  **********/
.about .container .agilee {
    display: flex;
    gap: 50px;
    flex-wrap: wrap;
}

.about .container .agilee .image {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.about .container .agilee .image img {
    width: 500px;
    margin-bottom: auto;
}

.about .container .agilee .info {
    flex: 1;
    color: #253858;
}

.about .container .agilee .info h2 {
    font-size: 50px;
    color: #253858;
}

.about .container .agilee .info p {
    font-size: 20px;
    line-height: 1.5;
    min-width: 500px;
    color: #253858;
}
para{
    font-size:10px;
}

/********** start  footer ***********/
footer{
    padding: 5px;
    text-align: center;
    background-color: #0C2461;
  }
footer h3{
    color: #fff;
    font-size: 24px;
  }
/********** start  media query ***********/
@media (max-width: 767px) {
    .container {
        width: 100%;
        padding: 0 15px;
    }
    .about .container .agilee .image {
        display: none;
    }
}

@media (min-width: 768px) {
    .container {
        width: 750px;
    }
}

@media (max-width: 991px) {
    .about .container .agilee .image {
        flex-direction: row;
    }
}

@media (min-width: 992px) {
    .container {
        width: 970px;
    }
}

@media (min-width: 1200px) {
    .container {
        width: 1170px;
    }
}
    </style>
</head>
<body>
<!-- *********** start header ************** -->     
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
<div class="titel">
  <!-- <h2>page of create sprint</h2> -->
</div>
<!-- *********** start aside ************** -->
<section class="parent">
<aside>
    <form action="" method="POST">
        <input type="text" name="name_sprint" value="<?php echo  $name_sprint?>" placeholder=" Enter name of sprint" id="sprint">
      <label for="start">Start Date :</label>
        <input type="date" name="start_date" value="<?php echo  $start_date?>" placeholder="start date" id="start">
      <label for="end">End Date :</label>
        <input type="date" name="end_date" value="<?php echo  $end_date?>" placeholder="end date" id="end">
        <br>
        <input type="submit" name="submit" value="creat sprint">
    </form>
</aside>
<!-- ********** start table ************** -->
<section class="table-project">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive"> 
      <table>
       <thead><tr><th>N.s</th>
         <th>name of sprint</th>
         <th>start date</th>
         <th>end date</th>
         <th>veiw user story</th>
    </thead> 
    <tbody>
    <?php
      $userstoriesdisplay = "";
      
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
        $query = "SELECT * FROM user_story WHERE id_sprint=".$data['id_sprint']."";
              $result = $conn->query($query);
              if ($result->num_rows > 0) {
                $userstories = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach($userstories as $userstory){
                  $userstoriesdisplay .= "<a href='user_story.php?id=".$userstory['id_user_stories']."' data-id='".$userstory['id_user_stories']."'>".$userstory['name_user_story']."</a><br>";
                
                  $query = "SELECT id_tasks,name_task FROM tasks WHERE id_user_story=".$userstory['id_user_stories']."";
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
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['name_sprint'] ?></td>
      <td><?php echo $data['start_date'] ?></td>
      <td><?php echo $data['end_date'] ?></td>
      <td>
          <?php $x='user_story.php?id='.$data['id_sprint'];  echo "<a href =".$x."> show user stories</a>"; ?>
      </td>

     </tr>
     <?php $sn++;}}else{ ?>
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
<!-- ************ start about ************ -->
</section>
<section class="parent-about">
  <div class="my-header">
    <h1>About sprints</h1>
    <p id="para" >what is the meaning of sprints?</p>
  </div>
<div class="about">
  <div class="img-about">
    <img src="imags/sprints.webp" alt="img about">
  </div>
  <div class="content-about">
    <p>In Agile product development, a sprint is a set period of time during which specific work has to be completed and made ready for review.</p>
<p>Each sprint begins with a planning meeting. During the meeting, the product owner (the person requesting the work) and the development team agree upon exactly what work will be accomplished during the sprint. The development team has the final say when it comes to determining how much work can realistically be accomplished during the sprint, and the product owner has the final say on what criteria need to be met for the work to be approved and accepted.
The duration of a sprint is determined by the scrum master, the team's facilitator and manager of the Scrum framework. Once the team reaches a consensus for how many days a sprint should last, all future sprints should be the same. Traditionally, a sprint lasts 30 days.</p>
      <a href="read-more.php">read more</a>
  </div>
     </div>
</section>
<!-- *********** start footer ************** -->
<footer>
  <h3>all copy right &copy; reserved</h3>
</footer>
</body>
</html>