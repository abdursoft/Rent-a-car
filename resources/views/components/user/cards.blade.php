<!-- PROFILE COUNTING SECTIONS START -->
<div class="d-flex align-items-center justify-content-between">
    <h5>Rent History</h4>
    <a href="/user/rents" class="btn btn-outline-danger">See All</a>
</div>
<hr />
<div class="row py-5">
    <div class="col-md-3 col-6 my-1">
        <div class="contaienr">
            <div class="card rounded shadow">
                <div class="card-body text-center">
                    <h4>Completed</h4>
                    <h6 class="totalRent"></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6 my-1">
        <div class="contaienr">
            <div class="card rounded shadow">
                <div class="card-body text-center">
                    <h4>Ongoing</h4>
                    <h6 class="onGoing"></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6 my-1">
        <div class="contaienr">
            <div class="card rounded shadow">
                <div class="card-body text-center">
                    <h4>Booked</h4>
                    <h6 class="totalBook"></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6 my-1">
        <div class="contaienr">
            <div class="card rounded shadow">
                <div class="card-body text-center">
                    <h4>Spent</h4>
                    <h6 class="totalSpent"></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PROFILE COUNTING SECTIONS END -->

<!-- EDIT PROFILE INFORMATION START -->
<div id="car_form" class="car rounded shadow transition delay-150 duration-1000 ease-in-out p-4 d-none">
    <div class="card-body">
        <form id="form" class="form-group flex-wrap userProfile" onsubmit="userProfile();return false;">
            <div class="col-lg-12 mb-3">
                <input type="text" name="name"  placeholder="Write Your Name Here *"
                    class="form-control p-3 me-3 name">
            </div>
            <div class="col-lg-12 mb-3">
                <input type="email" name="email" placeholder="Write Your Email Here *" class="form-control p-3 email">
            </div>
            <div class="col-lg-12 mb-3">
                <input type="text" name="phone" placeholder="Write Your Phone *" class="form-control p-3 phone">
            </div>
            <div class="col-lg-12 mb-3">
                <input type="text" name="address" placeholder="Write Your Address *" class="form-control p-3 address">
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg text-uppercase btn-rounded-none">Save Changes</button>
            </div>
            <div class="text-center errorMsg p-3"></div>
        </form>
    </div>
</div>
<!-- EDIT PROFILE INFORMATION END -->