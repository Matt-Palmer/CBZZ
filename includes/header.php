<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cakes By Zo Zo</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="content-width">
                    <div class="navbar-header">
                        <a href="index.php" class="navbar-brand">
                            Logo
                        </a>
                    </div>

                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="posts.php">Posts</a></li>
                            <li><a href="#">Link 2</a></li>
                            <li><a href="#">Link 3</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Link 4 <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Link 4.1</a></li>
                                    <li><a href="#">Link 4.2</a></li>
                                    <li><a href="#">Link 4.3</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="admin/">Admin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>