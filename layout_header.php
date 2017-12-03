<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php $page_title = 'teste'; ?></title>

    <!-- Importing Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="libs/js/jquery-1.4.2.js"></script>
    <script src="libs/js/jquery-1.4.2.min.js"></script>

    <!-- My custom CSS -->
    <link rel="stylesheet" href="libs/css/custom.css" />

</head>

<body>



<!-- container -->
<div class="container section-max-width">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/BraviProject/index.php">Bravi Interview</a>
            </div>
            <ul class="nav navbar-nav navbar-center">
                <li class=""><a href="/BraviProject/brackets.php">Balanced Brackets</a></li>
                <li class=""><a href="/BraviProject/rest_api.php">REST API</a></li>
                <li class=""><a href="/BraviProject/weather.php">Weather</a></li>
            </ul>
        </div>
    </nav>

    <?php
    // show page header
    echo   "<div class='page-header'>
                <h1>{$page_title}</h1>
            </div>";
    ?>
