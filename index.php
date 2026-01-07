<?php
$inventoryFile = "inventory.txt";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $qty = $_POST["quantity"];
    file_put_contents($inventoryFile, "$name,$qty\n", FILE_APPEND);
}

$items = file_exists($inventoryFile) ? file($inventoryFile) : [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory Manager</title>
</head>
<body>

<h2>Add Product</h2>
<form method="post">
    <input name="name" placeholder="Product name" required>
    <input name="quantity" type="number" placeholder="Quantity" required>
    <button type="submit">Add</button>
</form>

<h2>Inventory List</h2>
<ul>
<?php foreach ($items as $item): 
    list($n, $q) = explode(",", trim($item));
?>
    <li><?php echo $n . " : " . $q; ?></li>
<?php endforeach; ?>
</ul>

</body>
</html>
