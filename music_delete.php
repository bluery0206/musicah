<?php
    include_once 'autoload.php';
    include_once 'app/modules/exceptions.php';

    session_start();
    
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $musicView = new MusicView();
    $music = $musicView->getMusic($id);
    $next = base64_decode($_GET['next']) ?? "index.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $musicController = new MusicController();
            $musicController->deleteMusic($id);
            header("Location:" . $next);
        } 
        catch (Exception $e) {
            global $hasError;
            global $error;
            $hasError = True;
            $error = $e;
        }
    }
?>

<!DOCTYPE html>
<html lang="en" data-bs-core="modern" data-bs-theme="dark">
<head>
    <?php include 'assets/components/head.php'; ?>
    <title>Musicah | Delete <?= $music->name ?></title>
</head>
<body class="row flex-column justify-content-between p-0 m-0 min-vh-100">
    <div class="col-auto m-0 p-0">
        <?php include_once 'assets/components/navbar.php'; ?>

        <div class="container p-lg-4 p-md-2 p-0">
            <form class="<?php if ($_SERVER['REQUEST_METHOD'] == "POST") { echo "needs-validation"; }?> p-4 h-100" method="POST" novalidate>
                <div class="row">
                    <div class="row justify-content-between align-items-center">
                        <div class="col">
                            <a href="<?= $next ?>" class="btn">
                                <i class="fa-solid fa-square-caret-left"></i>
                                Return
                            </a>
                        </div>
                        <div class="col-auto">
                            <div class="fs-4 fw-bold text-center">
                                <i class="fa-solid fa-record-vinyl"></i>
                                Musicah | Delete "<?= $music->name ?>"
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
                <?php if (isset($hasError)) { ?>
                    <div class="row">
                        <div class="alert alert-danger m-0">
                            <?= $error->getMessage() ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="row flex-column gy-3">
                        <div class="col-auto">
                            <button type="submit" name="confirm" class="btn btn-outline-danger w-100">
                                <i class="fa-solid fa-trash"></i>
                                Confirm delete
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-auto p-0 m-0">
        <?php include_once 'assets/components/footer.php'; ?>
    </div>
</body>

</html>