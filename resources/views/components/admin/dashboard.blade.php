<!-- ANALYTICS CARD START -->
<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row py-5">
            <div class="col-md-3 col-6 my-1">
                <div class="contaienr">
                    <div class="card rounded shadow">
                        <div class="card-body text-center">
                            <h4>Total Cars</h4>
                            <h6 class="totalRent">{{$cars}}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 my-1">
                <div class="contaienr">
                    <div class="card rounded shadow">
                        <div class="card-body text-center">
                            <h4>Available Cars</h4>
                            <h6 class="onGoing">{{$available_car}}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 my-1">
                <div class="contaienr">
                    <div class="card rounded shadow">
                        <div class="card-body text-center">
                            <h4>Total Rents</h4>
                            <h6 class="totalBook">{{$rents}}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 my-1">
                <div class="contaienr">
                    <div class="card rounded shadow">
                        <div class="card-body text-center">
                            <h4>Total Revenue</h4>
                            <h6 class="totalSpent">{{$revenue}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ANALYTICS CARD END -->