<?php

$sehifeLink = "route=admins&";

$sql = "SELECT * FROM `admin`";
$Limit = 10;

include "../includes/pagination_head.php";
?>
<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <?php
            errorAlert();
            successAlert();
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-primary"><strong>Admins</strong></h3>
                            <a class="btn btn-primary my-2 float-right" href="?route=admins/create">Create</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $admins = "SELECT * FROM `admin` LIMIT $goster, $Limit";

                                $result = $db->selectAll($admins);

                                foreach ($result as $key => $row):
                                        $status = ($row['status'] == '1') ? 'Active' : 'Passive'; ?>
                                        <tr>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['surname'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['username'] ?></td>
                                            <td><?= $status ?></td>
                                            <th><a type="button" href="?route=admins/edit&id=<?= $row['id'] ?>"
                                                   class="btn badge-warning">Edit</a>
                                                <?php if ($row['id'] != 1): ?>
                                                    <a type="button" href="admins/delete.php?id=<?= $row['id'] ?>"
                                                       class="btn bg-danger">Delete</a>
                                                <?php endif ?>
                                            </th>
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