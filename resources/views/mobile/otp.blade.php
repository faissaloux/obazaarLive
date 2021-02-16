<!DOCTYPE html>
<html lang="en">
  
  @include('mobile/inc/head')
  <body>
    @include('mobile/inc/preloader')
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
            <div class="text-start px-4">
              <h5 class="mb-1 text-white">Phone Verification</h5>
              <p class="mb-4 text-white">We will send you an OTP on this phone number.</p>
            </div>
            <!-- OTP Send Form-->
            <div class="otp-form mt-5 mx-4">
              <form action="https://designing-world.com/suha-v2.3.0/otp-confirm.html" method="">
                <div class="mb-4 d-flex">
                  <select class="form-select" name="" aria-label="Default select example">
                    <option value="">+880</option>
                    <option value="">+62</option>
                    <option value="">+60</option>
                    <option value="">+91</option>
                    <option value="">+198</option>
                  </select>
                  <input class="form-control ps-0" id="phone_number" type="text" placeholder="Enter phone number">
                </div>
                <button class="btn btn-warning btn-lg w-100" type="submit">Send OTP</button>
              </form>
            </div>
            <!-- Term & Privacy Info-->
            <div class="login-meta-data px-4">
              <p class="mt-3 mb-0">By providing my phone number, I hereby agree the<a class="mx-1" href="#">Term of Services</a>and<a class="mx-1" href="#">Privacy Policy.</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('mobile/inc/scripts')
  </body>

</html>