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
                            <a href="?route=categories" class="btn bg-secondary float-right">Categories table</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])):
                        $id = $_GET['id'];

                        $db = new DB();
                        $query = "SELECT * FROM categories WHERE id=$id";
                        $category = $db->select($query);?>

                        <form id="quickForm" action="categories/editForm.php" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="hidden" name="id" class="form-control" value="<?= $category['id'] ?>">
                                    <input type="text" name="title" class="form-control"
                                           value="<?= $category['title'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Is menu:</label>
                                    <div class="form-check">
                                        <label>Aktiv</label>
                                        <input type="radio" name="is_menu"
                                               value="1" <?php if ($category["is_menu"] == 1) { ?>
                                            checked
                                        <?php } ?>>
                                    </div>
                                    <div class="form-check">
                                        <label>Passiv</label>
                                        <input type="radio" name="is_menu" class=""
                                               value="0" <?php if ($category["is_menu"] != 1) { ?>
                                            checked
                                        <?php } ?>>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Status:</label>
                                    <div class="form-check">
                                        <label>Aktiv</label>
                                        <input type="radio" name="status"
                                               value="1" <?php if ($category["status"] == 1) { ?>
                                            checked
                                        <?php } ?>>
                                    </div>
                                    <div class="form-check">
                                        <label>Passiv</label>
                                        <input type="radio" name="status" class=""
                                               value="0" <?php if ($category["status"] != 1) { ?>
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