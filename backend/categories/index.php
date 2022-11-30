<?php

$sehifeLink = "route=categories&";
$sql = "SELECT * FROM `categories`";

$Limit = 10;

include "../includes/pagination_head.php";
?>
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <?php
            errorAlert();
            successAlert

();
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-primary"><strong>Categories</strong></h3>
                            <a class="btn btn-primary my-2 float-right" href="?route=categories/create">Create</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Is Menu</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $sql = "SELECT * FROM `categories` LIMIT $goster, $Limit";
                                $result = $db->selectAll($sql);

                                foreach ($result as $key => $row):
                                    $is_menu = ($row['is_menu'] == '1') ? 'Yes' : 'No';
                                    $status = ($row['status'] == '1') ? 'Active' : 'Passive'; ?>
                                    <tr>
                                        <td><?= $row['title'] ?></td>
                                        <td><?= $is_menu ?></td>
                                        <td><?= $status ?></td>
                                        <th><a type="button" href="?route=categories/edit&id=<?= $row['id'] ?>"
                                               class="btn badge-warning">Edit</a>
                                            <a type="button" href="categories/delete.php?id=<?= $row['id'] ?>"
                                               class="btn bg-danger">Delete</a></th>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <?php include "../includes/pagination.php"; ?>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </section>
</div>includes/