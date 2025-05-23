
<nav class="navbar navbar-expand-md"
    style="background-color: var(--bs-content-bg); border-bottom: var(--bs-border-width) solid var(--bs-content-border-color);">
    <div class="container px-0">
        <div class="row align-items-center mx-0 px-0 justify-content-between w-100">
            <div class="col-auto">
                <a class="navbar-brand" href="index.php">
                    <i class="fa-solid fa-record-vinyl"></i>
                    <span>Musicah</span>
                </a>
            </div>
            <div class="col-auto">
                <div class="row gx-1">
                    <!-- Logged in user action buttons -->
                    <?php if (isset($_SESSION['user'])) { ?>
                        <div class="col-auto">
                            <a href="signout.php" class="btn btn-primary">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    <?php } else { ?>
                        <!-- Anon user action buttons -->
                        <div class="col-auto">
                            <a href="signin.php" class="btn btn-primary">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                <span>Login</span>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</nav>