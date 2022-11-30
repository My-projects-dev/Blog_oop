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
                            <a href="?route=pages" class="btn bg-secondary float-right">Pages table</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" action="pages/createForm.php" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="content" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Is menu:</label>
                                    <div class="form-check">
                                        <label >Yes</label>
                                        <input type="radio" name="is_menu"   value="1">
                                    </div>
                                    <div class="form-check">
                                        <label >No</label>
                                        <input type="radio" name="is_menu" class="" value="0">
                                    </div>
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