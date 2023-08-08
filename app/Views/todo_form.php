<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1><?= $todo ? 'Update' : 'Create' ?> Todo</h1>
    <form action="<?= $todo ? '/todos/update/' . $todo['id'] : '/todos/store' ?>" method="post">
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="<?= $todo['description'] ?? '' ?>">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="status" name="status" <?= $todo['status'] ?? false ? 'checked' : '' ?>>
            <label class="form-check-label" for="status">Done</label>
        </div>
        <button type="submit" class="btn btn-primary"><?= $todo ? 'Update' : 'Create' ?> Todo</button>
    </form>
</div>
<?= $this->endSection() ?>