<?php

require_once('connect-db.php');
require_once('functions.php');
require_once('todo.php');

$task_title = $nameErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ( empty( $_POST['task-title'])) {
        $nameErr = "Blank task title. Please input a Task.";
    } else {
        // Some Form Validation
        $task_title = check_input($_POST['task-title']);

        $todo = new Todo;
        $todo->task = $task_title;
        $todo->save();
    }

    header('location: ./index.php');
}

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
        <h1 id="app-name">Add Task</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <label for="title" class="">Task Title</label><br>
                <input type="text" name="task-title" id="" class="form-control" required>
                <span class="error"> <?php echo $nameErr;?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Add Task" class="my-4 btn btn-sm btn-primary">
            </div>
        </form>
    </div>
</body>
</html>