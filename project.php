<?php require('includes/header.inc.php');


$id = $_GET['id'];
$sql = "SELECT * FROM projects WHERE id='$id'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);

?>
<div id="project_details">
    <div class="project-title">
        <a href="all_projects.php">
            <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>
            <!-- <i class="fa fa-arrow-left" aria-hidden="true"></i> -->
        </a>
        <h1 class=""><?php echo $row['name'] ?></h1>

    </div>

    <!-- parallax -->
    <div class="parallax-container valign-wrapper">
        <div class="parallax"><img src="img/projects/<?php echo $row['image'] ?>"></div>
    </div>
    <div class="row">
        <div class="col s12 l8 overview">
            <h1>Overview</h1>
            <p>
                <?php echo $row['description'] ?>
            </p>
        </div>
        <div class="col s12 l4 details">
            <h1>Project Details</h1>
            <p>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>Name:
                <?php echo $row['name'] ?>
            </p>
            <p>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>Location:
                <?php echo $row['location'] ?>
            </p>
            <p>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>Description:
                <?php echo $row['description'] ?>
            </p>
            <p>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>Area:
                <?php echo $row['area'] ?>
            </p>
        </div>
    </div>

</div>

<div id="carousel-container">
    <div class="carousel carousel-slider">
        <?php
        $res = mysqli_query($con, " SELECT * FROM projects");
        while ($row = mysqli_fetch_assoc($res)) {
        ?>
            <a class="carousel-item" href="#one!"><img src="img/projects/<?php echo $row['image'] ?>"></a>
        <?php } ?>
    </div>
</div>


<?php require('includes/sub-header.inc.php'); ?>
<?php require('includes/footer.inc.php'); ?>