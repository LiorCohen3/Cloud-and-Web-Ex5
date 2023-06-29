<?php
    include 'config.php';

    $query  = "SELECT * FROM tbl_86_books WHERE book_id=".$_GET["bookId"];
    $result = mysqli_query($connection, $query);

    if(!$result) { 
        die("Failed to query data base");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy This Book!</title>
</head>

<body>
<div class="container">
    <h1>Book info:</h1>
    <?php 
        echo '<div class="row">';
        $row = mysqli_fetch_assoc($result);
        $img1 = $row["image"];
        $img2 = $row["image2"];
        echo '<div class="col-sm-12">';
        echo    '<div class="card">';
        echo        '<img src="' . $img1 . '"class="rounded mx-auto d-block">';
        echo        '<img src="' . $img2 . '"class="rounded mx-auto d-block">';
        echo        '<div class="card-body">';
        echo        '<h5 class="card-title">' . $row["name"] . '</h5>';
        echo        '<h6 class="price">Price: '.$row["price"] . '</h6>';
        echo        '<h6 class="category">Category: '.$row["category"] . '</h6>';
        echo '</div></div></div>';
        echo '</div>';
        mysqli_free_result($result);
    ?> 
</div>
</body>
</html>
<?php
    mysqli_close($connection);
?>