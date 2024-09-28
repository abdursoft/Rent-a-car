<!-- LIST OF RENTAL START -->
<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->

                <div class="card my-5">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="card-title">Rental List</h3>
                            <button class="btn btn-outline-success" onclick="addNewRent()">Add New</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="rentTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Car Name</th>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>Start date</th>
                                    <th>End Date</th>
                                    <th>Total days</th>
                                    <th>Total cost</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="rentalBody">
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- LIST OF RENTAL END -->
