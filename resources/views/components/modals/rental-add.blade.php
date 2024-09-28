<!-- RENTAL ADD MODAL START -->
<div class="modal fade" id="rentalAddModal" tabindex="-1" aria-labelledby="rentalAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rentalAddModalLabel">Add New Rent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="carForm" method="post" enctype="multipart/form-data">
                    <!-- /.card-header -->
                    <div class="card-body" data-select2-id="83">
                        <div class="row" data-select2-id="82">
                            <!-- /.col -->
                            <div class="col-md-12" data-select2-id="88">
                                <div class="form-group">
                                    <label>Customer</label>
                                    <select name="user_id" id="customerID" class="form-control">
                                        <option value="" selected>Select A Customer</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6" data-select2-id="88">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" name="start_date" id="" class="form-control" required>
                                </div>
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                            <div class="col-md-6" data-select2-id="88">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date"  name="end_date" id="" class="form-control" required>
                                </div>
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                            <div class="col-md-6" data-select2-id="88">
                                <div class="form-group">
                                    <label>Select Car Type</label>
                                    <select name="car_type" id="carType" onchange="getCarByType()" class="form-control">
                                    </select>
                                </div>
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                            <div class="col-md-6" data-select2-id="88">
                                <div class="form-group">
                                    <label>Car</label>
                                    <select name="car_id" id="carBy" class="form-control">
                                        <option value="" selected>Select A Car</option>
                                    </select>
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
                        <button class="btn btn-primary" onclick="chekAvailability();return false;">Save changes</button>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
<!-- RENTAL ADD MODAL END -->
