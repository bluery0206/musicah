<?php
    include_once '../config/globals.php';

    if ($_SERVER['REQUEST_METHOD' == "POST"]){

    }
?>
<!DOCTYPE html>
<html lang="en" data-bs-core="modern" data-bs-theme="dark">
<head>
    <?php include '../assets/components/headContent.component.php'; ?>
    <title>Musicah | Login</title>
</head>
<body>
    <div class="container ">
        <div class="p-4">
            <form method="POST">
                <div class="py-2 ">
                    <h2>Login</h2>
                </div>
                <div>
                    <div class="mb-3">
                        <label for="username" class="form-label">
                            Username
                        </label>
                        <input type="text" class="form-control" placeholder="Username" id="username" >
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">
                            Password
                        </label>
                        <input type="text" class="form-control" placeholder="Username" id="username" >
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100" name="login">
                            Login
                        </button>
                    </div>
                </div>
                <div>
                    <div class="mb-3 text-center">
                        <span>or</span>
                    </div>
                    <div>
                        <button type="button" class="btn btn-success w-100">
                            Create an account
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>