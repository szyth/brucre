<?php require('includes/header.inc.php'); ?>

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
    <div class="parallax"><img src="img/slider/4.jpg"></div>
</div>

<!-- PROJECTS -->


<div id="project" class="project-title">
    <h1 class="">Project Experience</h1>

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
<div class="project_loadmore">
    <a href="all_projects.php">VIEW MORE...</a>
</div>

<!-- PROJECTS - END -->



<!-- SERVICES -->
<div id="service-index">
    <div class="service-title">
        <h1 class="">Our Services</h1>
    </div>
    <div class="row">
        <div class="col s12  l6">
            <div class="service_body">
                <h1>Architectural Design</h1>

                <p>Our architects use their creativity to engage their audience creating a meaningful dialogue
                    between the natural and built environment, between culture and innovation, form and
                    function. Through our integrated work approach we create designs that address the specific
                    needs and identities of the intended users, integrating cultural context and lasting value.
                </p>
            </div>
        </div>
        <div class="col s12 l6 img-fit">
            <img src="img/service/1.jpg" alt="">
        </div>
        <div class="show-on-large">
            <div class="col s12 l6 img-fit">
                <img src="img/service/2.jpg" alt="">
            </div>

            <div class="col s12 l6">
                <div class="service_body">
                    <h1>Interior Design</h1>

                    <p>Our interior designers along with our in-house technical specialists create spaces that
                        connect with the user both aesthetically and functionally. The spaces are intuitive, simple
                        and humanized. We uniquely offer a 360° fully integrated interior design service that
                        provides end-to-end workplace solutions, which includes branding, MEP, AV, IT,
                        sustainability, security, and employee wellness. At every stage, we work in collaboration
                        with our clients offering high value consulting advice to create innovative spaces
                        accurately reflect a company's brand values and culture.

                    </p>
                </div>
            </div>
        </div>
        <div class="show-on-small">
            <div class="col s12 l6">
                <div class="service_body">
                    <h1>Interior Design</h1>

                    <p>Our interior designers along with our in-house technical specialists create spaces that
                        connect with the user both aesthetically and functionally. The spaces are intuitive, simple
                        and humanized. We uniquely offer a 360° fully integrated interior design service that
                        provides end-to-end workplace solutions, which includes branding, MEP, AV, IT,
                        sustainability, security, and employee wellness. At every stage, we work in collaboration
                        with our clients offering high value consulting advice to create innovative spaces
                        accurately reflect a company's brand values and culture.

                    </p>
                </div>
            </div>
            <div class="col s12 l6 img-fit">
                <img src="img/service/2.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<div class="parallax-container valign-wrapper">
    <div class="row parallax-body">
        <h5 class="parallax-header col s12">A modern responsive front-end framework based on Material Design</h5>
    </div>
    <div class="parallax"><img src="img/slider/1.jpg"></div>
</div>
<div id="service-index">
    <div class="row">
        <div class="col s12 l6">
            <div class="service_body service_project_mgmt">
                <h1>Project Management</h1>
                <p>Construction is one of the most challenging endeavours. Through our effective project
                    management we control and deliver construction projects within speculated time and cost
                    target. BRUCRE has highly experienced and seasoned professionals who have eyes for detail
                    and workmanship. We do all this while maintaining strict safety protocols. We act as the
                    Single Point Contact for client saving the hassle of dealing with number of agencies,
                    vendors and contractors. Our teams put paramount focus on Time, Cost and Quality adding
                    value to your projects.
                </p>
            </div>
        </div>
        <div class="col s12 l6 img-fit"> <img src="img/service/3.jpeg" alt="">
        </div>
        <div class="show-on-large">
            <div class="col s12 l6 img-fit"> <img src="img/service/4.jpg" alt="">
            </div>
            <div class="col s12 l6">

                <div class="service_body">
                    <h1>Turnkey Development</h1>
                    <p>From construction to handover and everything in between we do all and we do it fast. We
                        develop and construct properties based on our client’s needs. Acting as Single Point Contact
                        we deliver the projects to our clients meeting highest of quality standards, exceeding the
                        expectations. BRUCRE has amazing teams of highly experienced and seasoned professionals who
                        have eyes for details and workmanship required to create architecture marvels. Our approach
                        is to constantly challenge conventional thinking and relentlessly push for smarter, faster
                        and more efficient ways to deliver while always working with integrity to ensure we uphold
                        high ethical standards on every project. Integrity and transparency, Engineering innovation
                        and sustainability, Quality and service excellence, are most definitely the foundations on
                        which everything resides. We are proud to be one of the best for transparent work ethics,
                        safety performance and quality standards.
                    </p>


                </div>
            </div>
        </div>
        <div class="show-on-small">
            <div class="col s12 l6">
                <div class="service_body">
                    <h1>Turnkey Development</h1>
                    <p>From construction to handover and everything in between we do all and we do it fast. We
                        develop and construct properties based on our client’s needs. Acting as Single Point Contact
                        we deliver the projects to our clients meeting highest of quality standards, exceeding the
                        expectations. BRUCRE has amazing teams of highly experienced and seasoned professionals who
                        have eyes for details and workmanship required to create architecture marvels. Our approach
                        is to constantly challenge conventional thinking and relentlessly push for smarter, faster
                        and more efficient ways to deliver while always working with integrity to ensure we uphold
                        high ethical standards on every project. Integrity and transparency, Engineering innovation
                        and sustainability, Quality and service excellence, are most definitely the foundations on
                        which everything resides. We are proud to be one of the best for transparent work ethics,
                        safety performance and quality standards.
                    </p>


                </div>
            </div>
            <div class="col s12 l6 img-fit"> <img src="img/service/4.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<!-- SERVICES - END -->


<?php require('includes/footer.inc.php'); ?>