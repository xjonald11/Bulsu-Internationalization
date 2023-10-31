<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file for styling -->
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    text-align: center;
}

.gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.image {
    margin: 10px;
    max-width: 300px;
}

.image img {
    width: 100%;
    height: auto;
}

</style>
<body>
    <h1>Photo Gallery</h1>
    
    <div class="gallery">
        <div class="image">
            <img src="image1.jpg" alt="Image 1">
        </div>
        <div class="image">
            <img src="image2.jpg" alt="Image 2">
        </div>
        <div class="image">
            <img src="image3.jpg" alt="Image 3">
        </div>
        <!-- Add more images as needed -->
    </div>
</body>
</html>
