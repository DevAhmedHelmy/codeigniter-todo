<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
Register Page
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<div class="mb-3">

    <?php if (isset($validation)) : ?>
        <div class="error">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>
    <h1>Register</h1>
    <form action="<?= base_url('/register') ?>" method="post">
        <?= csrf_field() ?>
        <div class="form-floating">
            <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." value="<?= set_value('name') ?>">
            <label for="name">Name</label>
            <!-- <div class="invalid-feedback" >A name is required.</div> -->
        </div>
        <div class="form-floating">
            <input class="form-control" id="email" name="email" type="email" placeholder="Enter your name..." value="<?= set_value('email') ?>">
            <label for="email">email</label>
            <!-- <div class="invalid-feedback" >A name is required.</div> -->
        </div>
        <div class="form-floating">
            <input class="form-control" id="password" name="password" type="password" placeholder="Enter your password...">
            <label for="password">password</label>
            <!-- <div class="invalid-feedback" >A name is required.</div> -->
        </div>
        <div class="form-floating">
            <input class="form-control" id="passconf" name="passconf" type="password" placeholder="Enter your Password Confirmation...">
            <label for="passconf">Password Confirmation</label>
            <!-- <div class="invalid-feedback" >A name is required.</div> -->
        </div>
        <br>
        <button class="btn btn-primary text-uppercase" type="submit">Send</button>
    </form>

</div>


<?= $this->endSection() ?>