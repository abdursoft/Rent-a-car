<!-- CAR EDIT MODAL START -->
<div class="modal fade" id="carEditModal" tabindex="-1" aria-labelledby="carEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="carEditModalLabel">Update Car</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="carForm" enctype="multipart/form-data">
                    <div class="row" data-select2-id="82">
                        <div class="col-md-3" data-select2-id="88">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="car_name" class="form-control" placeholder="BMW-x100" required>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3" data-select2-id="88">
                            <div class="form-group">
                                <label>Brand</label>
                                <input type="text" name="brand" id="car_brand" class="form-control" placeholder="BMW" required>
                            </div>
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                        <div class="col-md-3" data-select2-id="88">
                            <div class="form-group">
                                <label>Model</label>
                                <input type="text" name="model" id="car_model" class="form-control" placeholder="BN-C38" required>
                            </div>
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                        <div class="col-md-3" data-select2-id="88">
                            <div class="form-group">
                                <label>Year</label>
                                <input type="number"  name="year" id="car_year" class="form-control" placeholder="2023" required>
                            </div>
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                        <div class="col-md-3" data-select2-id="88">
                            <div class="form-group">
                                <label>Car Type</label>
                                <select name="car_type" id="car_type" class="form-control">
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
                                <input type="text" name="price" id="car_price" class="form-control" placeholder="$30.25" required>
                            </div>
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                        <div class="col-md-3" data-select2-id="88">
                            <div class="form-group">
                                <label>Availablity</label>
                                <select name="availability" id="car_availablity" class="form-control">
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
                                <input type="hidden" name="car_id" id="car_id">
                                <input type="file" name="image" id="car_image" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <img src="" alt="" class="img-fluid" id="previewImage">
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="w-100 d-flex align-items-center justify-content-between">
                    <div class="errorMsg text-center"></div>
                    <div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" onclick="editCar();return false;">Save changes</button>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
<!-- CAR EDIT MODAL END -->
