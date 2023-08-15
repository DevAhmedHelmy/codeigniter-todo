<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
Create Todo Page
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<div class="mb-3">

    <?php if (isset($validation)) : ?>
        <?= $validation->listErrors('my_list') ?>
    <?php endif; ?>
    <h1>Create Todo</h1>
    <form action="<?= base_url() . 'todo/update/' . $todo['id'] ?>" method="post">
        <?= csrf_field() ?>
        
        <div class="form-floating">
            <input class="form-control" id="title" name="title" type="text" placeholder="Enter your title..." value="<?= $todo['title'] ?>">
            <label for="title">title</label>

        </div>
        <div class="form-floating">
            <input class="form-control" id="body" name="body" type="text" placeholder="Enter your body..." value="<?= $todo['body']  ?>">
            <label for="body">body</label>

        </div>
        <div class="form-floating">
            <input class="form-control" id="status" name="status" type="text" placeholder="Enter your status..." value="<?= $todo['status'] ?>">
            <label for="status">status</label>

        </div>

        <br>
        <button class="btn btn-primary text-uppercase" type="submit">Update</button>
    </form>

</div>


<?= $this->endSection() ?>