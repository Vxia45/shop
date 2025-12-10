<?php 
$pageTitle = 'Edit Product';
$headerNav = '<a href="index.php?page=home">Home</a> | 
              <a href="index.php?page=admin-dashboard">Dashboard</a> | 
              <a href="index.php?page=admin-logout">Logout</a>';
include 'views/layouts/header.php'; 
?>

<main style="max-width:700px;margin:40px auto;">
    <div class="admin-card">
        <h2 style="margin-top:0; color:#2c3e50;">Edit Product</h2>
        
        <form method="post" action="index.php?page=admin-edit&id=<?php echo $product['id']; ?>" enctype="multipart/form-data" class="product-form">
            
            <div class="form-group">
                <label for="title">Product Title</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($product['title']); ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="5"><?php echo htmlspecialchars($product['description']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price (BGN)</label>
                <input type="number" id="price" name="price" step="0.01" value="<?php echo $product['price']; ?>" required>
            </div>

            <?php if ($product['image']): ?>
                <div class="form-group">
                    <label>Current Image</label>
                    <div class="current-image-preview">
                        <img src="<?php echo asset('public/uploads/' . $product['image']); ?>"
                        style="height:200px;"
                         alt="Current product image">
                    </div>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="image">
                    <?php echo $product['image'] ? 'Upload New Image (optional)' : 'Upload Image'; ?>
                </label>
                <input type="file" id="image" name="image" accept="image/*">
                <small style="display:block; margin-top:5px; color:#666;">Accepted formats: JPG, PNG, GIF</small>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="index.php?page=admin-dashboard" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</main>

<?php include 'views/layouts/footer.php'; ?>