<?php

$sehifeLink = "route=blog&";
$sql = "SELECT * FROM `blog`";

$Limit = 7;

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
                            <h3 class="card-title text-primary"><strong>Blog</strong></h3>
                            <a class="btn btn-primary my-2 float-right" href="?route=blog/create">Create</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Video</th>
                                    <th>Category</th>
                                    <th>Created at</th>
                                    <th>Headline</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT b.*, c.title as cattitle FROM `blog` b
                                LEFT JOIN categories c ON c.id=b.cat_id ORDER BY b.created_at DESC LIMIT $goster, $Limit";

                                $result = $db->selectAll($sql);

                                foreach ($result as $key => $row):
                                    $status = ($row['status'] == '1') ? 'Active' : 'Passive';
                                    $is_monset = ($row['is_monset'] == '1') ? 'Yes' : 'No'; ?>
                                    <tr>
                                        <td><?= $row['description'] ?></td>
                                        <td><img src="<?= $row['image'] ?>" width="100" height="100"></td>
                                        <td>
                                            <video width="100" height="100" muted>
                                                <source src="<?= $row['video'] ?>">
                                                Your browser does not support the video tag.
                                            </video>
                                        </td>
                                        <td><?= $row['cattitle'] ?></td>
                                        <td><?= $row['created_at'] ?></td>
                                        <td><?= $is_monset ?></td>
                                        <td><?= $status ?></td>
                                        <th><a type="button" href="?route=blog/edit&id=<?= $row['id'] ?>"
                                               class="btn badge-warning">Edit</a>
                                            <a type="button" href="blog/delete.php?id=<?= $row['id'] ?>"
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
</div>