<?php
require_once __DIR__ . '/Components/header.php';

?>
<div class="container new-book">

    <h1><?php echo $viewModel['pageTitle'] ?> </h1>

    <form method="post" action="index.php?route=new-book">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control">
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <select class="form-control" name="author_id" id="author">
                        <?php foreach($viewModel['authors'] as $author) {
                            echo '<option value="' . $author['id'] . '">' . $author['name'] . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="publisher">Publisher</label>
                    <select class="form-control" name="publisher_id" id="publisher">
                        <?php foreach($viewModel['publishers'] as $publisher) {
                            echo '<option value="' . $publisher['id'] . '">' . $publisher['name'] . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" id="isbn" class="form-control" pattern="\d{10}">
                </div>
                <div class="form-group">
                    <label for="pages">Pages</label>
                    <input type="number" name="pages" id="pages" class="form-control" min="1" max="999">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" name="image_filename" id="image" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <label for="description">Description</label>
                <textarea type="text" name="description" id="description" class="form-control"></textarea>
            </div>
        </div>  <!-- end of row -->
        <div class="mt-2">
            <a class="btn btn-light float-right" href="./">Back</a>
            <input type="submit" class="btn btn-success" value="Add new book">
        </div>
    </form>
</div>  <!-- end of container -->

<?php

require_once __DIR__ . '/Components/footer.php';

?>
