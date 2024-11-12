<!-- dashboard.php -->
<?php include 'posts.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="header">
        <h1>Welcome to Blog Dashboard</h1>
        <a href="logout.php" class="op">Logout</a>
    </div>
    <div class="post-container">
        <h2>Create blog</h2>
        <form method="POST" action="posts.php">
            <input type="text" name="title" placeholder="Post Title" required><br>
            <textarea name="content" placeholder="Post Content" required></textarea><br>
            <button type="submit" name="create">Create new blog</button>
        </form>

        <h2>All blogs</h2>
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <h3><?php echo $post['title']; ?></h3>
                <p><?php echo $post['content']; ?></p>
                <a href="edit.php?id=<?php echo $post['id']; ?>">Edit</a> | 
                <a href="posts.php?delete=<?php echo $post['id']; ?>">Delete</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
