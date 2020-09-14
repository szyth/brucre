<?php require('includes/header.inc.php');

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $message = mysqli_real_escape_string($con, $_POST['message']);
    date_default_timezone_set('Asia/Kolkata');
    $added_on = date('Y-m-d h:i:s');


    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {




        $sql = "INSERT INTO career(name,email,subject,message,added_on) VALUES('$name','$email','$subject','$message','$added_on')";
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
           
            <form method="POST">
                <p>Get in Contact</p>
                <br>
                <input placeholder='Name' type='text' name="name">
                <input placeholder='Email' type='email' name="email">
                <input placeholder='Subject' type='text' name="subject">
                <textarea placeholder='Message' rows='4' name="message"></textarea>
                <input placeholder='Send' type='submit' name="submit">
            </form>
        </div>
    </div>
</div>


<?php require('includes/sub-header.inc.php'); ?>
<?php require('includes/footer.inc.php'); ?>