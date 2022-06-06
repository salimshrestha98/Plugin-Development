<?php
function check_input($text) {
    $text = trim($text);
    $text = htmlspecialchars($text);

    return $text;
}

?>