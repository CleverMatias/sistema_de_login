<?php
session_start();
session_unset('nome');
session_destroy(); // c

header('Location: index.php');
