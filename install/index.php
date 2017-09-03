<?php 

session_start(); 

if (!isset($_GET['step']) || $_GET['step'] == 1) 
{
    include 'step1.php';
}
elseif ($_GET['step'] == 2)
{
    include 'step2.php';
}
elseif ($_GET['step'] == 3) 
{
    include 'step3.php';
}