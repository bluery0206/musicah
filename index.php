<?php
    include_once 'autoload.php';
    include_once 'config/globals.php';

    // $user = new User();
    // $user->getUsername();
?>
<!DOCTYPE html>
<html lang="en" data-bs-core="modern" data-bs-theme="dark">
<head>
    <?php include 'assets/components/headContent.component.php'; ?>
    <title>Musicah | Home</title>
</head>
<body>
    <?php include 'assets/components/navbar.component.php'; ?>

    <div class="container">
        <div class="row py-2 my-2 justify-content-end">
            <div class="col-auto">
                <div class="row">
                    <div class="col-auto">
                        <a href="" class="btn btn-outline-success">
                            <div class="row g-2">
                                <div class="col-auto">
                                    <i class="fa-solid fa-square-plus"></i>
                                </div>
                                <div class="col-auto">
                                    <span>Add music</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="" class="btn btn-outline-danger">
                            <div class="row g-2">
                                <div class="col-auto">
                                    <i class="fa-solid fa-trash"></i>
                                </div>
                                <div class="col-auto">
                                    <span>Add music</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-hover table-responsive">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Artist</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Duration</th>
                    <th scope="col" class="specific-w-200 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">dsad</th>
                    <td>dsad</td>
                    <td>dsad</td>
                    <td>dsad</td>
                    <td>dsad</td>
                    <td>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <a class="btn btn-success" href="{% url 'amenity:update' amenity.pk %}">Update</a>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-danger" href="{% url 'amenity:delete' amenity.pk %}">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>