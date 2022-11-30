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
                            <a href="?route=admins" class="btn bg-secondary float-right">Admins table</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])):
                        $id = $_GET['id'];

                        $db = new DB();
                        $query = "SELECT * FROM admin WHERE id=$id";

                        $admin = $db->select($query);?>

                        <form id="quickForm" action="admins/editForm.php" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="hidden" name="id" class="form-control" value="<?= $admin['id'] ?>">
                                    <input type="text" name="name" class="form-control" value="<?= $admin['name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Surname</label>
                                    <input type="text" name="surname" class="form-control"
                                           value="<?= $admin['surname'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email adress</label>
                                    <input type="email" name="email" class="form-control"
                                           value="<?= $admin['email'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control"
                                           value="<?= $admin['username'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password again</label>
                                    <input type="password" name="password2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Status:</label>
                                    <div class="form-check">
                                        <label>Aktiv</label>
                                        <input type="radio" name="status"
                                               value="1" <?php if ($admin["status"] == 1) { ?>
                                            checked
                                        <?php } ?>>
                                    </div>
                                    <div class="form-check">
                                        <label>Passiv</label>
                                        <input type="radio" name="status" class=""
                                               value="0" <?php if ($admin["status"] != 1) { ?>
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