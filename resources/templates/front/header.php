<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="img/logo/logo.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  
  <!-- Custom CSS Stylesheet-->
  <link rel='stylesheet' href='css/layout.css'>

  <?php 
    $pageName =substr(basename($_SERVER['PHP_SELF']), 0, -4); /* substr 0 to -4 strips the .php from the basename() */
    $link = '<link rel="stylesheet" href="css/';
    $include ='';
    switch($pageName){
      case 'index':
        $include = $link.'homepage.css';
        break;
      case 'menu':
        $include =  $link.'menu.css';
        break;
      case 'register':
        $include = $link.'register.css';
        break;
      case 'info':
        $include = $link.'info.css';
        break;
    }
   
    echo $include.'">';
  ?>
  <title><?php 
    
    if($pageName == 'index') echo 'Home';
    else{
      echo ucfirst($pageName);
    }  
  ?>
</title>
</head>

<body>

<?php include(TEMPLATE_FRONT.DS."top_nav.php"); ?>
