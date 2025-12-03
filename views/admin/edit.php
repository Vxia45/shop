<?php 
$pageTitle = 'Edit Product';
$headerNav = '<a href="/">Home</a> | <a href="/admin/dashboard">Dashboard</a> | 
              <a href="/admin/logout">Logout</a>';
include 'views/layouts/header.php'; 
?>

<main style="max-width:600px;margin:20px auto;">
    <h2>Edit Product</h2>
    <form method="post" action="/admin/edit?id=<?php echo $product['id']; ?>" enctype="multipart/form-data">
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
                <img src="/public/uploads/<?php echo $product['image']; ?>" style="height:80px;">
            </p>
        <?php endif; ?>

        <label>New Image (optional)<br><input type="file" name="image"></label><br><br>

        <button type="submit">Save Changes</button>
    </form>
</main>

<?php include 'views/layouts/footer.php'; ?>