<?php

require_once __DIR__ . '/Components/header.php';

?>

    <div class="about-introduction">
        <img class="profile-picture" src="https://picsum.photos/175/175/?random">
        <h1><?php echo $viewModel['about']['firstname'] . " " . $viewModel['about']['lastname'] ?></h1>
        <div class="function-subtitle">
            <?= $viewModel['about']['functie'] ?>
        </div>
    </div>

    <div class="about-information">
        <div class="about">
            <label>Interests</label>
            <p><?php foreach ($viewModel['about']['interests'] as $interest) {
                    echo $interest . "<br>";
                } ?></p>
        </div>
        <div class="about">
            <label>Favorite books</label>
            <p><?php foreach ($viewModel['about']['favoBooks'] as $favoBook) {                   // gets integers from favobooks array
                    foreach ($viewModel['books'] as $key=>$bookInfo) {                           // gets integers used as keys from books array
                        if ($favoBook == $key) {                                    // als integers van de favo boeken overeenkomt met de keys van de books array
                            echo $viewModel['books'][$key]['title'] . ", " . $viewModel['books'][$key]['authorName'] . "<br>";                    // displays title als key van de book overeenkomt met title van die key array
                        }
                    }
                }
    //            foreach ($about['favoBooks'] as $favoBook) {
    //                echo $books['$favoBooks']['title'] . $books['$favoBooks']['authorName'];
    //        }
                ?></p>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>