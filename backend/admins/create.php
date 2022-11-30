

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
                            <span class="card-title clearfix">Create</span>
                            <a href="?route=admins" class="btn bg-secondary float-right">Admins table</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                                <form id="quickForm" action="admins/createForm.php" method="POST">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Surname</label>
                                            <input type="text" name="surname" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email adress</label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control">
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
                                                <label >Active</label>
                                                <input type="radio" name="status"   value="1">
                                                </div>
                                                <div class="form-check">
                                                    <label >Passive</label>
                                                    <input type="radio" name="status" class="" value="0">
                                                    </div>
                                                </div>    
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                              <button type="submit" class="btn btn-primary">Submit</button>
                                          </div>
                                      </form>     
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