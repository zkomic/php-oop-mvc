<?php 

// Page redirect
function redirect($location) {
    header('Location: ' . URLROOT . '/' . $location);
}

?>