<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Listing || GallerGavel</title>
    <script src="https://kit.fontawesome.com/42e5148630.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/addnew.css">
    <script>
        function validateForm() {
            var title = document.getElementById("title").value;
            var brand = document.getElementById("brand").value;
            var color = document.getElementById("color").value;
            var gender = document.getElementById("gender").value;
            var price = document.getElementById("price").value;
            var spec = document.getElementById("spec").value;
            var add_info = document.getElementById("add_info").value;
            var images = document.querySelectorAll('input[type="file"]');
            var imagesUploaded = false;
            images.forEach(image => {
                if (image.files.length > 0) {
                    imagesUploaded = true;
                }
            });

            if (title == "" || brand == "" || color == "" || gender == "" || price == "" || spec == "" || add_info == "" || !imagesUploaded) {
                alert("All fields are required and at least one image must be uploaded.");
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="add-box">
        <form enctype="multipart/form-data" action="add.php" method="POST" onsubmit="return validateForm()">
            Title : <input type="text" id="title" name="title" required><br>
            Brand : <select name="brand" id="brand" required>
                <option value="Nike">Nike</option>
                <option value="Adidas">Adidas</option>
                <option value="Asics">Asics</option>
                <option value="Mizuno">Mizuno</option>
                <option value="Newbalance">New Balance</option>
                <option value="Puma">Puma</option>
                <option value="Underarmour">Under Armour</option>
            </select><br>
            Color : <input type="text" id="color" name="color" required><br>
            Gender : <select name="gender" id="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br>
            Category : <select name="cate" id="cate" required>
                <option value="Cushioned">Cushioned / Neutral</option>
                <option value="Spikes">Spikes</option>
            </select><br>
            Price : <input type="text" id="price" name="price" required><br>
            Specifications : <textarea id="spec" name="spec" rows="4" cols="24" required></textarea><br>
            Additional Information : <textarea id="add_info" name="add_info" rows="4" cols="24" required></textarea><br>

            Image 1 (Main) : <input type="file" id="image1" name="image1" accept=".jpg, .jpeg, .png" required><br>
            Image 2 : <input type="file" id="image2" name="image2" accept=".jpg, .jpeg, .png"><br>
            Image 3 : <input type="file" id="image3" name="image3" accept=".jpg, .jpeg, .png"><br>
            Image 4 : <input type="file" id="image4" name="image4" accept=".jpg, .jpeg, .png"><br>
            Image 5 : <input type="file" id="image5" name="image5" accept=".jpg, .jpeg, .png"><br>

            <input type="submit" value="Submit" class="submit"><br>
        </form>
    </div>
</body>

</html>
