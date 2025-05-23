<?php
    include_once 'autoload.php';
    include_once 'app/modules/exceptions.php';

    session_start();
    $next = base64_decode($_GET['next']) ?? "index.php";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $artist = filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_STRING);
        $genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
        $duration = filter_input(INPUT_POST, 'duration', FILTER_SANITIZE_STRING);

        global $name;
        global $artist;
        global $genre;
        global $duration;

        try {
            $musicController = new MusicController();
            $musicController->insertNewMusic($name, $artist, $genre, $duration);
            header("Location:" . $next);
        } 
        catch (EmptyFieldException $e) {
            global $hasError;

            switch ($e->getField()) {
                case "name": 
                    global $nameError;
                    $nameError = $e;
                    break;
                case "artist":
                    global $artistError;
                    $artistError = $e;
                    break;
                case "genre":
                    global $genreError;
                    $genreError = $e;
                    break;
                case "duration":
                    global $durationError;
                    $durationError = $e;
                    break;
            }
        } catch (Exception $e) {
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
    <title>Musicah | Add Music</title>
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
                                Musicah | Add Music
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
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control 
                                <?php if (isset($name) && !isset($hasError)) { echo 'is-valid'; }?>
                                <?php if (isset($nameError) || isset($hasError)) { echo "is-invalid"; } ?>" 
                                type="text" name="name" id="name" placeholder="The Hymm of Juan"
                                value="<?php if (isset($name)) { echo $name; }?>"
                                autofocus>
                            <?php if (isset($nameError)) { ?>
                                <div class="invalid-feedback">
                                    <?php echo $nameError->getMessage(); ?>
                                </div>
                            <?php }?> 
                        </div>
                        <div class="col-auto">
                            <label for="artist" class="form-label">artist</label>
                            <input class="form-control 
                                <?php if (isset($artist) && !isset($hasError)) { echo 'is-valid'; }?>
                                <?php if (isset($artistError) || isset($hasError)) { echo "is-invalid"; } ?>" 
                                type="text" name="artist" id="artist" placeholder="Juan JDK"
                                value="<?php if (isset($artist)) { echo $artist; }?>">
                            <?php if (isset($artistError)) { ?>
                                <div class="invalid-feedback">
                                    <?php echo $artistError->getMessage(); ?>
                                </div>
                            <?php }?> 
                        </div>
                        <div class="col-auto">
                            <label for="genre" class="form-label">genre</label>
                            <input class="form-control 
                                <?php if (isset($genre) && !isset($hasError)) { echo 'is-valid'; }?>
                                <?php if (isset($genreError) || isset($hasError)) { echo "is-invalid"; } ?>" 
                                type="text" name="genre" id="genre" placeholder="Pop, Country"
                                value="<?php if (isset($genre)) { echo $genre; }?>">
                            <?php if (isset($genreError)) { ?>
                                <div class="invalid-feedback">
                                    <?php echo $genreError->getMessage(); ?>
                                </div>
                            <?php }?> 
                        </div>
                        <div class="col-auto">
                            <label for="duration" class="form-label">duration</label>
                            <input class="form-control 
                                <?php if (isset($duration) && !isset($hasError)) { echo 'is-valid'; }?>
                                <?php if (isset($durationError) || isset($hasError)) { echo "is-invalid"; } ?>" 
                                type="text" name="duration" id="duration" placeholder="2:43 mins"
                                value="<?php if (isset($duration)) { echo $duration; }?>">
                            <?php if (isset($durationError)) { ?>
                                <div class="invalid-feedback">
                                    <?php echo $durationError->getMessage(); ?>
                                </div>
                            <?php }?> 
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fa-solid fa-square-plus"></i>
                                Add new music
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                </div>
            </form>
        </div>
    </div>
    <div class="col-auto p-0 m-0">
        <?php include_once 'assets/components/footer.php'; ?>
    </div>
</body>

</html>