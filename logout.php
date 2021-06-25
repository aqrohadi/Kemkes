<?php
    session_start();
    session_destroy();	
        echo "<script>alert('Sign 0ut Successful !'); window.location = 'index.php'</script>";
?>