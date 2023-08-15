<?= $this->extend('layouts/app') ?>



<?= $this->section('title') ?>
Home
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php if (!empty($todos)) : ?>


    <?php foreach ($todos as $todo) : ?>
        <div class="post-preview">
            <a href="<?= base_url('todo/' . $todo->id . '/edit') ?>">
                <h2 class="post-title"><?= $todo->title ?></h2>
            </a>
            <p class="post-meta">
                <?= $todo->body ?>
            </p>
        </div>

    <?php endforeach; ?>

<?php else : ?>
    <h1>No todos</h1>
<?php endif; ?>

<?= $this->endSection() ?>