<?php require('includes/header.inc.php'); ?>


<div class="project-title">
    <h1 class="">All Projects</h1>

</div>
<div class="row">

    <?php
    $res = mysqli_query($con, " SELECT * FROM projects  WHERE status='1'");
    while ($row = mysqli_fetch_assoc($res)) {
        $img = mysqli_fetch_assoc(mysqli_query($con, " SELECT * FROM images WHERE status='1' AND p_id = '" . $row['id'] . "'"))

    ?>


        <div class="col s12 m4 l3">
            <a href="project.php?id=<?php echo $row['id'] ?>">
                <div class="card">
                    <div class="card-image">
                        <img src="img/projects/<?php echo $img['file_name'] ?>" />
                    </div>
                    <div class="card-content">
                        <span class="card-title"><?php echo $row['name'] ?></span>
                        <br>
                        <p><?php echo $row['location'] ?></p>
                    </div>
                </div>
            </a>
        </div>


    <?php } ?>


</div>

<?php require('includes/sub-header.inc.php'); ?>
<?php require('includes/footer.inc.php'); ?>