<?php

require_once __DIR__ . '/Components/header.php';

?>

<div class="container">

    <h1><?= $viewModel['pageTitle'] ?></h1>

    <p>Please enter username and password to login</p>

    <form action="index.php?route=login" method="post">
        <div class="row">
            <div class="col-xs-12 col-m-4">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-success" value="login">

    </form>

</div>

<?php

require_once __DIR__ . '/Components/footer.php';

?>
