<?php
require_once '../../app/Classes/VehicleManager.php';

$vehicleManager = new VehicleManager('', '', '', '');
$vehicleManager->setFilePath(__DIR__ . '/../../data/vehicles.json');

$id = $_GET['id'];

if ($id == null) {
    header('Location: ../index.php');
    exit;
}

$vehicles = $vehicleManager->getVehicles();
$vehicle = $vehicles[$id] ?? null;

if ($vehicle === null) {
    header('Location: ../index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicleManager->editVehicle($id,[
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'price' => $_POST['price'],
        'image' => $_POST['image']
    ]);
    header('Location: ../index.php');
    exit;
}



include "./header.php";
?>

    <div class="container my-4">
        <h1>Edit Vehicle</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?= $vehicle['name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="vehicle-type" class="form-label">Vehicle Type</label>
                <input type="text" class="form-control" name="type" value="<?= $vehicle['type'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" value="<?= $vehicle['price'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">Image URL</label>
                <input type="url" class="form-control" name="image" value="<?= $vehicle['image'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Vehicle</button>
            <a href="../index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

</body>

</html>