<?php
include('config.php');
error_reporting(0);
session_start();

$email = $_SESSION['email'];

$db= $conn;
$tableName="tasks";
$columns= ['id_tasks','name_task' , 'name_user', 'working_hours' , 'status'];
$fetchData = fetch_data($db, $tableName, $columns,$email);

function fetch_data($db, $tableName, $columns, $name_user){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{
$columnName = implode(", ", $columns);
$query = "SELECT $columnName FROM $tableName WHERE name_user='$name_user'";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <title>agile Board</title>
        <link rel="stylesheet" href="tasks_admin/kanban.css">
        <!-- cdn font owsome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
            //data task id
            //ev.target.id >> div id
            switch (ev.target.id) {
                case 'inprogress':
                    changeStatus(1,data);
                    break;
                case 'done':
                    changeStatus(2,data);
                    break;
                default:
                    changeStatus(0,data);
                    break;
            }
        }
        let done = document.querySelectorAll(".done");
        done.ondrop = function color(){
            this.classList.togel('.done')
        }

        function changeStatus(status,id) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                    document.location.reload();
                }
            };
            var FD  = new FormData();
            FD.append("status", status);
            FD.append("task_id", id);
            xmlhttp.open("POST", "update_task_status.php", true);
            xmlhttp.send(FD);
        }
    </script>
<!-------------------------------- start style kanaban ---------------------------------------->
    <style>
     
    </style>
</head>
<body>
     <!-- ********************************* start header ************************************** -->     
<nav id="nav">
      <div class="parent">
        <h2>Logo</h2>
        <ul>
        <li>
            <a href="welcome.php">Home</a></li>
            <li><a href="tasks_assign.php">tasks assign</a></li>
            <li><a href="project.php">project</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="logout.php">Log out</a></li>
        </ul>
      </div>
</nav>
<div class="containerrr">
        <div class="kanban-heading">
            <strong class="kanban-heading-text">my assign tasks</strong>
        </div>
        <div class="kanban-board">
            <?php
                if(is_array($fetchData)){
                    $todo = "";
                    $inprogress = "";
                    $done = "";
                    foreach($fetchData as $data){
                        switch ($data['status']) {
                            case 1:
                                $inprogress .= "<div class='task' data-id='".$data['id_tasks']."' id='".$data['id_tasks']."' draggable='true' ondragstart='drag(event)'>
                                <p><i class='fas fa-user'></i> ".$data['name_user']."</p>
                                    <div class='box'>
                                        <p><i class='fas fa-tasks-alt'></i> task : ".$data['name_task']."</p>
                                        <span><i class='far fa-clock'></i> working hours : ".$data['working_hours']." hours</span>
                                    </div>
                                    </div>";
                                break;
                            case 2:
                                $done .= "<div class='task' data-id='".$data['id_tasks']."' id='".$data['id_tasks']."' draggable='true' ondragstart='drag(event)'>
                                    <p><i class='fas fa-user'></i> ".$data['name_user']."</p>
                                    <div class='box'>
                                        <p><i class='fas fa-tasks-alt'></i> task : ".$data['name_task']."</p>
                                        <span><i class='far fa-clock'></i> working hours : ".$data['working_hours']." hours</span>
                                    </div>
                                    </div>";
                                break;
                            default:
                                $todo .= "<div class='task' data-id='".$data['id_tasks']."' id='".$data['id_tasks']."' draggable='true' ondragstart='drag(event)'>
                                    <p><i class='fas fa-user'></i> ".$data['name_user']."</p>
                                    <div class='box'>
                                        <p><i class='fas fa-tasks-alt'></i> task : ".$data['name_task']."</p>
                                        <span><i class='far fa-clock'></i> working hours : ".$data['working_hours']." hours</span>
                                    </div>
                                    </div>";
                                break;
                        }  
                    }
                }
            ?>
            <div class="kanban-block" id="todo" ondrop="drop(event)" ondragover="allowDrop(event)">
                <strong>To Do</strong>
                <?php echo $todo; ?>
            </div>
            <div class="kanban-block" id="inprogress" ondrop="drop(event)" ondragover="allowDrop(event)">
                <strong>In Progress</strong>
                <?php echo $inprogress; ?>
            </div>
            <div class="kanban-block" id="done" ondrop="drop(event)" ondragover="allowDrop(event)">
                <strong>Done</strong>
                <?php echo $done; ?>
            </div>
        </div>
    </div>
<!-- end agile -->
<footer>
  <h3>all copy right &copy; reserved</h3>
</footer>
<!-- end footer -->
</body>
</html>