<!-- CAR ADD MODAL START -->
<div class="modal fade" id="carAddModal" tabindex="-1" aria-labelledby="carAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="carAddModalLabel">Add New Car</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="carForm" method="post" enctype="multipart/form-data">
                    <!-- /.card-header -->
                    <div class="card-body" data-select2-id="83">
                        <div class="row" data-select2-id="82">
                            <div class="col-md-3" data-select2-id="88">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" id="" class="form-control" placeholder="BMW-x100" required>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3" data-select2-id="88">
                                <div class="form-group">
                                    <label>Brand</label>
                                    <input type="text" name="brand" id="" class="form-control" placeholder="BMW" required>
                                </div>
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                            <div class="col-md-3" data-select2-id="88">
                                <div class="form-group">
                                    <label>Model</label>
                                    <input type="text" name="model" id="" class="form-control" placeholder="BN-C38" required>
                                </div>
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                            <div class="col-md-3" data-select2-id="88">
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="number"  name="year" id="" class="form-control" placeholder="2023" required>
                                </div>
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                            <div class="col-md-3" data-select2-id="88">
                                <div class="form-group">
                                    <label>Car Type</label>
                                    <select name="car_type" class="form-control">
                                        <option value="suv">SUV</option>
                                        <option value="coupe">COUPE</option>
                                        <option value="convertible">Convertible</option>
                                        <option value="sedan">Sedan</option>
                                        <option value="limousine">Limousine</option>
                                        <option value="sport">Sport</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                            <div class="col-md-3" data-select2-id="88">
                                <div class="form-group">
                                    <label>Daily Price</label>
                                    <input type="text" name="price" id="" class="form-control" placeholder="$30.25" required>
                                </div>
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                            <div class="col-md-3" data-select2-id="88">
                                <div class="form-group">
                                    <label>Availablity</label>
                                    <select name="availability" id="" class="form-control">
                                        <option value="" selected>Select an option</option>
                                        <option value="1">Available</option>
                                        <option value="0">Not Available</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                            <div class="col-md-3" data-select2-id="88">
                                <div class="form-group">
                                    <label>Car Image</label>
                                    <input type="file" name="image" id="flag" class="form-control" required>
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
                        <button class="btn btn-primary" onclick="addCar();return false;">Save changes</button>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
<!-- CAR ADD MODAL END -->
