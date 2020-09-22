<?php
require('includes/top.inc.php');

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);

    if ($type == 'status') {

        $operation = get_safe_value($con, $_GET['operation']);
        $id = get_safe_value($con, $_GET['id']);

        if ($operation == 'active') {
            $status = '1';
        } else if ($operation == 'deactive') {
            $status = '0';
        } else {
            echo "Wrong Input";
        }

        $sql_update_status = "UPDATE projects SET status='$status' WHERE id='$id'";
        mysqli_query($con, $sql_update_status);
    }
    if ($type == "delete") {
        $id = get_safe_value($con, $_GET['id']);
        mysqli_query($con, "DELETE FROM projects WHERE id='$id'");
        $res = mysqli_query($con, "SELECT * FROM images WHERE p_id='$id'");
        while ($row = mysqli_fetch_assoc($res)) {
            unlink("../img/projects/" . $row['file_name']);
        }
        mysqli_query($con, "DELETE FROM images WHERE p_id='$id'");
    }
}


$sql = "SELECT * FROM projects ORDER BY id DESC";
$res = mysqli_query($con, $sql);
?>


<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Projects </h4>
                        <h4 class="box-link"><a href="manage_project.php"><span class='badge badge-danger'>Click to add Projects</span></a></h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Location</th>
                                        <th>Area</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <tr>
                                            <td class="serial"><?php echo $i++ ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <?php

                                            $img = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM images WHERE p_id = '" . $row['id'] . "'"));
                                            ?>
                                            <td><img src="<?php echo "../img/projects/" . $img['file_name'] ?>" /></td>

                                            <td><?php echo $row['description'] ?></td>
                                            <td><?php echo $row['location'] ?></td>
                                            <td><?php echo $row['area'] ?></td>
                                            <td>
                                                <?php
                                                if ($row['status'] == 1) {
                                                    echo " <a href='?type=status&operation=deactive&id=" . $row['id'] . "'><span class='badge badge-complete'>Active</span></a>&nbsp;";
                                                } else {
                                                    echo " <a href='?type=status&operation=active&id=" . $row['id'] . "'><span class='badge badge-pending'>Deactive</span></a>&nbsp;";
                                                }

                                                echo "<a href='?type=delete&id=" . $row['id'] . "'><span class='badge badge-danger'>Delete</span></a>";
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('includes/footer.inc.php');
?>