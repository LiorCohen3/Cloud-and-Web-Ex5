<?php
    include 'config.php';

    if (isset($_GET["category"])) 
    {
        $showcategories = $_GET["category"];
        if (strcasecmp($showcategories, '"all"') == 0) 
        {
            $query = "SELECT * FROM tbl_86_books";
        } 
        else 
        {
            $query = "SELECT * FROM tbl_86_books WHERE category = ". $showcategories;
        }
    } 
    else 
    {
        $query = "SELECT * FROM tbl_86_books";
    }
    $result = mysqli_query($connection, $query);

    if(!$result) 
    {
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
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Lior's Book Store</title>
</head>
<body>
    <div class="container">
        <h1>Books</h1>
        <h4>Category:
        <?php 
            if (isset($_GET["category"])) 
            {
                echo $showcategories;
            }
            else
            {
                echo '"all"';
            }
        ?></h4>
        <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Category</button>
        <ul class="dropdown-menu" id="dw"></ul>
        </div>
        <br><br><br>
    <?php 
        echo '<div class="row">';
        while($row = mysqli_fetch_assoc($result)) 
        {
            $img = $row["image"];
            echo '<div class="col-sm-6">';
            echo    '<div class="card">';
            echo        '<img src="' . $img . '"class="rounded mx-auto d-block">';
            echo        '<div class="card-body">';
            echo        '<h5 class="card-title">' . $row["name"] . '</h5>';
            echo        '<h6 class="price">Price: '.$row["price"] . '</h6>';
            echo        '<a href="book_page.php?bookId=' . $row["book_id"] . '" class="btn btn-primary">Book page</a>';
            echo '</div></div></div>';
        }
        echo '</div>';
        mysqli_free_result($result);
        ?> 
    </div>
    <script src="assets/script.js"></script>
</body>
</html>
<?php
    mysqli_close($connection);
?>