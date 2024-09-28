<!-- ANALYTICS CARD START -->
<div class="row py-2">
    <div class="col-md-3 col-6 my-1">
        <div class="contaienr">
            <div class="card rounded shadow">
                <div class="card-body text-center">
                    <h4>Completed</h4>
                    <h6 class="totalRent">{{count($completed)}}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6 my-1">
        <div class="contaienr">
            <div class="card rounded shadow">
                <div class="card-body text-center">
                    <h4>Ongoing</h4>
                    <h6 class="onGoing">{{count($ongoing)}}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6 my-1">
        <div class="contaienr">
            <div class="card rounded shadow">
                <div class="card-body text-center">
                    <h4>Booked</h4>
                    <h6 class="totalBook">{{count($booked)}}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6 my-1">
        <div class="contaienr">
            <div class="card rounded shadow">
                <div class="card-body text-center">
                    <h4>Income</h4>
                    <h6 class="totalSpent">{{$total}}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ANALYTICS CARD END -->