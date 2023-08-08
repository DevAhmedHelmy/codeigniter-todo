<!DOCTYPE html>
<html lang="en">

<?= $this->include('layouts/partials/head') ?>

<body>
    <?= $this->include('layouts/partials/nav') ?>
    <?= $this->include('layouts/partials/header') ?>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>

    <?= $this->include('layouts/partials/footer') ?>

</body>

</html>