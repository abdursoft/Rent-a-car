
<!-- ALL CAR SECTION START -->
<section class="contact-us-wrap py-5">
    <div class="container">
        <!-- SEARCH SECTION START -->
        <section id="search position-absolute top-50 start-50 translate-middle">
            <div class="container search-block py-5">
                <form class="row" onsubmit="searchCar();return false;">
                    <div class="col-12 col-md-6 col-lg-3 mt-4 mt-lg-0">
                        <label for="vehicle" class="label-style text-capitalize form-label text-white">Car type</label>
                        <div class="input-group date">
                            <select class="form-select form-control carType p-3" id="vehicle" aria-label="Default select example"
                                style="background-image: none" name="car_type">
                                <option selected>Select Car Type</option>
                            </select>
                            <span class="search-icon-position position-absolute p-3">
                                <iconify-icon class="search-icons" icon="solar:bus-outline"></iconify-icon>
                            </span>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-6 col-lg-3 mt-4 mt-lg-0">
                        <label for="vehicle" class="label-style text-capitalize form-label text-white">Car type</label>
                        <div class="input-group date">
                            <select class="form-select form-control carBrand p-3" id="vehicle" aria-label="Default select example"
                                style="background-image: none" name="brand">
                                <option selected>Select a Brand</option>
                                <option value="1">BMW x3</option>
                            </select>
                            <span class="search-icon-position position-absolute p-3">
                                <iconify-icon class="search-icons" icon="solar:bus-outline"></iconify-icon>
                            </span>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-6 col-lg-3 mt-4 mt-lg-0">
                        <label for="carPrice" class="label-style text-capitalize form-label text-white">Rental daily price</label>
    
                        <div class="input-group carPrice text-dark">
                            <input type="text" class="form-control p-3 position-relative"
                                placeholder="Rental daily price" id="carPrice" name="price">
                            <span class="search-icon-position position-absolute p-3">
                                <iconify-icon icon="carbon:currency-dollar"  style="color: black"></iconify-icon>
                            </span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 mt-4 mt-lg-0 d-flex align-items-end pb-1">
                        <button class="btn btn-primary w-100" type="submit">Find your car</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- SEARCH SECTION END -->

        <div class="row carSection">
            
        </div>
        <div class="paginationSection">

        </div>
    </div>
</section>

<!-- ALL CAR SECTION END --> 