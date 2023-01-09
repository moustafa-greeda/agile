<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agile Board</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<!-- <div class="agile">
		 <div class="agile__column">
			<div class="agile__column-title">Not Started</div>
			<h2>
			<?php
      if(is_array($fetchData)){
        echo $id_sprint = $_GET['id'];
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
                  // $tasksdisplay .= "<hr>";
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['name_task']??''; ?></td>
      <td><?php echo $task['name_user']??''; ?></td>
      <td><?php $x='project_grad/tasks_user.php?id='.$id_sprint.'';  echo "<a href =".$x.">link</a>"; ?></td>
     </tr>
     <?php $sn++; $tasksdisplay = ""; }}else{ ?>
      <tr>
        <td colspan="15"><?php echo $fetchData; ?></td>
    <tr>
    <?php } ?>
			</h2> -->
			<!-- <div class="agile__items">
				<div contenteditable class="agile__item-input">Wash the dishes</div>
				<div class="agile__dropzone"></div>
			</div>
			<button class="agile__add-item" type="button">+ Add</button>
		</div> -->
	</div>
	<script src="js/main.js" type="module"></script>
</body>
</html>