<?php 
$pageTitle = 'Edit Product';
$headerNav = '<a href="index.php?page=home">Home</a> | 
              <a href="index.php?page=admin-dashboard">Dashboard</a> | 
              <a href="index.php?page=admin-logout">Logout</a>';
include 'views/layouts/header.php'; 
?>

<main style="max-width:600px;margin:20px auto;">
    <h2>Edit Product</h2>
    
    <form method="post" action="index.php?page=admin-edit&id=<?php echo $product['id']; ?>" enctype="multipart/form-data">
        <label>Title<br>
            <input name="title" value="<?php echo htmlspecialchars($product['title']); ?>" required>
        </label><br><br>

        <label>Description<br>
            <textarea name="description" rows="4"><?php echo htmlspecialchars($product['description']); ?></textarea>
        </label><br><br>

        <label>Price<br>
            <input name="price" type="number" step="0.01" value="<?php echo $product['price']; ?>" required>
        </label><br><br>

        <?php if ($product['image']): ?>
            <p>Current image:<br>
                <img src="<?php echo asset('public/uploads/' . $product['image']); ?>" style="height:150px;">
            </p>
        <?php endif; ?>

        <label>New Image (optional)<br><input type="file" name="image"></label><br><br>

        <button type="submit">Save Changes</button>
    </form>
</main>

<?php include 'views/layouts/footer.php'; ?>