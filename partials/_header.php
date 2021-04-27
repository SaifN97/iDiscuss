<?php
session_start();

echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">iDiscuss</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact.php" tabindex="-1">Contact</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
                </form>';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {
    echo '
    <div class="d-flex flex-row justify-content-center mx-2">
    <p class="text-light text-center my-0 me-2">Welcome ' . $_SESSION['useremail'] . '</p>
        <a href="../partials/_logout.php" class="btn btn-outline-success">Logout</a>
    </div>
    ';
} else {
    echo '
<div class="mx-2">
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                <button class="btn btn-outline-success"  data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>
            </div>
';
}

echo '</div>
    </div>
</nav>
 ';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';

if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == 'true') {
    echo '
    <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You can login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    ';
} else if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == 'fa;se') {

    echo
    '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Error!</strong> Something went wrong couldnt sign you up..
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
