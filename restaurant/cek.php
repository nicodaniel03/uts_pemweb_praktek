<?php

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin'){

    }
    else{
        header("Location: index.php");
    }
}

?>