<?php 
$pageTitle = 'Admin Dashboard';
$headerNav = '<a href="index.php?page=home">Home</a> | 
              <a href="index.php?page=admin-dashboard">Dashboard</a> | 
              <a href="index.php?page=admin-add">Add Product</a> | 
              <a href="index.php?page=admin-logout">Logout</a>';
include 'views/layouts/header.php'; 
?>

<main style="max-width:1200px;margin:40px auto;">
    <div class="dashboard-header">
        <h2 style="margin:0; color:#2c3e50;">Product Management</h2>
        <a href="index.php?page=admin-add" class="btn btn-primary">+ Add New Product</a>
    </div>
    
    <?php if (empty($products)): ?>
        <div class="empty-state">
            <p>No products yet. Start by adding your first product!</p>
            <a href="index.php?page=admin-add" class="btn btn-primary">Add Product</a>
        </div>
    <?php else: ?>
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $p): ?>
                    <tr>
                        <td><?php echo $p['id']; ?></td>
                        <td>
                            <?php if ($p['image']): ?>
                                <img src="<?php echo htmlspecialchars(asset('public/uploads/' . $p['image'])); ?>" 
                                     style="height: 150px;" 
                                     class="table-thumbnail" 
                                     alt="<?php echo htmlspecialchars($p['title']); ?>">
                            <?php else: ?>
                                <div class="no-image">No image</div>
                            <?php endif; ?>
                        </td>
                        <td><strong><?php echo htmlspecialchars($p['title']); ?></strong></td>
                        <td class="price-cell"><?php echo number_format($p['price'], 2, '.', ' '); ?> BGN</td>
                        <td class="actions-cell">
                            <a href="index.php?page=admin-edit&id=<?php echo $p['id']; ?>" 
                               class="btn-action btn-edit">Edit</a>
                            <a href="index.php?page=admin-delete&id=<?php echo $p['id']; ?>" 
                               class="btn-action btn-delete"
                               onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</main>

<?php include 'views/layouts/footer.php'; ?>