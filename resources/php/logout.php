<?php
/**
 * Logout handler. Destroys session (if one exists) and returns to index.
 * 
 * @author Jerome Martina
 */
if (isset($_SESSION)) {
    session_destroy();
}
header("Location: ../../index.html");

