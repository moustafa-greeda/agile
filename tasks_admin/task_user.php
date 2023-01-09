<?php
include('./../config.php');
error_reporting(0);
// session_start();
$id_user_story = $_GET['id'];
$id_user = $_SESSION['id_user'];

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

<!DOCTYPE html>
<html lang="en">
<head>
    <title>agile Board</title>
        <!-- <link rel="stylesheet" href="../style.css"> -->
        <link rel="stylesheet" href="./kanban.css">
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
        }
        let done = document.querySelectorAll(".done");
        done.ondrop = function color(){
            this.classList.togel('.done')
        }
    </script>
<!-------------------------------- start style kanaban ---------------------------------------->
    <style>
    body{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    overflow-x: hidden;
    font-family: "pt serif", times new roman, Times, serif;
}
html {
  scroll-behavior: smooth;
}
:root {
  --main-color: rgba(0, 103, 181, 1);
  --main-transition: 0.33s all ease-out;
  --main-padding: 60px 0;
  --main-margin: 60px 0;
}
.parent {
  margin: 0 auto;
  padding: 0 15px;
  width: 90%;
}
.done{
    border: 2px solid #44bd32;
}
/******************************** start nav *********************************************/
nav {
  background-color: #0c2462;
}
#nav .parent {
    display: flex;
    align-items: center;
    justify-content: space-between;
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

/********************************** start agile ********************************************/
    .containerrr {
    width: 90%;
    min-width: 50%;
    margin: auto;
    display: flex;
    flex-direction: column;
  }
    strong{
        text-align: center;
        color:#0C2461;
    }
  .kanban-heading {
    display: flex;
    flex-direction: row;
    justify-content: center;
    font-family: sans-serif;
  }
  
  .kanban-heading-text {
    font-size: 1.8rem;
    /* background-color: tomato; */
    padding: 0.8rem 1.7rem;
    border-radius: 0.5rem;
    margin: 1rem;
  }
  /*  */
  .kanban-board {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    font-family: sans-serif;
  }
  
  .kanban-block {
    padding: 0.6rem;
    width: calc(90%/3);
    min-width: 14rem;
    min-height: 70vh;
    border-radius: 0.3rem;
  }
  #todo {
    /* background-color: #fec6d1; */
    background-color: #ddd;
  }
  
  #inprogress {
    /* background-color: #ffaf00; */
    background-color: #ddd;
  }
  
  #done {
    /* background-color: #018b01; */
    background-color: #ddd;
  }
  body {
    background-color: #fff;
  }
  .task {
    background-color: white;
    margin: 20px 10px;
    border: 0.1rem solid transparent;
    border-radius: 0.3rem;
    padding: 0.5rem 0.2rem 0.5rem 2rem;
  }
  i{
    padding: 5px;
    color: #fff;
    background-color: #0C2461;
    border-radius: 50%;
  }
  .active_todo{
    border: 2px solid #c0392b;
  }
  .active_progress{
    border: 2px solid #f1c40f;
  }
  .active_done{
    border: 2px solid #27ae60 ;
  }
  .box{
      width: 80%;
      padding: 15px;
      border: 1px solid transparent;
      background-color: #eee;
  }
  #task-button {
    margin: 0.2rem 0rem 0.1rem 0rem;
    background-color: white;
    border-radius: 0.2rem;
    width: 100%;
    border: 0.25rem solid black;
    padding: 0.5rem 2.7rem;
    border-radius: 0.3rem;
    font-size: 1rem;
  }
  /* start footer */
    footer{
    margin-top: 50px;
    padding: 5px;
    text-align: center;
    background-color: #0C2461;
    }
    footer h3{
    color: #fff;
    font-size: 24px;
    }  
    /***************************** start  media query ****************************/
    @media (max-width: 767px) {
    .container {
        width: 100%;
        padding: 0 15px;
    }
    .container {
        align-items: center;
    }
    }

    @media (min-width: 768px) {
    .container {
        width: 750px;
    }
    }

    @media (max-width: 991px) {
    .container {
        align-items: center;
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
     <!-- ********************************* start header ************************************** -->     
<nav id="nav">
      <div class="parent">
        <h2>Logo</h2>
        <ul>
        <li><a href="../welcome.php">Home</a></li>
              <li><a href="../tasks_assign.php">tasks assign</a></li>
              <li><a href="../project.php">project</a></li>
              <li><a href="../about.php">About</a></li>
              <li><a href="../contact.php">Contact</a></li>
              <li><a href="../logout.php">Log out</a></li>
        </ul>
      </div>
</nav>
<div class="containerrr">
        <div class="kanban-heading">
            <strong class="kanban-heading-text">agile Board</strong>
        </div>
         <div class="kanban-board">
            <!--<div class="kanban-block" id="todo" ondrop="drop(event)" ondragover="allowDrop(event)">
                <strong>To Do</strong>
                <?php
                if(is_array($fetchData)){
                  $id_sprint = $_GET['id'];
                  $tasksdisplay = "";
                  $sn=1;
                  $todo = "";
                  $inprogress = "";
                  $done = "";
              foreach($fetchData as $data){
                  $query = "SELECT * FROM tasks WHERE id_tasks =".$data['id_tasks']."";
                          $result = $conn->query($query);
                          if ($result->num_rows > 0) {
                              $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
                              foreach($tasks as $data){
                                switch ($data['status']) {
                                  case 1:
                                      $inprogress .= "<div class='task active_progress' data-id='".$data['id_tasks']."' id='".$data['id_tasks']."' draggable='true' ondragstart='drag(event)'>
                                      <p><i class='fas fa-user'></i> ".$data['name_user']."</p>
                                          <div class='box'>
                                              <p><i class='fas fa-tasks-alt'></i> task : ".$data['name_task']."</p>
                                              <span><i class='far fa-clock'></i> working hours : ".$data['working_hours']." hours</span>
                                          </div>
                                          </div>";
                                      break;
                                  case 2:
                                      $done .= "<div class='task active_done' data-id='".$data['id_tasks']."' id='".$data['id_tasks']."' draggable='true' ondragstart='drag(event)'>
                                          <p><i class='fas fa-user'></i> ".$data['name_user']."</p>
                                          <div class='box'>
                                              <p><i class='fas fa-tasks-alt'></i> task : ".$data['name_task']."</p>
                                              <span><i class='far fa-clock'></i> working hours : ".$data['working_hours']." hours</span>
                                          </div>
                                          </div>";
                                      break;
                                  default:
                                    echo  $todo .= "<div class='task active_todo' data-id='".$data['id_tasks']."' id='".$data['id_tasks']."' draggable='true' ondragstart='drag(event)'>
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

              <?php $sn++; $tasksdisplay = ""; }}else{ ?>
              <?php echo $fetchData; ?>
              <?php } ?>
            </div> -->
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
