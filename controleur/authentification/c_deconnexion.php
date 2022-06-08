<?php
if(isset($_SESSION['utilisateur'])) {
    unset($_SESSION['utilisateur']);
}
header('Location: ?page');