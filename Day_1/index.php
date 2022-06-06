<?php
    require_once('connect-db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Day 1 - Todo App</title>
</head>
<body>
    <div class="wrapper">
        <h1 id="app-name">Todo List App</h1>
        <div>
            <?php
                $q = "SELECT * from todos";
                $results = $conn->query($q);

                if ( $results->num_rows > 0) : ?>
                    <div class="row font-weight-bold" id="table-head">
                        <div class="col-md-8">Tasks</div>
                        <div class="col-md-4">Actions</div>
                    </div>  
                    
                    <ol>
                    <?php while ( $row = $results->fetch_assoc() ) : ?>
                        <li>
                            <div class="row">
                                <div class="col-md-8">
                                    <?php echo $row['task']; ?>
                                </div>

                                <div class="col-md-4">
                                    <a href="./edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                                    <a href="./edit.php?id=<?php echo $row['id']; ?>&delete=true" class="text-danger">Delete</a>
                                </div>
                            </div>
                            
                            
                        </li>
                    <?php endwhile; ?>
                    </ol>
                <?php else :?>
                    You don't have any tasks for now. Add some.<br><br>

                <?php  endif; ?>
            <a href="../Day_1/add.php" class="btn btn-sm btn-primary">Add New Task</a>
            <a href="../Day_1/edit.php?deleteall=true" class="btn btn-sm btn-danger">Delete All</a>
        </div>
    </div>
</body>
</html>