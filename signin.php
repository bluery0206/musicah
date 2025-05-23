<?php
    include 'autoload.php';
    include 'app/modules/exceptions.php';

    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        global $password;
        global $username;

        try {
            $userController = new UserController();
            $userController->signin($username, $password);
            header("Location:index.php");
        } 
        catch (EmptyFieldException $e) {
            global $hasError;

            if ($e->getField() == "username") {
                global $usernameError;
                $usernameError = $e;
            } else if ($e->getField() == "password") {
                global $passwordError;
                $passwordError = $e;
            }
        } catch (Exception $e) {
            global $hasError;
            $hasError = True;
        }
    }
?>
<!DOCTYPE html>
<html lang="en" data-bs-core="modern" data-bs-theme="dark">
<head>
    <?php include 'assets/components/head.php'; ?>
    <script src="assets/js/toggle_password_visibility.js"></script>
    <title>Musicah | Signin</title>
</head>
<body>
    <div class="container p-lg-4 p-md-2 p-0">
        <div class="row h-100 p-lg-4 p-0 flex-md-row-reverse row-cols-1 row-cols-md-2">
            <div class="col-md-8 h-100">
                <div class="row">
                    <img class="object-fit-cover specific-h-100 specific-h-md-400 p-0" src="<?= "assets/images/pexels-expect-best-79873-351265.jpg" ?>">
                </div>
            </div>
            <div class="col-md-4">
                <form class="needs-validation p-4 h-100 row flex-column justify-content-between" method="POST" novalidate>
                    <div class="col-auto">
                        <span class="fs-4 fw-bold">
                            <i class="fa-solid fa-record-vinyl"></i>
                            Musicah | Signin
                        </span>
                    </div>
                    <?php if (isset($hasError)) { ?>
                        <div class="col-auto">
                            <div class="alert alert-danger m-0">
                                Keep in mind that the username and password are case-sensitive.
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-auto">
                        <div class="row flex-column gy-3">
                            <div class="col-auto">
                                <label for="username" class="form-label">Username</label>
                                <input class="form-control 
                                    <?php if (isset($username) && !isset($hasError)) { echo 'is-valid'; }?>
                                    <?php if (isset($usernameError) || isset($hasError)) { echo "is-invalid"; } ?>" 
                                    type="text" name="username" id="username" placeholder="example123"
                                    value="<?php if (isset($username)) { echo $username; }?>">
                                <?php if (isset($usernameError)) { ?>
                                    <div class="invalid-feedback">
                                        <?php echo $usernameError->getMessage(); ?>
                                    </div>
                                <?php }?> 
                            </div>
                            <div class="col-auto">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input class="form-control 
                                    <?php if (isset($password) && !isset($hasError)) { echo 'is-valid'; }?>
                                    <?php if (isset($passwordError) || isset($hasError)) { echo "is-invalid"; }?>" 
                                    type="password" name="password" id="password" placeholder="3x4mpl3@123"
                                    value="<?php if (isset($password)) { echo $password; }?>">
                    
                                    <button type="button" class="input-group-text"
                                        onclick="togglePasswordVisiblity('password', 'password_icon')">
                                        <i id="password_icon" class="fa-solid fa-eye"></i>
                                    </button>

                                    <?php if (isset($passwordError)) { ?>
                                        <div class="invalid-feedback">
                                            <?php echo $passwordError->getMessage(); ?>
                                        </div>
                                    <?php }?> 
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                    Login
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="signup.php" class="btn btn-success w-100">
                            <i class="fa-solid fa-user-plus"></i>
                            Create an account
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>