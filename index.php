<?php require('includes/header.inc.php'); ?>
<?php require('includes/connection.inc.php'); ?>


<!-- put your content here -->
<div>
    <ul class="cb-slideshow">
        <li><span>Image 01</span>
            <div>
                <h3>ELEGANT</h3>
            </div>
        </li>
        <li><span>Image 02</span>
            <div>
                <h3>QUIETUDE</h3>
            </div>
        </li>
        <li><span>Image 03</span>
            <div>
                <h3>BALANCE</h3>
            </div>
        </li>
        <li><span>Image 04</span>
            <div>
                <h3>EQUANIMITY</h3>
            </div>
        </li>

    </ul>
</div>


<?php require('includes/sub-header.inc.php'); ?>



<!-- DESCRIPTION BRUCRE    -->
<div class="desc">
    <h1 class="descTitle">
        A LUCKNOW BASED ARCHITECTURE FIRM
    </h1>
    <p class="descBody">
        We're a group of architects, designers, engineers and planners coming together to create a
        sustainable world. Our organization- BRUCRE, is responsible for some of the world's most
        technologically and environmentally innovative buildings and large public spaces. Our style is
        strongly inclusive and our interdisciplinary team is a multinational one. Operating through a
        network of innovative studios across the world, we are willing to extend foreign experience at
        the local level. BRUCRE has particular expertise in hospitality, education, leisure, residential
        and commercial design as well as master planning and provide expertise in the associated
        disciplines of architecture, interior design, project management and MEP.
    </p>
</div>
<!-- END - DESCRIPTION BRUCRE    -->





<div class="parallax-container valign-wrapper">
    <div class="row parallax-body">
        <h5 class="parallax-header col s12">A modern responsive front-end framework based on Material Design</h5>
    </div>
    <div class="parallax"><img src="img/4.jpg" alt="Unsplashed background img 2"></div>
</div>

<!-- PROJECTS -->


<div class="row project-title">
    <h1 class="">Projects</h1>

</div>
<div class="row">
    <?php

    $res = mysqli_query($con, " SELECT * FROM projects");
    while ($row = mysqli_fetch_assoc($res)) {


    ?>
        <div class="col s12 m4 l3">
            <div class="card">
                <a href="">
                    <div class="card-image">
                        <img src="media/projects/<?php echo $row['image'] ?>" />
                    </div>
                </a>
                <div class="card-content">
                    <span class="card-title"><?php echo $row['name'] ?></span>
                    <br>

                    <p><?php echo $row['description'] ?></p>
                    <br>
                    <p><?php echo $row['area'] ?></p>
                </div>
                <div class="card-action">
                    <a href="#"><?php echo $row['location'] ?></a>
                </div>
            </div>
        </div>   
        <div class="col s12 m4 l3">
            <div class="card">
                <a href="">
                    <div class="card-image">
                        <img src="media/projects/<?php echo $row['image'] ?>" />
                    </div>
                </a>
                <div class="card-content">
                    <span class="card-title"><?php echo $row['name'] ?></span>
                    <br>

                    <p><?php echo $row['description'] ?></p>
                    <br>
                    <p><?php echo $row['area'] ?></p>
                </div>
                <div class="card-action">
                    <a href="#"><?php echo $row['location'] ?></a>
                </div>
            </div>
        </div>

    <?php } ?>
</div>

<!-- PROJECTS - END -->


<?php require('includes/footer.inc.php'); ?>