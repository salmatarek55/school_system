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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
          overflow-x: hidden; 
          padding-top: 70px;
       }
    </style>
</head>

<body>
     <nav class="navbar navbar-expand-lg bg-primary fixed-top">
        <div class="w-100 d-flex justify-content-between align-items-center px-3">
            <a class="navbar-brand text-white" href="/school_system">
                <?php print isset($_SESSION['username']) ? $_SESSION['username'] : "school system" ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="/school_system">
                            <i class="fa-solid fa-graduation-cap"></i> Home
                        </a>
                    </li>

                    <?php if(isset($_SESSION['username'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/school_system/student">Student</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/school_system/teacher">Teacher</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/school_system/classroom">Classroom</a>
                        </li>
                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="/school_system/users/login.php">
                            <i class="fa-solid fa-user"></i> User
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                            Auth
                        </a>
                        <ul class="dropdown-menu">
                            <?php if(!isset($_SESSION['username'])) { ?>
                                <li><a class="dropdown-item" href="/school_system/users/login.php">Login</a></li>
                                <li><a class="dropdown-item" href="/school_system/users/add.php">Register</a></li>
                            <?php } else { ?>
                                <li><a class="dropdown-item" href="/school_system/users/logout.php">Logout</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>

                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-light" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->
