<?php
include 'config.php';
error_reporting(0);
session_start();
$id_user_story = $_GET['id'];
$id_user = $_SESSION['id_user'];

if (isset($_POST['submit'])) {

    $name_task      = $_POST['name_task'];
    $name_user      = $_POST['name_user'];
    $working_hours  = $_POST['working_hours'];

    if ( $name_task ) {
    $sql = "SELECT * FROM tasks WHERE name_task ='$name_task'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {

            $sql = "INSERT INTO `tasks` ( `name_task`,`name_user`, `working_hours` , `id_user_story`) 
            VALUES ('$name_task', '$name_user', '$working_hours', '$id_user_story')";
            $result = mysqli_query($conn, $sql);  
            if ($result) {

              $to = (string)$name_user;
              $subject = "New Task Assignment";
              
              $message = "<b>This is Message to Infor you about your new task.</b>";
              $message .= "<h1>".$name_task."</h1>";
              $message .= "<h3>".$name_task."</h3>";
              $message .= "<h3>".$name_task."</h3>";
              
              $header = "From:moustafagreeda@gmail.com \r\n";
              $header .= "MIME-Version: 1.0\r\n";
              $header .= "Content-type: text/html\r\n";
              
              $retval = mail ($to,$subject,$message,$header);
              
              if( $retval == true ) {
                 echo "<script>alert('Message sent successfully.')</script>";
              }else {
                echo "<script>alert('Message sent successfully.')</script>";
                // echo "<script>alert('Message could not be sent.')</script>";
              }
                $sql = "SELECT * FROM tasks WHERE  id_task='$name_task'";
                $result = mysqli_query($conn, $sql);

                $_SESSION['tasks_user'] = true;

                $name_task     = "";
                $name_user     = "";
                $working_hours = "";

            } else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
           }
       } else {
           echo "<script>alert('Woops! task Already Exists.')</script>";
       }
       
   } else {
       echo "<script>alert('task Not Matched.')</script>";
   }

}
$db= $conn;
$tableName="tasks";
$columns= ['id_tasks','name_task' , 'working_hours'];
$fetchData = fetch_data($db, $tableName, $columns,$id_user_story);

function fetch_data($db, $tableName, $columns,$id_user_story){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{
$columnName = implode(", ", $columns);
$query = "SELECT $columnName FROM $tableName WHERE id_user_story=$id_user_story";
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
<!-- ********************************* start html ************************************** -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tasks_admin</title>
    <link rel="stylesheet" href="style.css">
    <style>

    </style>
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
    <form action="" method="POST">
        <label for="">name task</label>
        <input type="text" name="name_task" value="<?php echo  $name_task?>" placeholder="name of task">
        <label for="">name user</label>
        <input type="email" name="name_user" value="<?php echo  $name_user?>" placeholder="name of user">
        <label for="">working hours</label>
        <input type="text" name="working_hours" value="<?php echo  $working_hours ?>" placeholder="enter working hours">
        <input type="submit" name="submit" value="creat task">
    </form>
</aside>
<!-- **************************** start table ****************************************** -->
<section class="table-project">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive"> 
      <table>
       <thead><tr><th>N.t</th>
         <th>name of tasks</th>
         <th>name of user</th>
         <th>working hours</th>
         <th colspan="2">view dashbord</th>
    </thead>
    <tbody>
    <?php
      if(is_array($fetchData)){
        $id_sprint = $_GET['id'];
        $tasksdisplay = "";
        $sn=1;
      foreach($fetchData as $data){
        $query = "SELECT * FROM tasks WHERE id_tasks =".$data['id_tasks']."";
                  $result = $conn->query($query);
                  if ($result->num_rows > 0) {
                    $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach($tasks as $task){
                      $tasksdisplay .= "<a href='tasks.php?id=".$task['id_tasks']."' data-id='".$task['id_tasks']."'>".$task['name_task']."</a><br>";
                    }
                  }
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['name_task']??''; ?></td>
      <td><?php echo $task['name_user']??''; ?></td>
      <td> <span style="color: #d35400 ">hours :</span><?php echo $task['working_hours'] ?></td>
      <td><?php $x='tasks_admin/task_user.php?id='.$id_sprint.'';  echo "<a href =".$x.">dash board</a>"; ?></td>
     </tr>
     <?php $sn++; $tasksdisplay = ""; }}else{ ?>
      <tr>
        <td colspan="15"><?php echo $fetchData; ?></td>
    <tr>
    <?php } ?>

    </tbody>
     </table>
   </div>
</section>
</section>
<!-- ************************************ start about ********************************** -->
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
      <a href="read-more.php">read more</a>
  </div>
     </div>
</section>
<!-- ********************************* start footer ************************************** -->
<footer>
  <h3>all copy right &copy; reserved</h3>
</footer>

<script src="tasks_admin.js"></script>
</body>
</html>