<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-grid.css">
        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="js/bootstrap.bundle.js">
        <link rel="stylesheet" href="js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="js/bootstrap.js">
        <link rel="stylesheet" href="js/bootstr.min.js">
    </head>

<body>
    <div class="container-fluid">
                
    <div class="row">
                <div class="col-sm-4">
                <form action="index.php" method="post" enctype="multipart/form-data">

                <h2>Image source </h2>

                <img src="data/images/img1.jpg" class="img-responsive" alt="Cinque Terre" width="530" height="610">
                <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-primary btn-block">
                <input type="submit" value="Upload Image" name="submit" class="btn btn-default btn-block">
                <?php
                $target_dir = "data/images/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    ?>
                    <div class="alert alert-danger">
                    <?php
                        echo "File is not an image.";
                    ?>
                    </div>
                    <?php
                    $uploadOk = 0;
                }
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                    ?>
                    <div class="alert alert-danger">
                    <?php
                        echo "Sorry, file already exists.";
                    ?>
                    </div>
                    <?php
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 50000000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    ?>
                        <div class="alert alert-danger">
                    <?php
                    echo "Sorry, your file was not uploaded.";
                       ?>
                        </div>
                    <?php
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        ?>
                        <div class="alert alert-success">
                            <?php
                                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                            ?>
                        </div>
                        <?php
                        rename("data/images/".basename( $_FILES["fileToUpload"]["name"]), "data/images/img1.jpg");
                    } else {
                        ?>
                        <div class="alert alert-danger">
                            <?php
                                echo "Sorry, there was an error uploading your file.";
                            ?>
                        </div>
                        <?php
                    }
                }
        ?>
    </form>

        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <h2>image apres traitement</h2>
            <div id="auto"></div>
            <script type="text/javascript" src="jquery-1.9.1.min.js"></script>
            <script type="text/javascript">
            $(document).ready( function(){
             $('#auto').load('load.php');
                refresh();
            });
            function refresh()
            {
                setTimeout( function() {
                $('#auto').fadeOut('slow').load('load.php').fadeIn('slow');
                refresh();
                },200);
            }
            </script></div>
        </div>
        

    <!--refrech test -->

</div>
</body>
</html>