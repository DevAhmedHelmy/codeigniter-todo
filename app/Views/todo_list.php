<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1>Todo List</h1>
    <a href="/todos/create">Create New Todo</a>
    <ul>
        <?php foreach ($todos as $todo): ?>
            <li>
                <span><?= $todo['description'] ?></span>
                <span><?= $todo['status'] ? 'Done' : 'Pending' ?></span>
                <a href="/todos/edit/<?= $todo['id'] ?>">Edit</a>
                <a href="/todos/delete/<?= $todo['id'] ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?= $this->endSection() ?>