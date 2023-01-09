<?php
include 'config.php';
if(isset($_POST['status']) && isset($_POST['task_id'])){
  $status = mysqli_real_escape_string($conn,$_POST['status']);
  $task_id = mysqli_real_escape_string($conn,$_POST['task_id']);

  $sql = "UPDATE `tasks` SET status=$status WHERE id_tasks=$task_id";
  $result = mysqli_query($conn, $sql);  
  if ($result) {
    echo "done";
  }else {
    echo "failed";
  }
}
else{
  echo "missing inputs";
}
?>