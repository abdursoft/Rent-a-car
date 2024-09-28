<!-- LIST OF CARS START -->
<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->

                <div class="card my-5">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="card-title">Car List</h3>
                            <button class="btn btn-outline-success" onclick="openAddCar()">Add New</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="carTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Year</th>
                                    <th>Availablity</th>
                                    <th>Price/Day</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="carBody">
                                
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
<!-- LIST OF CARS END -->
