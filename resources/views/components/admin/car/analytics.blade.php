<!-- CARS ANALYTIC START -->
<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="mt-5 w-100">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3>{{$car->name}}</h3>
                        <h4>Model({{$car->model}})</h4>
                    </div>
                    <hr />
                    <img src="{{Storage::url($car->image)}}" alt="{{$car->title}}" class="img-fluid">
                </div>
            </div>
            <div class="col-md-8">
                <div class="mt-5 w-100">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3>Anaylytics</h3>
                    </div>
                    <hr />
                    @include('components.admin.car.cards')
                </div>
            </div>
            <div class="col-12">
                <!-- /.card -->

                <div class="card my-5">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="card-title">Rental History</h3>
                            <button class="btn btn-outline-success" onclick="goBack()">Go Back</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="rentTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Days</th>
                                    <th>Cost</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="carByRent">
                                @foreach($car->rental as $rent)
                                    <tr>
                                        <td>{{$rent->user->customer_detail->name ?? $rent->user->name}}</td>
                                        <td>{{$rent->user->customer_detail->phone ?? ''}}</td>
                                        <td>{{$rent->start_date}}</td>
                                        <td>{{$rent->end_date}}</td>
                                        <td>{{$rent->days}}</td>
                                        <td>{{$rent->total_cost}}</td>
                                        <td class="{{$rent->status === 'Completed' ? 'text-success' : ($rent->status === 'Ongoing' ? 'text-primary' : ($rent->status === 'Booked' ? 'text-secondary' : 'text-danger'))}}">{{$rent->status}}</td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-between">
                                                @if($rent->status === 'Booked')
                                                    <button class='btn btn-outline-danger' onClick="rentCancel('{{$rent->id}}','{{$rent->user->id}}','{{$car->id}}','true')" >Cancel</button>
                                                    <span class="errorMsg{{$rent->id}}"></span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
<!-- CARS ANALYTIC END -->
