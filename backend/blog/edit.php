<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-3">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?php
            errorAlert();
            successAlert

();
            ?>
            <!-- Table -->
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header ">
                            <span class="card-title clearfix">Edit</span>
                            <a href="?route=blog" class="btn bg-secondary float-right">Blog table</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])):
                            $id = $_GET['id'];

                            $db = new DB();
                            $query = "SELECT * FROM blog WHERE id=$id";
                            $blog = $db->select($query); ?>

                            <form action="blog/editForm.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">

                                        <img src="<?= $blog['image'] ?>" alt="" width="300" height="300">
                                        <input type="hidden" name="img" value="<?= $blog['image'] ?>">

                                        <input type="hidden" name="vid" value="<?= $blog['video'] ?>">
                                        <video class="float-right" width="300" height="300" autoplay muted>
                                            <source src="<?= $blog['video'] ?>">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="hidden" name="id" class="form-control" value="<?= $blog['id'] ?>">
                                        <input type="text" name="title" class="form-control"
                                               value="<?= $blog['title'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" name="description" class="form-control"
                                               value="<?= $blog['description'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Video</label>
                                        <input type="file" name="video" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="cat_id" class="form-control">
                                            <?php
                                            $sql = "SELECT * FROM categories";
                                            $result = $db->selectAll($sql);

                                            foreach ($result as $key => $row):?>
                                                <option value="<?= $row['id'] ?>" <?php if ($row["id"] == $blog['cat_id']) { ?>
                                                    selected
                                                <?php } ?>
                                                ><?= $row["title"]; ?>
                                                </option>
                                            <?php
                                            endforeach;
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea name="content" class="form-control"><?= $blog['content'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Headlines:</label>
                                        <div class="form-check">
                                            <label>Yes</label>
                                            <input type="radio" name="is_monset"
                                                   value="1" <?php if ($blog["is_monset"] == 1) { ?>
                                                checked
                                            <?php } ?>>
                                        </div>
                                        <div class="form-check">
                                            <label>No</label>
                                            <input type="radio" name="is_monset" class=""
                                                   value="0" <?php if ($blog["is_monset"] != 1) { ?>
                                                checked
                                            <?php } ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status:</label>
                                        <div class="form-check">
                                            <label>Aktiv</label>
                                            <input type="radio" name="status"
                                                   value="1" <?php if ($blog["status"] == 1) { ?>
                                                checked
                                            <?php } ?>>
                                        </div>
                                        <div class="form-check">
                                            <label>Passiv</label>
                                            <input type="radio" name="status" class=""
                                                   value="0" <?php if ($blog["status"] != 1) { ?>
                                                checked
                                            <?php } ?>>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        <?php
                        endif;
                        ?>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->