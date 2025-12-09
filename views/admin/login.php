<?php 
$pageTitle = 'Admin Login';
$headerNav = '<a href="index.php?page=home">Home</a>';
include 'views/layouts/header.php'; 
?>

<main style="max-width:400px;margin:50px auto;">
    <h2>Admin Login</h2>
    <?php if(!empty($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="index.php?page=admin-login">
        <label>Username<br><input name="username" required></label><br><br>
        <label>Password<br><input type="password" name="password" required></label><br><br>
        <button type="submit">Login</button>
    </form>
</main>

<?php include 'views/layouts/footer.php'; ?>