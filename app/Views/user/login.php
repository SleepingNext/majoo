<?= $this->extend("layout/template_base") ?>

<?= $this->section("content"); ?>
    <div class="container-fluid">
        <?php if ($error_message != null) : ?>
            <div class="row">
                <div class="col-4 offset-4">
                    <div class="alert alert-primary" role="alert"><?= $error_message; ?></div>
                </div>
            </div>
        <?php endif; ?>

        <form action="/user/login" method="post">
            <div class="row">
                <div class="col-4 mb-4 offset-4">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" id="username" name="username">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 mb-4 offset-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control form-control-lg" id="password" name="password">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 mb-4 offset-4">
                    <div class="input-group">
                        <button type="submit" class="btn btn-lg btn-primary">Login</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?= $this->endSection(); ?>