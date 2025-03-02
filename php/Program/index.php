<?php
require_once 'Baju.php';

session_start();

/// Inisialisasi daftar produk jika belum ada
if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
    $_SESSION['products'] = [
        new Baju(1, "Sweater Anjing", 10, 120000, "../images/sweater_anjing.png", "Pakaian", "Katun", "Merah", "Anjing", "M", "DogFashion"),
        new Baju(2, "Rompi Kucing", 8, 95000, "../images/rompi_kucing.png", "Pakaian", "Wol", "Biru", "Kucing", "S", "MeowWear"),
        new Baju(3, "Jaket Anjing", 5, 150000, "../images/jaket_anjing.png", "Pakaian", "Jeans", "Hitam", "Anjing", "L", "PawStyle"),
        new Baju(4, "Kaos Kucing", 12, 75000, "../images/kaos_kucing.png", "Pakaian", "Katun", "Kuning", "Kucing", "M", "FurryTrend"),
        new Baju(5, "Hoodie Anjing", 7, 180000, "../images/hoodie_anjing.png", "Pakaian", "Fleece", "Abu-abu", "Anjing", "XL", "CozyPet")
    ];
}

// Reset session jika tombol reset ditekan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset_session'])) {
    session_destroy();
    session_start();
    $_SESSION['products'] = [];
    header("Location: ".$_SERVER['PHP_SELF']); // Refresh halaman setelah reset
    exit();
}

// Fungsi untuk menambahkan produk baru
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $id = count($_SESSION['products']) + 1;
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $jenis = $_POST['jenis'] ?? '';
    $bahan = $_POST['bahan'] ?? '';
    $warna = $_POST['warna'] ?? '';
    $untuk = $_POST['untuk'] ?? '';
    $size = $_POST['size'] ?? '';
    $merk = $_POST['merk'] ?? '';
    
    // Upload gambar
    $photo = '';
    $targetDir = "../images/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    if (!empty($_FILES['image']['name'])) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = mime_content_type($_FILES['image']['tmp_name']);
        if (in_array($fileType, $allowedTypes)) {
            $photo = $targetDir . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $photo);
        }
    }
    
    $product = new Baju($id, $name, $stock, $price, $photo, $jenis, $bahan, $warna, $untuk, $size, $merk);
    
    $_SESSION['products'][] = $product;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shop</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color:rgb(255, 255, 255); text-align: center; }
        .container { max-width: 900px; margin: auto; background-color:rgb(209, 209, 209) ; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .product { display: inline-block; width: 250px; margin: 10px; padding: 15px; border-radius: 10px; background: #fff; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); text-align: center; }
        img { width: 100%; height: auto; border-radius: 10px; }
        .add-form { display: none; margin-top: 10px; }
        button{ padding: 10px 16px; border: none; cursor: pointer; border-radius: 8px;font-size: 16px; font-weight: bold; transition: all 0.3s ease-in-out; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);}
        .add-btn { background: #2ecc71; color: white; }
        .adding-btn { background:rgb(255, 255, 255);}
        .add-btn:hover { background: #27ae60; transform: scale(1.05); }
        .adding-btn:hover { background:rgb(255, 255, 255); transform: scale(1.05); }
        .reset-btn {
            background: #ff4d4d;
            color: white;
        }

        .reset-btn:hover {
            background: #cc0000;
            transform: scale(1.05);
        }
        input, select { padding: 8px; margin: 5px 0; width: calc(100%-25px); border: 1px solid #ddd; border-radius: 5px; }
    </style>
    <script>
        function toggleAddForm() {
            var form = document.getElementById('add-form');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Pet Shop</h1>
        
        <form method="POST">
            <button type="submit" name="reset_session" class="reset-btn">Reset Data</button>
        </form>
        
        <h2>Add Product</h2>
        <button class="add-btn" onclick="toggleAddForm()">Add Product</button>
        <form method="POST" enctype="multipart/form-data" id="add-form" class="add-form">
            <input type="text" name="name" placeholder="Product Name" required>
            <input type="number" name="price" placeholder="Price" required>
            <input type="number" name="stock" placeholder="Stock" required>
            <select name="jenis" required>
                <option value="Pakaian">Pakaian</option>
            </select>
            <input type="text" name="bahan" placeholder="Bahan">
            <input type="text" name="warna" placeholder="Warna">
            <select name="untuk" required>
                <option value="" disabled selected>Pet</option>
                <option value="Anjing">Anjing</option>
                <option value="Kucing">Kucing</option>
            </select>
            <select nname="size" required>
                <option value="" disabled selected>Size</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select>
            <input type="text" name="merk" placeholder="Merk">
            <input type="file" name="image" required>
            <button type="submit" class="adding-btn" name="add_product">Add</button>
        </form>
        
        <h2>Product List</h2>
        <div>
            <?php foreach ($_SESSION['products'] as $product): ?>
                <div class="product">
                    <img src="<?php echo $product->getPhoto(); ?>" alt="<?php echo $product->getName(); ?>">
                    <p><strong><?php echo $product->getName(); ?></strong></p>
                    <p>Stock: <?php echo $product->getStock(); ?></p>
                    <p>Price: Rp.<?php echo number_format($product->getPrice(), 0, ',', '.'); ?></p>
                    <p>Jenis: <?php echo $product->getJenis(); ?></p>
                    <p>Bahan: <?php echo $product->getBahan(); ?></p>
                    <p>Warna: <?php echo $product->getWarna(); ?></p>
                    <p>Untuk: <?php echo $product->getUntuk(); ?></p>
                    <p>Size: <?php echo $product->getSize(); ?></p>
                    <p>Merk: <?php echo $product->getMerk(); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
