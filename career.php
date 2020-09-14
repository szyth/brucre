<?php require('includes/header.inc.php');

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $position = mysqli_real_escape_string($con, $_POST['position']);
    $introduction = mysqli_real_escape_string($con, $_POST['introduction']);
    date_default_timezone_set('Asia/Kolkata');
    $added_on = date('Y-m-d h:i:s');


    if (!empty($name)) {


        $cv = rand(111111111, 999999999) . '_' . $_FILES['cv']['name'];
        move_uploaded_file($_FILES['cv']['tmp_name'], "img/cv/" . $cv);

        $sql = "INSERT INTO career(name,email,number,position,cv,introduction,added_on) VALUES('$name','$email','$number','$position','$cv','$introduction','$added_on')";
        $res = mysqli_query($con, $sql);


?>
        <script>
            alert("Thank You for contacting us! ")
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Please fill all fields")
        </script>
<?php
    }
}


?>
<div class="parallax-container valign-wrapper">
    <div class="parallax"><img src="img/slider/4.jpg"></div>
</div>

<div id='browser'>
    <div id='browser-bar'>
        <div class='circles'></div>
        <div class='circles'></div>
        <div class='circles'></div>
        <p>Career Form</p>
        <span class='arrow entypo-resize-full'></span>
    </div>
    <div id='content'>
        <br>
        <div id='right'>

            <form method="POST" style="border: none" enctype="multipart/form-data">
                <label for="name">Your Name</label><input type='text' id="name" name="name">
                <label for="email">Your Email Address</label><input type='email' id="email" name="email">
                <label for="number">Your Mobile Number</label><input type='tel' id="number" name="number">
                <label for="position">Position you want to apply</label><input type='text' id="position" name="position">
                <label for="files">Upload Your CV</label><input type="file" id="files" name="cv" class="hidden" />

                <label for="introduction">Your Introduction</label><textarea rows='4' id="introduction" name="introduction"></textarea>
                <label for="">All fields are mandatory</label>
                <input placeholder='Send' type='submit' name="submit">
            </form>
        </div>
    </div>
</div>


<?php require('includes/sub-header.inc.php'); ?>
<?php require('includes/footer.inc.php'); ?>