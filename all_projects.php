<?php require('includes/header.inc.php'); ?>


<div class="project-title">
    <h1 class="">All Projects</h1>

</div>
<div class="row">
    
    <?php
    $res = mysqli_query($con, " SELECT * FROM projects");
    while ($row = mysqli_fetch_assoc($res)) {
    ?>


        <div class="col s12 m4 l3">
            <a href="project.php?id=<?php echo $row['id'] ?>">
                <div class="card">
                    <div class="card-image">
                        <img src="img/projects/<?php echo $row['image'] ?>" />
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