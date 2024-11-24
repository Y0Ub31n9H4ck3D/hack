<?php
$target_dir = "uploads/";  // Folder untuk menyimpan file
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Cek apakah file adalah gambar
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File adalah gambar - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.<br>";
        $uploadOk = 0;
    }
}

// Cek apakah file sudah ada
if (file_exists($target_file)) {
    echo "Maaf, file sudah ada.<br>";
    $uploadOk = 0;
}

// Batasi ukuran file maksimum (misalnya 5MB)
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Maaf, file terlalu besar.<br>";
    $uploadOk = 0;
}

// Hanya izinkan format gambar tertentu
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Maaf, hanya format JPG, JPEG, PNG, dan GIF yang diizinkan.<br>";
    $uploadOk = 0;
}

// Jika semuanya oke, coba unggah file
if ($uploadOk == 0) {
    echo "Maaf, file tidak bisa diunggah.<br>";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "File ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " berhasil diunggah.<br>";
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file.<br>";
    }
}
?>