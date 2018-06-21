<?php
session_start();
session_unset('nome');
session_destroy();

header('Location: index.php');
