
<nav class="navbar navbar-expand-md"
    style="background-color: var(--bs-content-bg); border-bottom: var(--bs-border-width) solid var(--bs-content-border-color);">
    <div class="container">
        <div class="row d-flex justify-content-between w-100">
            <div class="col-auto">
                <a class="navbar-brand" href="http://localhost/php-projects/musicah/">
                    <i class="fa-solid fa-record-vinyl d-inline-block align-text-center"></i>
                    <span>Musicah</span>
                </a>
            </div>
            <div class="col-auto">
                <div class="row g-1">
                    <div class="col-auto">
                        <a href="https://github.com/bluery0206/musicah" class="btn px-1">
                            <i class="fa-brands fa-github"></i>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="https://web.facebook.com/hilario.markryan.i" class="btn px-1">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="https://bsky.app/profile/aorikasumi.bsky.social" class="btn px-1">
                            <i class="fa-brands fa-bluesky"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="row g-1">
                    <!-- Logged in user action buttons -->
                    <?php if ($_SESSION['user_is_authenticared']) { ?>
                        <div class="col-auto">
                            <a href="https://bsky.app/profile/aorikasumi.bsky.social" class="btn btn-primary">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                <span>Profile</span>
                            </a>
                        </div>
                            <div class="col-auto">
                                <a href="https://bsky.app/profile/aorikasumi.bsky.social" class="btn btn-primary">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                    <span>Settings</span>
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="https://bsky.app/profile/aorikasumi.bsky.social" class="btn btn-primary">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                    <?php } else { ?>
                        <!-- Anon user action buttons -->
                        <div class="col-auto">
                            <a href="<?= $_SERVER['URL_PUBLIC'] . 'login.php' ?>" class="btn btn-primary">
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