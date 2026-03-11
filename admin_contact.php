<?php
$title = "Admin Panel - Contacts";
require_once 'Include/header.php';
require_once 'database/conn.php';

// Handle delete contact
if (isset($_GET['delete_contact'])) {
    $id = intval($_GET['delete_contact']);
    $crud->deleteContact($id);
    header("Location: admin_contact.php");
    exit;
}

// Handle edit contact form submission
if (isset($_POST['edit_contact'])) {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $crud->editContact($id, $name, $email, $message);
    header("Location: admin_contact.php");
    exit;
}

// Fetch contact details for editing
$editContact = null;
if (isset($_GET['edit_contact'])) {
    $editContact = $crud->getContactDetails(intval($_GET['edit_contact']));
}
?>

<div class="container mt-5">
    <h2>Admin Panel - Manage Contact Submissions</h2>

    <h4>Contact Us Submissions</h4>
    <div style="overflow-x:auto;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $contacts = $crud->getContacts();
        if ($contacts): foreach ($contacts as $contact): ?>
            <tr>
                <td><?= $contact['id'] ?></td>
                <td><?= htmlspecialchars($contact['name']) ?></td>
                <td><?= htmlspecialchars($contact['email']) ?></td>
                <td><?= htmlspecialchars($contact['message']) ?></td>
                <td>
                    <a href="admin_contact.php?edit_contact=<?= $contact['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="admin_contact.php?delete_contact=<?= $contact['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this message?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; else: ?>
            <tr><td colspan="5">No contact submissions found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
    </div>

    <?php if ($editContact): ?>
        <h4>Edit Contact</h4>
        <form method="post" class="mb-4">
            <input type="hidden" name="id" value="<?= $editContact['id'] ?>">
            <div class="mb-2"><label>Name:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($editContact['name']) ?>" required class="form-control">
            </div>
            <div class="mb-2"><label>Email:</label>
                <input type="email" name="email" value="<?= htmlspecialchars($editContact['email']) ?>" required class="form-control">
            </div>
            <div class="mb-2"><label>Message:</label>
                <textarea name="message" required class="form-control"><?= htmlspecialchars($editContact['message']) ?></textarea>
            </div>
            <button type="submit" name="edit_contact" class="btn btn-primary">Update</button>
            <a href="admin_contact.php" class="btn btn-secondary">Cancel</a>
        </form>
    <?php endif; ?>
</div>
<?php require_once 'Include/footer.php'; ?>