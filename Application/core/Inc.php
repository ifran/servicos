<?php session_start();
    include($_SERVER['DOCUMENT_ROOT'] . '/ProjetoUlbra/Application/core/Const.php');
    
    // No local atual da pasta
    include(PATH_CORE  . 'Database.php');

    include(PATH_MODEL . 'Nivel.php');
    include(PATH_MODEL . 'Ranking.php');
?>