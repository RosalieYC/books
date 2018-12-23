<?php

require_once __DIR__ . '/Components/header.php';

?>

<div class="container">
    <h1 class="details"><?= $viewModel['book']['title'] ?></h1>
    <div class="subtitle">
        <?= $viewModel['book']['subtitle'] ?>
    </div>

    <div class="details row mt-3">
        <div class="detail col-12 col-lg-3">
            <img src="images/<?php echo $viewModel['book']['image'] ?>" />
        </div>
        <div class="detail info col-12 col-lg-3 mt-3 mt-sm-0">
            <div class="form-group">
                <label>ISBN</label>
                <?= $viewModel['book']['isbn'] ?>
            </div>
            <div class="form-group">
                <label>Author</label>
                <?= $viewModel['book']['authorName'] ?>
            </div>
            <div class="form-group">
                <label>Publisher</label>
                <?= $viewModel['book']['publisherName'] ?>
            </div>
            <div class="form-group">
                <label>Pages</label>
                <?= $viewModel['book']['pages'] ?>
            </div>
            <div class="form-group">
                <label>Price</label>
                <?= $viewModel['book']['price'] ?>
            </div>
        </div>
        <div class="detail description col-12 col-lg-6">
            <p> <?= $viewModel['book']['description'] ?></p>
        </div>
    </div>

    <div class="my-2">
        <a class="btn btn-light" href="./">Back</a>

        <div class="float-right">
    <form action="index.php?route=delete-book&id=<?= $viewModel['book']['id']?>" method="POST" onSubmit="return window.confirm('Are you sure you want to delete this book?')">
        <a class="btn btn-success mr-1" href="#">Add to cart</a>
        <a href="index.php?route=edit-book&id=<?= $viewModel['book']['id'] ?>" class="btn btn-success">Edit book</a>
        <input type="submit" class="btn btn-danger" value="Delete book">
    </form>

        </div>
    </div>
    <hr>

</div> <!-- end of container -->

<?php

require_once __DIR__ . '/Components/footer.php';

?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
