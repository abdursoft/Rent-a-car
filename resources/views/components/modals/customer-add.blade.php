<!-- CUSTOMER ADD MODAL START -->
<div class="modal fade" id="customerAddModal" tabindex="-1" aria-labelledby="customerAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerAddModalLabel">Add New Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="customerForm" method="post">
                    <!-- /.card-header -->
                    <div class="card-body" data-select2-id="83">
                        <div class="row" data-select2-id="82">
                            <div class="col-md-6" data-select2-id="88">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" id="" class="form-control" placeholder="Jhon Doe" required>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6" data-select2-id="88">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" id="" class="form-control" placeholder="jhon_doe@gmail.com" required>
                                </div>
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                            <div class="col-md-6" data-select2-id="88">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" id="" class="form-control" placeholder="+8801892311511" required>
                                </div>
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                            <div class="col-md-6" data-select2-id="88">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text"  name="address" id="" class="form-control" placeholder="Your address" required>
                                </div>
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                            <div class="col-md-12" data-select2-id="88">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text"  name="password" id="" class="form-control" placeholder="Default password" required>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row d-none" data-select2-id="111">
                            <button type="submit" class="btn btn-block btn-danger">Submit</button>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <div class="modal-footer">
                <div class="w-100 d-flex align-items-center justify-content-between">
                    <div class="errorMsg text-center"></div>
                    <div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-success" onclick="createCustomer();return false;">Create</button>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
<!-- CUSTOMER ADD MODAL END -->
