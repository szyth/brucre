<?php
require('includes/top.inc.php');




$name = '';
$image = '';
$description = '';
$location = '';
$area = '';
$meta_tags = '';


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
        $meta_tags = $row['meta_tags'];
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
    $meta_tags = get_safe_value($con, $_POST['meta_tags']);

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
    if ($_FILES['image']['type'] != $image && $_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg') {
        $msg = "Please select only PNG,JPG or JPEG image format";
    }
    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            if ($_FILES['image']['name'] != '') {
                $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], "../img/projects/" . $image);
                $sql = "UPDATE projects SET name='$name',description='$description',location='$location',area='$area',meta_tags='$meta_tags',image='$image' WHERE id='$id'";
            } else {
                $sql = "UPDATE projects SET name='$name',description='$description',location='$location',area='$area',meta_tags='$meta_tags' WHERE id='$id'";
            }
        } else {
            $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "../img/projects/" . $image);
            $sql = "INSERT INTO projects(name,description,location,area,meta_tags,status,image) VALUES ('$name','$description','$location','$area','$meta_tags','1','$image')";
        }
        mysqli_query($con, $sql);
        header('location:projects.php');
        die();
    }
}
?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Product</strong><small> Form</small></div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="name" class="form-control-label">Project Name</label>
                                <input type="text" name="name" placeholder="Enter Project name" value="<?php echo $name ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-control-label">Image</label>
                                <input type="file" name="image" class="form-control" <?php echo $image_required ?>>
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
                                <label for="meta_tags" class="form-control-label">Meta Tags</label>
                                <textarea name="meta_tags" placeholder="Please enter Meta Tags separated by comma" class="form-control"><?php echo $meta_tags ?></textarea>
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