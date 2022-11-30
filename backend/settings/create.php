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
                            <a href="?route=settings" class="btn bg-secondary float-right">Settings table</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                                <form id="quickForm" action="settings/createForm.php" method="POST">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Key</label>
                                            <input type="text" name="kkey" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Value</label>
                                            <input type="text" name="value" class="form-control">
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