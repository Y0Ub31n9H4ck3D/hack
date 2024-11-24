<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto</title>
</head>

<body>
    <h2>Upload Foto</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="fileUpload">Pilih Foto untuk Diunggah:</label>
        <input type="file" name="fileToUpload" id="fileUpload" required>
        <input type="submit" value="Upload Foto" name="submit">
    </form>
</body>

</html>