
<?php

    include_once 'autoload.php';
    include_once 'globals.php';

    session_start();

    $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT) ?? 0;

    $musicView = new MusicView();
    $songs = $musicView->getAllMusic(SONGS_PER_PAGE, $page);
    $hasNextPage = $musicView->hasNextPage(SONGS_PER_PAGE, $page);
    $hasPrevPage = $musicView->hasPrevPage($page);
    $rowCount = $musicView->countRow();
    $range = $musicView->getRange(SONGS_PER_PAGE, $page);
?>

<!DOCTYPE html>
<html lang="en" data-bs-core="modern" data-bs-theme="dark">
<head>
    <?php include_once 'assets/components/head.php'; ?>
    <title>Musicah | Home</title>
</head>
<body class="row flex-column justify-content-between p-0 m-0 min-vh-100">
    <div class="col-auto m-0 p-0 mb-5">
        <?php include_once 'assets/components/navbar.php'; ?>

        <div class="container">
            <div class="row py-2 my-2 justify-content-between">
                <div class="col-auto">
                    <h4>Songs</h4>
                </div>
                <?php if (isset($_SESSION['user'])) { ?>
                    <div class="col-auto">
                        <div class="row gx-2 m-0 p-0">
                            <div class="col-auto">
                                <a href="music_add.php?next=<?= $current ?>" class="btn btn-outline-success">
                                    <i class="fa-solid fa-square-plus"></i>
                                    <span>Add music</span>
                                </a>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-outline-danger" 
                                    href="music_delete_all.php?next=<?= $current ?>">
                                    <i class="fa-solid fa-trash"></i>
                                    Delete all music
                                </a>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
            <?php include 'assets/components/pagination.php'; ?>
            <table class="table table-hover table-responsive m-0">
                <thead class="table-secondary">
                    <tr>
                        <th scope="col" class="specific-w-50">#</th>
                        <th scope="col" class="specific-w-150">Date added</th>
                        <th scope="col">Name</th>
                        <th scope="col" class="specific-w-150">Artist</th>
                        <th scope="col" class="specific-w-150">Genre</th>
                        <th scope="col" class="specific-w-50">Duration</th>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <th scope="col" class="specific-w-150 text-center">Actions</th>
                        <?php }?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($songs as $idx => $song) { ?>
                        <tr>
                            <td><?= $range[$idx] ?></td>
                            <td><?= $song->add_date ?></td>
                            <td><?= $song->name ?></td>
                            <td><?= $song->artist ?></td>
                            <td><?= $song->genre ?></td>
                            <td><?= $song->duration ?></td>
                            <?php if (isset($_SESSION['user'])) { ?>
                                <td>
                                    <div class="row justify-content-center g-2">
                                        <div class="col-auto">
                                            <a class="btn btn-sm btn-outline-success" 
                                                href="music_update.php?id=<?= $song->id ?>&next=<?= $current ?>">
                                                Update
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <a class="btn btn-sm btn-outline-danger" 
                                                href="music_delete.php?id=<?= $song->id ?>&next=<?= $current ?>">
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            <?php }?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php include 'assets/components/pagination.php'; ?>
        </div>
    </div>
    <div class="col-auto p-0 m-0">
        <?php include_once 'assets/components/footer.php'; ?>
    </div>
</body>

</html>