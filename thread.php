<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Welcome to iDiscuss Coding Forums</title>
</head>

<body>
    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>


    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        // Insert into thread into db
        $comment = $_POST['comment'];
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment', '$id', '0', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your comment has been added!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        }
    }
    ?>



    <!-- Category container starts here -->
    <div class="container my-4 text-white">
        <div class="bg-secondary rounded p-4">
            <h1 class="display-4"><?php echo $title; ?></h1>
            <p class="fs-6"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums. ...
                Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Do not cross post questions.
                Remain respectful of other members at all time</p>
            <p>Posted by: <b>Saif</b></p>
        </div>
    </div>

    <div class="container">
        <h1 class="py-2">Post your comment</h1>

        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Type your comment..</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Post</button>
        </form>
    </div>

    <div class="container">
        <h1 class="py-2">Discussions</h1>
        <?php
        $noResult = true;
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];

            echo ' <div class="media d-flex">
                <img src="img/default.png" width="50px" height="50px" class="me-3" alt="...">
                <div class="media-body">
                <p class="fw-bold my-0">Anonymous user</p>
                    <p>' . $content . '</p>
                </div>
            </div>
        </div>';
        }

        if ($noResult) {
            echo '
            <div class="container my-4 text-white">
            <div class="bg-secondary rounded p-4">
                <h1 class="display-4">No Comments yet..</h1>
                <p class="fs-6"> Be the first person to ask..</p>
            </div>
        </div>';
        }
        ?>



        <?php include 'partials/_footer.php'; ?>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>