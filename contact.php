<?php require('includes/header.inc.php');

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $message = mysqli_real_escape_string($con, $_POST['message']);


    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {




        $sql = "INSERT INTO contact_us(name,email,subject,message) VALUES('$name','$email','$subject','$message')";
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


<div id='browser'>
    <div id='browser-bar'>
        <div class='circles'></div>
        <div class='circles'></div>
        <div class='circles'></div>
        <p>Contact Us</p>
        <span class='arrow entypo-resize-full'></span>
    </div>
    <div id='content'>
        <br>
        <div id='right'>
            <p>Connect</p>
            <br>
            <div id='social'>
                <a href="https://www.facebook.com/Brucre-Collaboration-109421650808666/" class='social fa fa-facebook'>
                </a>
                <a href="https://www.instagram.com/brucre_collab/?hl=en" class='social fa fa-linkedin'>
                </a>
                <a href="https://www.linkedin.com/company/brucre" class='social fa fa-instagram'>
                </a>
            </div>
            <form method="POST">
                <p>Get in Contact</p>
                <br>
                <input placeholder='Name' type='text' name="name">
                <input placeholder='Email' type='email' name="email">
                <input placeholder='Subject' type='text' name="subject">
                <textarea placeholder='Message' rows='4' name="message"></textarea>
                <input placeholder='Send' type='submit' name="submit">
            </form>
            <p>other way</p>
            <p class='other entypo-mail'>
                <a href='#'>suhailsiddique2000@gmail.com</a>
            </p>
            <p class='other entypo-phone'>(+91) 91400 59529</p>
        </div>
    </div>
</div>


<?php require('includes/sub-header.inc.php'); ?>
<?php require('includes/footer.inc.php'); ?>