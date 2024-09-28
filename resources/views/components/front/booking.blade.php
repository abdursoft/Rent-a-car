<!-- BOOKING SECTION START -->
<section class="contact-us-wrap py-5">
    <div class="container">
        <div class="row ">
            <div class="inquiry-item offset-md-2 col-md-8">
                <h2 class=" text-center my-5">Book Your <span class="text-primary">Car</span> </h2>

                <p>Book the car for rent online.</p>
                <form id="form" class="form-group flex-wrap">
                    <div class="col-lg-12 mb-3">
                        <select class="form-select form-control p-3" aria-label="Default select example">
                            <option selected>Select Vehicle Type</option>
                            <option value="1">BMW x3</option>
                            <option value="2">BMW M2</option>
                            <option value="3">Ford explorer</option>
                            <option value="4">Ferrari</option>
                            <option value="5">Mercedes-Benz</option>
                            <option value="6">Sports car</option>
                            <option value="7">Tesla</option>
                        </select>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <select class="form-select form-control p-3" aria-label="Default select example">
                            <option selected>Select Pricing Plan</option>
                            <option value="1">Essential</option>
                            <option value="2">Recommended</option>
                            <option value="3">PRO</option>
                        </select>
                    </div>

                    <div class="col-lg-12 mb-3">
                        <input type="text" name="email" placeholder="Pick-up Location"
                            class="form-control p-3 me-3">
                    </div>

                    <div class="form-input col-lg-12 mb-3">
                        <label for="return-date" class="label-style fw-medium form-label"> Pick-up
                            Date and Time</label>
                        <div class="form-input col-lg-12 d-flex mb-3">
                            <div class="input-group date" id="datepicker">
                                <input type="date" id="start" name="appointment" min="2023-01-01"
                                    max="2023-12-31" class="form-control p-3 me-3">
                            </div>
                            <div class="input-group time" id="timepicker">
                                <input type="time" id="start" name="appointment" min="9AM" max="6PM"
                                    class="form-control p-3">
                            </div>
                        </div>
                    </div>

                    <div class="form-input col-lg-12 mb-3">
                        <label for="return-date" class="label-style fw-medium form-label">Returning
                            Date and Time</label>
                        <div class="form-input col-lg-12 d-flex mb-3">
                            <div class="input-group date" id="datepicker">
                                <input type="date" id="start" name="appointment" min="2023-01-01"
                                    max="2023-12-31" class="form-control p-3 me-3">
                            </div>
                            <div class="input-group time" id="timepicker">
                                <input type="time" id="start" name="appointment" min="9AM" max="6PM"
                                    class="form-control p-3">
                            </div>
                        </div>
                    </div>

                    <div class="form-input col-lg-12 d-flex mb-3">
                        <input type="text" name="name" placeholder="Write Your Name Here"
                            class="form-control p-3 me-3">
                        <input type="text" name="email" placeholder="Write Your Email Here"
                            class="form-control p-3">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <input type="text" name="number" placeholder="Phone Number" class="form-control p-3">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <textarea placeholder="Write Your Message Here" class="form-control p-3" rows="8"></textarea>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg text-uppercase btn-rounded-none">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- BOOKING SECTION END -->
