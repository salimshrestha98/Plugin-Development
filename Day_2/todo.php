<?php

class Todo {
    public $id;
    public $task;
    public $completed;
    private $created_at;

    public function __construct($id=NULL) {
        $this->id = $id;
        if ( $id != NULL) {
            $this->get_from_id($id);
        }
    }

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

    public function delete() {
        global $conn;
        if ( isset($this->id)) {
            $q = "DELETE FROM todos WHERE id=$this->id";
            if ( $conn->query($q) === true ) {
                echo "Deleted Successfully.";
                header('location: ./index.php');
            } else {
                die($conn->error);
            }
        }
    }

    public function update() {
        global $conn;
        if ( isset($this->id)) {
            $q = "UPDATE todos SET task='$this->task' WHERE id='$this->id'";
            if ($conn->query($q)) {
                echo "Updated Successfully";
            } else {
                die($conn->error);
            }
        }
    }

    public function save() {
        global $conn;
        if (isset($this->task)) {
            $this->completed = false;
            $this->created_at = date('Y-m-d h:i:sa');

            $q = "INSERT INTO todos (task, completed, created_at) VALUES ('$this->task', '$this->completed', '$this->created_at')";
            if ($conn->query($q)) {
                echo "Added Succcessfully";
            } else {
                die($conn->error);
            }
        }
    }

    public static function delete_all() {
        global $conn;
        $q = "DELETE FROM todos WHERE 1";
        if ($conn->query($q)) {
            header('location: ./index.php');
        } else {
            die($conn->error);
        }
    }
}

?>