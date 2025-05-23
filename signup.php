<?php
    include_once 'autoload.php';
    include_once 'app/modules/exceptions.php';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password1 = filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_STRING);
        $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);

        global $username;
        global $password1;
        global $password2;

        try {
            $userController = new UserController();
            $userController->signup($username, $password1, $password2);
            $userController->signin($username, $password1);
            header("Location:signin.php");
        } 
        catch (EmptyFieldException $e) {
            global $hasError;

            switch ($e->getField()) {
                case "username": 
                    global $usernameError;
                    $usernameError = $e;
                    break;
                case "password1":
                    global $password1Error;
                    $password1Error = $e;
                    break;
                case "password2":
                    global $password2Error;
                    $password2Error = $e;
                    break;
            }
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
    <script src="assets/js/toggle_password_visibility.js"></script>
    <title>Musicah | Signup</title>
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
                            Musicah | Signup
                        </span>
                    </div>
                    <?php if (isset($hasError)) { ?>
                        <div class="col-auto">
                            <div class="alert alert-danger m-0">
                                <?= $error->getMessage() ?>
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
                                <label for="password1" class="form-label">Password</label>
                                <div class="input-group">
                                    <input class="form-control 
                                        <?php if (isset($password1) && !isset($hasError)) { echo 'is-valid'; }?>
                                        <?php if (isset($password1Error) || isset($hasError)) { echo "is-invalid"; }?>" 
                                        type="password" name="password1" id="password1" placeholder="3x4mpl3@123"
                                        value="<?php if (isset($password1)) { echo $password1; }?>">
                    
                                    <button type="button" class="input-group-text"
                                        onclick="togglePasswordVisiblity('password1', 'password1_icon')">
                                        <i id="password1_icon" class="fa-solid fa-eye"></i>
                                    </button>

                                    <?php if (isset($password1Error)) { ?>
                                        <div class="invalid-feedback">
                                            <?php echo $password1Error->getMessage(); ?>
                                        </div>
                                    <?php }?> 
                                </div>
                            </div>
                            <div class="col-auto">
                                <label for="password2" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <input class="form-control 
                                        <?php if (isset($password2) && !isset($hasError)) { echo 'is-valid'; }?>
                                        <?php if (isset($password2Error) || isset($hasError)) { echo "is-invalid"; }?>" 
                                        type="password" name="password2" id="password2" placeholder="3x4mpl3@123"
                                        value="<?php if (isset($password2)) { echo $password2; }?>">
                    
                                    <button type="button" class="input-group-text"
                                        onclick="togglePasswordVisiblity('password2', 'password2_icon')">
                                        <i id="password2_icon" class="fa-solid fa-eye"></i>
                                    </button>

                                    <?php if (isset($password2Error)) { ?>
                                        <div class="invalid-feedback">
                                            <?php echo $password2Error->getMessage(); ?>
                                        </div>
                                    <?php }?> 
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fa-solid fa-user-plus"></i>
                                    Create new account
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="signin.php" class="btn btn-success w-100">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            Signin
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>