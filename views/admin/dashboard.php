<?php 
$pageTitle = 'Admin Dashboard';
$headerNav = '<a href="index.php?page=home">Home</a> | 
              <a href="index.php?page=admin-dashboard">Dashboard</a> | 
              <a href="index.php?page=admin-add">Add Product</a> | 
              <a href="index.php?page=admin-logout">Logout</a>';
include 'views/layouts/header.php'; 
?>

<main style="max-width:1000px;margin:20px auto;">
    <h2>Products</h2>
    <table border="1" cellpadding="6" cellspacing="0" style="width:100%; background:#fff;">
        <tr>
            <th>ID</th><th>Title</th><th>Price</th><th>Image</th><th>Actions</th>
        </tr>
        <?php foreach ($products as $p): ?>
        <tr>
            <td><?php echo $p['id']; ?></td>
            <td><?php echo htmlspecialchars($p['title']); ?></td>
            <td><?php echo number_format($p['price'], 2, ',', ' '); ?> лв.</td>
            <td>
                <?php if ($p['image']): ?>
                    <img src="public/uploads/<?php echo $p['image']; ?>" style="height:50px;">
                <?php endif; ?>
            </td>
            <td>
                <a href="index.php?page=admin-edit&id=<?php echo $p['id']; ?>">Edit</a> |
                <a href="index.php?page=admin-delete&id=<?php echo $p['id']; ?>" 
                   onclick="return confirm('Delete product?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>

<?php include 'views/layouts/footer.php'; ?>