<?php

require_once('bootstrap.php');
$bookID = $_GET['id'];

// kijkt of bookid in books array bestaat, wanneer deze fout is wordt er gedirect naar de not-found-page
if (!isset($books[$bookID])) {
    http_response_code(404);
    require_once('page-not-found.php');
    exit;
    //  header('Location: page-not-found.php');
}
$book = $books[$bookID];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Clean Code</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap-4.1.3.css">
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-5">
        <a class="navbar-brand" href="./">Book Catalog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="details"><?= $book['title'] ?></h1>
        <div class="subtitle">
            <?= $book['subtitle'] ?>
        </div>
        <div class="details row">
            <div class="detail col-12 col-lg-3">
                <img src="images/<?php echo $book['image'] ?>" />
            </div>
            <div class="detail info col-12 col-lg-3 mt-3 mt-sm-0">
                <div class="form-group">
                    <label>ISBN</label>
                    <?= $book['isbn'] ?>
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <?= $book['authorName'] ?>
                </div>
                <div class="form-group">
                    <label>Publisher</label>
                    <?= $book['publisherName'] ?>
                </div>
                <div class="form-group">
                    <label>Pages</label>
                    <?= $book['pages'] ?>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <?= $book['price'] ?>
                </div>
            </div>
            <div class="detail description col-12 col-lg-6">
                <p> <?= $book['description'] ?></p>
            </div>
        </div>

        <div class="my-3">
            <a class="btn btn-light" href="./">Back</a>
            <a class="btn btn-success float-right" href="#">Add to cart</a>
        </div>
        <hr>

        <div class="footer mt-0">
            &copy; 2018 The American Bookstore
        </div>

    </div> <!-- end of container -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>