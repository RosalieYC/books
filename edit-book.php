<?php
require_once __DIR__ . '/Components/header.php';

?>
<div class="container new-book">

    <h1><?php echo 'Edit ' . $viewModel['pageTitle'] ?> </h1>

    <form method="post" action="index.php?route=edit-book&id=<?= $viewModel['book']['id'] ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="<?= $viewModel['book']['title']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" name="subtitle" id="subtitle" value="<?= $viewModel['book']['subtitle']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <select class="form-control" name="author_id" id="author">

<!--                        $selected = ($author['id'] == $viewModel['book']['author_id']) ? "selected" : ""; -->
                        <?php foreach($viewModel['authors'] as $author) {
                            $selected = "";
                            if ($author['id'] == $viewModel['book']['author_id']) {
                                $selected = "selected";
                            }
                            echo '<option value="' . $author['id'] . '" ' . $selected . '>' . $author['name'] . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="publisher">Publisher</label>
                    <select class="form-control" name="publisher_id" id="publisher">
<!--                        $selected = ($publisher['id'] == $viewModel['book']['publisher_id']) ? "selected" : ""; -->
                        <?php foreach($viewModel['publishers'] as $publisher) {
                            $selected = "";
                            if ($publisher['id'] == $viewModel['book']['publisher_id']) {
                                $selected = "selected";
                            }
                            echo '<option value="' . $publisher['id'] . '" ' . $selected . '>' . $publisher['name'] . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" id="isbn" value="<?= $viewModel['book']['isbn']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pages">Pages</label>
                    <input type="text" name="pages" id="pages" value="<?= $viewModel['book']['pages']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" value="<?= $viewModel['book']['price']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" name="image_filename" id="image" value="<?= $viewModel['book']['image']?>" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <label for="description">Description</label>
                <textarea type="text" name="description" id="description" class="form-control"><?= $viewModel['book']['description']?></textarea>
            </div>
        </div>  <!-- end of row -->
        <div class="mt-2">
            <a class="btn btn-light float-right" href="./">Back</a>
            <input type="submit" class="btn btn-success" value="Save changes">
        </div>
    </form>
</div>  <!-- end of container -->

<?php

require_once __DIR__ . '/Components/footer.php';

?>
