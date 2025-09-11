<?php
session_start();
?>
<!-- haeder start -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/school_system/assets/bootstrap.min.css">
    <link rel="stylesheet" href="/school_system/assets/style.css">
</head>

<body>
    <div class="container">
        <!-- جايبنها من البوتستراب -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="/school_system"><?php print  isset($_SESSION['username'])?$_SESSION['username']:"school system" ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/school_system">Home</a>
                        </li>
                        <?php
                        if(isset($_SESSION['username']))
                            { ?>
                                <li class="nav-item">
                                       <a class="nav-link" href="/school_system/student">Student</a>
                                </li>
                          <?php
                            }?>
                        <?php    
                        if(isset($_SESSION['username']))
                            { ?>
                                <li class="nav-item">
                                       <a class="nav-link" href="/school_system/teacher">Teacher</a>
                                </li>
                          <?php
                            }?>  
                         <?php    
                        if(isset($_SESSION['username']))
                            { ?>
                                <li class="nav-item">
                                       <a class="nav-link" href="/school_system/classroom">classroom</a>
                                </li>
                          <?php
                            }?>       
        
                        <li class="nav-item">
                            <a class="nav-link" href="/school_system/users">User</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Auth
                            </a>
                            <ul class="dropdown-menu">
                              <?php
                              if(!isset($_SESSION['username']))
                                {?>
                                <li><a class="dropdown-item" href="/school_system/users/login.php">Login</a></li>
                                <li><a class="dropdown-item" href="/school_system/users/add.php">Register</a></li>
                                <?php  }else{
                                ?>
                                <li><a class="dropdown-item" href="/school_system/users/logout.php">Logout</a></li>
                               <?php }?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- header end -->