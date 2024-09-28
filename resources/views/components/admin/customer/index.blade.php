<!-- LIST OF CUSTOMER START -->
<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->

                <div class="card my-5">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="card-title">Customer List</h3>
                            <button class="btn btn-outline-success" onclick="newCustomer()">Add New</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="customerTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="customerBody">
                                
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
<!-- LIST OF CUSTOMER END -->
