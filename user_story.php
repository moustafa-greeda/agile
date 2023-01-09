<?php

include 'config.php';
error_reporting(0);
$id_user_story = $_GET['id'];

if (isset($_POST['submit'])) {

    $name_user_story     = $_POST['name_user_story'];
    $description	     = $_POST['description'];
    $periorety           = $_POST['periorety'];
    $weight              = $_POST['weight'];

    if ( $name_user_story ) {
        $sql = "SELECT * FROM user_story WHERE name_user_story='$name_user_story'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
          $query = "SELECT id_sprint FROM user_story WHERE id_user_stories=$id_user_story";
$db = $conn;
          $result = $db->query($query);
$id_sprint = null;
if($result== true)
 if ($result->num_rows > 0) {
    $id_sprint= mysqli_fetch_assoc($result)['id_sprint'];
 }
            if($id_sprint != null){
              $sql = "INSERT INTO user_story ( `name_user_story`, `description`, `periorety`, `weight` , `id_sprint`) 
            VALUES ('$name_user_story', '$description', '$periorety', $weight, $id_sprint)";
            $result = mysqli_query($db, $sql);
            if ($result) {
                $sql = "SELECT * FROM user_story WHERE name_user_story='$name_user_story'";
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['user_story'] = true;
                $_SESSION['id_user_story'] = $row['id_user_stories'];
                $name_user_story  = "";
                $description      = "";
                $periorety        = "";
                $weight           = "";
                header('Location: tasks.php');
            } else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
           }
            }
       } else {
           echo "<script>alert('Woops! user story Already Exists.')</script>";
       }
       
   } else {
       echo "<script>alert('user story Not Matched.')</script>";
   }
}
$db= $conn;
$tableName="user_story";
$columns= ['id_user_stories','name_user_story' , 'description'];
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
$query = "SELECT ".$columnName." FROM $tableName WHERE id_user_stories=$id_user_story";
// error here
// $query = "SELECT ".$columnName." FROM $tableName"."WHERE id_user = '$id_user'";
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
    <title>user story</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- ********************************* start header ************************************** -->     
<header class="heading">
    <span id="logo">logo</span>
    <span id="nav-bar">nav bar</span>
    <nav>
        <ul>
            <li><a href="about">about</a></li>
            <li><a href="login-in.php">login</a></li>
            <li><a href="register.php">register</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </nav>    
</header>
<section class="parent">
<!-- ********************************* start aside ************************************** -->
<aside>
    <form action="" method="POST">
        <input type="text" name="name_user_story" value="<?php echo  $name_user_story?>" placeholder="name of user story">
        <input type="text" name="description" value="<?php echo  $description?>" placeholder="description">
        <select name="periorety">
            <option value="<?php echo  $periorety?>">heigher</option>
            <option value="<?php echo  $periorety?>">mediam</option>
            <option value="<?php echo  $periorety?>">lower</option>
        </select>
        <input type="number" name="weight" value="<?php echo  $weight?>" placeholder="enter weight">
        <input type="submit" name="submit" value="creat user story">
    </form>
</aside>
<!-- **************************** start table ****************************************** -->
<section class="table-project">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive"> 
      <table>
       <thead>
         <tr>
          <th>N.P</th>
         <th>name of user story</th>
         <th>user story description</th>
         <th>tasks</th>
         <th colspan="2">edit</th>
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){
        $tasksdisplay = "";
        $sn=1;
      foreach($fetchData as $data){
        $query = "SELECT * FROM tasks WHERE id_user_story=".$data['id_user_stories']."";
                  $result = $conn->query($query);
                  if ($result->num_rows > 0) {
                    $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach($tasks as $task){
                      $tasksdisplay .= "<a href='tasks.php?id=".$task['id_tasks']."' data-id='".$task['id_tasks']."'>".$task['name_task']."</a><br>";
                    }
                  }
                  $tasksdisplay .= "<hr>";
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['name_user_story']??''; ?></td>
      <td><?php echo $data['description']??''; ?></td>
      <td><?php echo $tasksdisplay; ?></td>
      <td><?php echo "<button id='update'>update</button>"??''; ?></td>
      <td><?php echo "<button id='delete'>delete</button>"??''; ?></td>
     </tr>
     <?php $sn++; $tasksdisplay = ""; }}else{ ?>
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
<!-- ************************************ start about ********************************** -->
</section>
<section class="parent-about">
  <div class="my-header">
    <h1>about us</h1>
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
</body>
</html>