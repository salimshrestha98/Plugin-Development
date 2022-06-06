<?php

require_once('connect-db.php');

class Todo {
    private $id;
    private $task;
    private $completed;
    private $created_at;

    public function get_from_id($id) {
        global $conn;
        $q = "SELECT * FROM todos WHERE id=$id";
        $result = $conn->query($q);
        if ($row = $result->fetch_assoc()) {
            $this->id = $row['id'];
            $this->task = $row['task'];
            $this->completed = $row['completed'];
            $this->created_at = $row['created_at'];
        } else {
            die($conn->error);
        }
    }

    public static function get_all_todos() {
        global $conn;
        $q = "SELECT * FROM todos";
        $results = $conn->query($q);
        $todos = [];
        while ( $row = $results->fetch_assoc()) {
            $todos[] = $row;
        }

        return $todos;
    }
    
    public function add_todo($task) {
        $this->task = $task;
        $this->completed = false;
        $this->created_at = date('Y-m-d h:i:sa');
    }

    public function delete_todo() {
        global $conn;
        if ( isset($this->id)) {
            $q = "DELETE FROM todos WHERE id=$this->id";
            if ( $conn->query($q) === true ) {
                echo "Deleted Successfully.";
            } else {
                die($conn->error);
            }
        }
    }

    public function edit_todo($updated_text) {
        global $conn;
        if ( isset($this->id)) {
            $q = "UPDATE todos SET task='$updated_text' WHERE id='$this->id'";
            if ($conn->query($q)) {
                echo "Updated Successfully";
            } else {
                die($conn->error);
            }
        }
    }

    public function save_todo() {
        global $conn;
        if (isset($this->task)) {
            $q = "INSERT INTO todos (task, completed, created_at) VALUES ('$this->task', '$this->completed', '$this->created_at')";
            if ($conn->query($q)) {
                echo "Added Succcessfully";
            } else {
                die($conn->error);
            }
        }
    }
}

$td1 = new Todo();

print_r($td1);

$td1->get_from_id(25);

print_r($td1);

$td1->edit_todo("This is edited todo.");

print_r($td1);

// $td1->edit_todo("This is edited todo.");

// print_r($td1->get_all_todos());


?>