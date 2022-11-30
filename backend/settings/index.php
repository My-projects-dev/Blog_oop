<?php

$sehifeLink = "route=settings&";
$sql = "SELECT * FROM `settings`";

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
                            <h3 class="card-title text-primary"><strong>Settings</strong></h3>
                            <a class="btn btn-primary my-2 float-right" href="?route=settings/create">Create</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Key</th>
                                    <th>Value</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $sql = "SELECT * FROM `settings` ORDER BY id DESC LIMIT $goster, $Limit";
                                $result = $db->selectAll($sql);

                                foreach ($result as $key => $row):
                                    $status = ($row['status'] == '1') ? 'Active' : 'Passive'; ?>
                                    <tr>
                                        <td><?= $row['kkey'] ?></td>
                                        <td><?= $row['value'] ?></td>
                                        <td><?= $status ?></td>
                                        <td><a type="button" href="?route=settings/edit&id=<?= $row['id'] ?>"
                                               class="btn badge-warning">Edit</a>
                                            <a type="button" href="settings/delete.php?id=<?= $row['id'] ?>"
                                               class="btn bg-danger">Delete</a>
                                        </td>
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
</div>