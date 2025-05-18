
<nav class="navbar navbar-expand-md"
    style="background-color: var(--bs-content-bg); border-bottom: var(--bs-border-width) solid var(--bs-content-border-color);">
    <div class="container px-0">
        <div class="row align-items-center mx-0 px-0 justify-content-between w-100">
            <div class="col-auto">
                <a class="navbar-brand" href="<?= $urls->index ?>">
                    <i class="fa-solid fa-record-vinyl"></i>
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
                <div class="row gx-1">
                    <!-- Logged in user action buttons -->
                    <?php if (isset($_SESSION['user'])) { ?>
                        <!-- <div class="col-auto">
                            <a href="https://bsky.app/profile/aorikasumi.bsky.social" class="btn btn-primary">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                <span>Profile</span>
                            </a>
                        </div> -->
                        <!-- <div class="col-auto">
                            <a href="https://bsky.app/profile/aorikasumi.bsky.social" class="btn btn-primary">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                <span>Settings</span>
                            </a>
                        </div> -->
                        <div class="col-auto">
                            <a href="<?= $urls->public->signout ?>" class="btn btn-primary">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    <?php } else { ?>
                        <!-- Anon user action buttons -->
                        <div class="col-auto">
                            <a href="<?= $urls->signin ?>" class="btn btn-primary">
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