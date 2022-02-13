<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TODO-list</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>TODO</h1>
    <form action="/add.php" method="post">
      <input type="text" name="task" id="task" placeholder="Need to do..." class="form-control">
      <button type="submit" name="sendTask" class="btn btn-success">Send</button>
    </form>
    <?php
    require 'config_db.php';
    echo '<ul>';
    $query = $pdo->query('SELECT * FROM `tasks` ORDER BY `id` DESC');
    while($row = $query->fetch(PDO::FETCH_OBJ)){
      echo '<li><b>' . $row->task . '</b><a href="/delete.php?id='.$rod->id.'"><button>Delete</button></a></li>';
    }
    echo '</ul>';
    ?>
  </div>
</body>
</html>