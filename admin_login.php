<?php
$title = "Admin Panel - Logins";
require_once 'Include/header.php';
require_once 'database/conn.php';

// Handle delete login
if (isset($_GET['delete_login'])) {
    $id = intval($_GET['delete_login']);
    $crud->deleteLogin($id);
    header("Location: admin_login.php");
    exit;
}

// Handle edit login form submission
if (isset($_POST['edit_login'])) {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $cnic = $_POST['cnic'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $crud->editLogin($id, $name, $cnic, $email, $password);
    header("Location: admin_login.php");
    exit;
}

// Fetch login details for editing
$editLogin = null;
if (isset($_GET['edit_login'])) {
    $editLogin = $crud->getLoginDetails(intval($_GET['edit_login']));
}
?>

<div class="container mt-5">
    <h2>Admin Panel - Manage Logins</h2>

    <h4>Login Details</h4>
    <div style="overflow-x:auto;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>CNIC</th>
                <th>Email</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $logins = $crud->getLogins();
        if ($logins): foreach ($logins as $login): ?>
            <tr>
                <td><?= $login['id'] ?></td>
                <td><?= htmlspecialchars($login['name']) ?></td>
                <td><?= htmlspecialchars($login['cnic']) ?></td>
                <td><?= htmlspecialchars($login['email']) ?></td>
                <td><?= htmlspecialchars($login['password']) ?></td>
                <td>
                    <a href="admin_login.php?edit_login=<?= $login['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="admin_login.php?delete_login=<?= $login['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this user?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; else: ?>
            <tr><td colspan="6">No login details found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
    </div>

    <?php if ($editLogin): ?>
        <h4>Edit Login</h4>
        <form method="post" class="mb-4">
            <input type="hidden" name="id" value="<?= $editLogin['id'] ?>">
            <div class="mb-2"><label>Name:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($editLogin['name']) ?>" required class="form-control">
            </div>
            <div class="mb-2"><label>CNIC:</label>
                <input type="text" name="cnic" value="<?= htmlspecialchars($editLogin['cnic']) ?>" required class="form-control">
            </div>
            <div class="mb-2"><label>Email:</label>
                <input type="email" name="email" value="<?= htmlspecialchars($editLogin['email']) ?>" required class="form-control">
            </div>
            <div class="mb-2"><label>Password:</label>
                <input type="text" name="password" value="<?= htmlspecialchars($editLogin['password']) ?>" required class="form-control">
            </div>
            <button type="submit" name="edit_login" class="btn btn-primary">Update</button>
            <a href="admin_login.php" class="btn btn-secondary">Cancel</a>
        </form>
    <?php endif; ?>
</div>
<?php require_once 'Include/footer.php'; ?>