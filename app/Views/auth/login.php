<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
Login Page
<?= $this->endSection() ?>


<?= $this->section('content') ?>
 
    <h1 class="test">Welcome to our website!</h1>
    <p>This is the login page content.</p>
    
    <form action="/login" method="post">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>

 
<?= $this->endSection() ?>