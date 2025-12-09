<?php 
$pageTitle = 'Shop - Home';
$headerNav = '<a href="index.php?page=admin-login">Admin</a>';
include 'views/layouts/header.php'; 
?>

<main>
    <div class="products">
        <?php foreach ($products as $p): ?>
            <div class="product-card">
                <?php if($p['image'] && file_exists(UPLOAD_DIR . $p['image'])): ?>
                    <img src="<?php echo asset('public/uploads/' . htmlspecialchars($p['image'])); ?>" 
                         alt="<?php echo htmlspecialchars($p['title']); ?>">
                <?php endif; ?>
                <h3><?php echo htmlspecialchars($p['title']); ?></h3>
                <p class="price"><?php echo number_format($p['price'], 2, ',', ' '); ?> BGN</p>
                <p class="description"><?php echo nl2br(htmlspecialchars($p['description'])); ?></p>
            </div>
        <?php endforeach; ?>
        <?php if (empty($products)): ?>
            <p>No products available</p>
        <?php endif; ?>
    </div>
</main>

<?php include 'views/layouts/footer.php'; ?>