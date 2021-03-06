<?php
require('includes/top.inc.php');

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);


    if ($type == "delete") {
        $id = get_safe_value($con, $_GET['id']);
        $sql_delete_status = "DELETE FROM career WHERE id='$id'";
        mysqli_query($con, $sql_delete_status);
    }
}


$sql = "SELECT * FROM career ORDER BY id DESC";
$res = mysqli_query($con, $sql);
?>


<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Career Form </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Position</th>
                                        <th>CV</th>
                                        <th>Introduction</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <tr>
                                            <td class="serial"><?php echo $i ?></td>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['number'] ?></td>
                                            <td><?php echo $row['position'] ?></td>
                                            <td>
                                                <a href="../img/cv/<?php echo $row['cv'] ?>"><?php echo $row['cv'] ?></a>
                                          
                                            </td>
                                            <td><?php echo $row['introduction'] ?></td>
                                            <td><?php echo $row['added_on'] ?></td>
                                            <td>
                                                <?php
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