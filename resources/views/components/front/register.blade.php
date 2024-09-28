<!-- REGISTER SECTION START -->
<section class="contact-us-wrap py-5">
    <div class="container">
        <div class="row ">
            <div class="inquiry-item offset-md-2 col-md-8">
                <h2 class=" text-center my-5">Signup your <span class="text-primary">account</span> </h2>

                <p><span class="text-danger">*</span> indicator means required field</p>
                <form id="form" class="form-group flex-wrap userRegistration" onsubmit="userRegistration();return false;">

                    <div class="col-lg-12 mb-3">
                        <input type="text" name="name" placeholder="Write Your Name Here *"
                            class="form-control p-3 me-3">
                    </div>

                    <div class="col-lg-12 mb-3">
                        <input type="email" name="email" placeholder="Write Your Email Here *" class="form-control p-3">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <input type="password" name="password" placeholder="Write Your Password *" class="form-control p-3">
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg text-uppercase btn-rounded-none">Register</button>
                    </div>
                    <div class="text-center errorMsg p-3"></div>
                </form>
                <div class="devider"></div>
                <div class="text-center mt-2">
                    <a href="/login">Already have an account? Login Here</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- REGISTER SECTION END -->
