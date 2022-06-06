<?php

require_once('connect-db.php');
require_once('todo.php');

$td1 = new Todo();

print_r($td1);

$td1->get_from_id(25);

print_r($td1);

$td1->edit_todo("This is edited todo.");

print_r($td1);

// $td1->edit_todo("This is edited todo.");

// print_r($td1->get_all_todos());


?>