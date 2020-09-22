<?php
require('includes/top.inc.php');




$name = '';
$image = '';
$description = '';
$location = '';
$area = '';
$meta_title = '';
$meta_desc = '';
$meta_keyword = '';


$msg = '';
$image_required = 'required';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $image_required = '';
    $id = get_safe_value($con, $_GET['id']);
    $sql = "SELECT * FROM projects WHERE id = '$id'";
    $res = mysqli_query($con, $sql);
    $check = mysqli_num_rows($res);
    if ($check > 0) {

        $row = mysqli_fetch_assoc($res);
        $name = $row['name'];
        $description = $row['description'];
        $location = $row['location'];
        $area = $row['area'];
        $meta_title = $row['meta_title'];
        $meta_desc = $row['meta_desc'];
        $meta_keyword = $row['meta_keyword'];
    } else {
        //header('location:product.php'); 
?>
        <script>
            location.replace("projects.php");
        </script>
<?php
        die();
    }
}
if (isset($_POST['submit'])) {
    $name = get_safe_value($con, $_POST['name']);
    $description = get_safe_value($con, $_POST['description']);
    $location = get_safe_value($con, $_POST['location']);
    $area = get_safe_value($con, $_POST['area']);
    $meta_title = get_safe_value($con, $_POST['meta_title']);
    $meta_desc = get_safe_value($con, $_POST['meta_desc']);
    $meta_keyword = get_safe_value($con, $_POST['meta_keyword']);

    $sql = "SELECT * FROM projects WHERE name = '$name'";
    $res = mysqli_query($con, $sql);
    $check = mysqli_num_rows($res);

    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = "Product already exists!";
            }
        } else {
            $msg = "Product already exists!";
        }
    }
    if ($msg == '') { // File upload configuration 
        $targetDir = "../img/projects/";
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
        $fileNames = array_filter($_FILES['image']['name']);

        if (!empty($fileNames)) {
            foreach ($_FILES['image']['name'] as $key => $val) {
                // File upload path 
                $fileName = basename($_FILES['image']['name'][$key]);
                $targetFilePath = $targetDir . $fileName;

                // Check whether file type is valid 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server 
                    if (move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetFilePath)) {
                        // Image db insert sql 
                        $insertValuesSQL .= "(LAST_INSERT_ID(),'" . $fileName . "', NOW()),";
                    } else {
                        $errorUpload .= $_FILES['image']['name'][$key] . ' | ';
                    }
                } else {
                    $errorUploadType .= $_FILES['image']['name'][$key] . ' | ';
                }
            }
            if (!empty($insertValuesSQL)) {
                $insertValuesSQL = trim($insertValuesSQL, ',');
                // Insert image file name into database 

                //project upload
                mysqli_query($con, "INSERT INTO projects(name,description,location,area,meta_title,meta_desc,meta_keyword,status) VALUES ('$name','$description','$location','$area','$meta_title','$meta_desc','$meta_keyword','1')");

                //image array upload
                $insert = mysqli_query($con, "INSERT INTO images (p_id,file_name, uploaded_on) VALUES $insertValuesSQL");


                if ($insert) {
                    $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
                    $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
                    $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
                    $statusMsg = "Files are uploaded successfully." . $errorMsg;
                    header('location:projects.php');
                    die();
                } else {
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            $statusMsg = 'Please select a file to upload.';
        }

        // Display status message 
        echo $statusMsg;
    }
}
?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Project</strong><small> Form</small></div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="name" class="form-control-label">Project Name</label>
                                <input type="text" name="name" placeholder="Enter Project name" value="<?php echo $name ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-control-label">Image</label>
                                <input type="file" name="image[]" multiple class="form-control" <?php echo $image_required ?>>
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-control-label">Description</label>
                                <textarea name="description" placeholder="Please enter Project Description" class="form-control" required><?php echo $description ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="location" class="form-control-label">Location</label>
                                <textarea name="location" placeholder="Please enter Location" class="form-control" required><?php echo $location ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="area" class="form-control-label">Area</label>
                                <textarea name="area" placeholder="Please enter area" class="form-control" required><?php echo $area ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_title" class="form-control-label">Meta Title</label>
                                <textarea name="meta_title" placeholder="Please enter Meta Title" class="form-control"><?php echo $meta_title ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_desc" class="form-control-label">Meta Description</label>
                                <textarea name="meta_desc" placeholder="Please enter Meta Description" class="form-control"><?php echo $meta_desc ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_keyword" class="form-control-label">Meta Keyword</label>
                                <textarea name="meta_keyword" placeholder="Please enter around 10 Meta Keywords separated by commas " class="form-control"><?php echo $meta_keyword ?></textarea>
                            </div>

                            <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                            <div class="field_error">
                                <?php echo $msg ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('includes/footer.inc.php');
?>