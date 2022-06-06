<?php

require_once('connect-db.php');
require_once('functions.php');
require_once('todo.php');

$todo = new Todo;

if ( $_SERVER['REQUEST_METHOD'] == "GET") {
    if ( isset( $_GET['deleteall'])) {
        Todo::delete_all();
    }
    if (isset($_GET['id'])) {
        $todo->get_from_id($_GET['id']);
    } else {
        header('location: ./index.php');
    }

    if ( isset($_GET['delete'])) {
        $todo->delete();
        header('location: ./index.php');
    }
}

if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {
    $task_title = check_input($_POST['task-title']);
    $task_id = $_POST['id'];
    $todo = new Todo($task_id);
    $todo->task = $task_title;
    $todo->update();
    header('location: ./index.php');
}

$nameErr = "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Add Task</title>
</head>
<body>
    <div class="wrapper">
        <h1 id="app-name">Edit Task</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <label for="title" class="">Task Title</label><br>
                <input type="text" name="task-title" id="" class="form-control" value="<?php echo $todo->task; ?>" required>
                <span class="error"> <?php echo $nameErr;?></span>
            </div>
            <input type="hidden" name="id" value="<?php echo $todo->id ?>">
            <div class="form-group">
                <input type="submit" value="Edit Task" class="my-4 btn btn-sm btn-warning">
            </div>
        </form>
    </div>
</body>
</html>