<?php
$title = "Admin Panel - Admissions";
require_once 'Include/header.php';
require_once 'database/conn.php';

// Handle delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $crud->deleteAdmission($id);
    header("Location: admin_admission.php");
    exit;
}

// Handle edit form submission
if (isset($_POST['edit_admission'])) {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $fatherName = $_POST['father_name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $grade = $_POST['grade'];
    $religion = $_POST['religion'];
    $nationality = $_POST['nationality'];
    $address = $_POST['address'];
    $contactNumber = $_POST['contact_number'];
    $previousSchool = $_POST['previous_school'];
    $previouslyApplied = $_POST['previously_applied'];
    $email = $_POST['email'];
    $cnic = $_POST['cnic'];
    $crud->editAdmission($id, $name, $fatherName, $gender, $age, $birthday, $grade, $religion, $nationality, $address, $contactNumber, $previousSchool, $previouslyApplied, $email, $cnic);
    header("Location: admin_admission.php");
    exit;
}

// Handle grade filter
$selectedGrade = '';
if (isset($_GET['grade']) && $_GET['grade'] !== '') {
    $selectedGrade = $_GET['grade'];
    $admissions = $crud->getAdmissionsByGrade($selectedGrade);
} else {
    $admissions = $crud->getAdmissions();
}

// If editing, fetch admission details
$editAdmission = null;
if (isset($_GET['edit'])) {
    $editAdmission = $crud->getAdmissionDetails(intval($_GET['edit']));
}
?>

<div class="container mt-5">
    <h2>Admin Panel - Manage Admissions</h2>

    <form method="get" class="mb-4">
        <div class="row g-2 align-items-end">
            <div class="col-auto" style="min-width:220px;">
                <label for="grade" class="form-label">Filter by Grade:</label>
                <select name="grade" id="grade" class="form-select" style="min-width:200px;">
                    <option value="">All Grades</option>
                    <option value="Playgroup" <?= $selectedGrade == 'Playgroup' ? 'selected' : '' ?>>Playgroup</option>
                    <option value="Nursery" <?= $selectedGrade == 'Nursery' ? 'selected' : '' ?>>Nursery</option>
                    <option value="Prep" <?= $selectedGrade == 'Prep' ? 'selected' : '' ?>>Prep</option>
                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <option value="<?= $i ?>" <?= $selectedGrade == (string)$i ? 'selected' : '' ?>><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Show</button>
                <a href="admin_admissions.php" class="btn btn-secondary">Reset</a>
            </div>
        </div>
    </form>

    <?php if ($selectedGrade): ?>
        <div class="alert alert-info mb-3">
            Showing students in Grade <?= htmlspecialchars($selectedGrade) ?> (Total: <?= $admissions ? $admissions->rowCount() : 0 ?>)
        </div>
    <?php endif; ?>

    <?php if ($editAdmission): ?>
        <h4>Edit Admission</h4>
        <form method="post" class="mb-4">
            <input type="hidden" name="id" value="<?= $editAdmission['id'] ?>">
            <div class="mb-2"><label>Name:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($editAdmission['name']) ?>" required class="form-control">
            </div>
            <div class="mb-2"><label>Father Name:</label>
                <input type="text" name="father_name" value="<?= htmlspecialchars($editAdmission['father_name']) ?>" required class="form-control">
            </div>
            <div class="mb-2"><label>Gender:</label>
                <input type="text" name="gender" value="<?= htmlspecialchars($editAdmission['gender']) ?>" required class="form-control">
            </div>
            <div class="mb-2"><label>Age:</label>
                <input type="number" name="age" value="<?= htmlspecialchars($editAdmission['age']) ?>" required class="form-control">
            </div>
            <div class="mb-2"><label>Birthday:</label>
                <input type="date" name="birthday" value="<?= htmlspecialchars($editAdmission['birthday']) ?>" required class="form-control">
            </div>
            <div class="mb-2"><label>Grade:</label>
                <input type="text" name="grade" value="<?= htmlspecialchars($editAdmission['grade']) ?>" required class="form-control">
            </div>
            <div class="mb-2"><label>Religion:</label>
                <input type="text" name="religion" value="<?= htmlspecialchars($editAdmission['religion']) ?>" required class="form-control">
            </div>
            <div class="mb-2"><label>Nationality:</label>
                <input type="text" name="nationality" value="<?= htmlspecialchars($editAdmission['nationality']) ?>" required class="form-control">
            </div>
            <div class="mb-2"><label>Address:</label>
                <input type="text" name="address" value="<?= htmlspecialchars($editAdmission['address']) ?>" required class="form-control">
            </div>
            <div class="mb-2"><label>Contact Number:</label>
                <input type="text" name="contact_number" value="<?= htmlspecialchars($editAdmission['contact_number']) ?>" required class="form-control">
            </div>
            <div class="mb-2"><label>Previous School:</label>
                <input type="text" name="previous_school" value="<?= htmlspecialchars($editAdmission['previous_school']) ?>" class="form-control">
            </div>
            <div class="mb-2"><label>Previously Applied:</label>
                <input type="text" name="previously_applied" value="<?= htmlspecialchars($editAdmission['previously_applied']) ?>" class="form-control">
            </div>
            <div class="mb-2"><label>Email:</label>
                <input type="email" name="email" value="<?= htmlspecialchars($editAdmission['email']) ?>" required class="form-control">
            </div>
            <div class="mb-2"><label>CNIC:</label>
                <input type="text" name="cnic" value="<?= htmlspecialchars($editAdmission['cnic']) ?>" required class="form-control">
            </div>
            <button type="submit" name="edit_admission" class="btn btn-primary">Update</button>
            <a href="admin_admission.php" class="btn btn-secondary">Cancel</a>
        </form>
    <?php endif; ?>

    <h4>All Admissions</h4>
    <div style="overflow-x:auto;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Father Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Birthday</th>
                <th>Grade</th>
                <th>Religion</th>
                <th>Nationality</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Previous School</th>
                <th>Previously Applied</th>
                <th>Email</th>
                <th>CNIC</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($admissions): foreach ($admissions as $admission): ?>
            <tr>
                <td><?= $admission['id'] ?></td>
                <td><?= htmlspecialchars($admission['name']) ?></td>
                <td><?= htmlspecialchars($admission['father_name']) ?></td>
                <td><?= htmlspecialchars($admission['gender']) ?></td>
                <td><?= htmlspecialchars($admission['age']) ?></td>
                <td><?= htmlspecialchars($admission['birthday']) ?></td>
                <td><?= htmlspecialchars($admission['grade']) ?></td>
                <td><?= htmlspecialchars($admission['religion']) ?></td>
                <td><?= htmlspecialchars($admission['nationality']) ?></td>
                <td><?= htmlspecialchars($admission['address']) ?></td>
                <td><?= htmlspecialchars($admission['contact_number']) ?></td>
                <td><?= htmlspecialchars($admission['previous_school']) ?></td>
                <td><?= htmlspecialchars($admission['previously_applied']) ?></td>
                <td><?= htmlspecialchars($admission['email']) ?></td>
                <td><?= htmlspecialchars($admission['cnic']) ?></td>
                <td>
                    <a href="admin_admission.php?edit=<?= $admission['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="admin_admission.php?delete=<?= $admission['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this admission?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; else: ?>
            <tr><td colspan="16">No admissions found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
    </div>
</div>
<?php require_once 'Include/footer.php'; ?>