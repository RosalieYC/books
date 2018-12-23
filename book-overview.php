<?php

require_once __DIR__ . '/Components/header.php';

?>

<div class="container">
    <h1>Books</h1>
    <p class="subtitle">Below you will find an overview of the books.</p>
    <table class="book-overview">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th class="d-none d-sm-table-cell">ISBN</th>
            <th class="d-none d-sm-table-cell">Price</th>
        </tr>
        <?php
        foreach ($viewModel['books'] as $book) {
            echo '<tr>
        <td><a href="index.php?route=book&id=' . $book['id'] . '">' . $book['title'] . '</a></td>
        <td>' . $book['authorName'] . '</td>
        <td class="d-none d-sm-table-cell">' . $book['isbn'] . '</td>
        <td class="d-none d-sm-table-cell">' . '&euro; ' . $book['price'] . '</td>
        </tr>';
        }
        ?>
    </table>

    <a class="btn btn-success mt-3" href="index.php?route=new-book">Add a book</a>
</div><!--  end of container div-->

<?php

require_once __DIR__ . '/Components/footer.php';

?>

