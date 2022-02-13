<?php
  $task = $_POST['task'];
  if($task == ''){
    echo "Enter task...";
    exit();
  }
  require 'config_db.php';
  $dsn = "mysql:host=localhost;dbname=to-do";
  $pdo = new PDO($dsn, 'root', 'root');
  $sql = 'INSERT INTO tasks(task) VALUES(:task)';
  $query = $pdo->prepare($sql);
  $query->execute(['task' => $task]);
  header('Location: /');
?>