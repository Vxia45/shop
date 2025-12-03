<?php 
$pageTitle = 'Add Product';
$headerNav = '<a href="/">Home</a> | <a href="/admin/dashboard">Dashboard</a> | 
              <a href="/admin/logout">Logout</a>';
include 'views/layouts/header.php'; 
?>

<main style="max-width:600px;margin:20px auto;">
    <h2>Add Product</h2>
    <form method="post" action="/admin/add" enctype="multipart/form-data">
        <label>Title<br><input name="title" required></label><br><br>
        <label>Description<br><textarea name="description" rows="4"></textarea></label><br><br>
        <label>Price<br><input name="price" type="number" step="0.01" required></label><br><br>
        <label>Image<br><input type="file" name="image"></label><br><br>
        <button type="submit">Save</button>
    </form>
</main>

<?php include 'views/layouts/footer.php'; ?>