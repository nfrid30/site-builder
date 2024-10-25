<section class="d-flex justify-content-center">
    <div class="help position-relative">
        <div class="container">
            <div class="row d-flex gap-lg-5 gap-md-3 gap-sm-4 gap-3 justify-content-center">
                <div class="col-lg-5 col-md-5 help-crd1" data-aos="fade-down"
                     data-aos-easing="linear"
                     data-aos-duration="1500">
                    <h4>{{ $block->fields['Title'] ?? '' }}</h4>
                    <P>{{ $block->fields['Description'] ?? '' }}</P>
                    <div class="d-flex gap-4 align-items-center">
                        <i class="fa-solid fa-house"></i>
                        <span>{{ $block->fields['Address'] ?? '' }}</span>
                    </div>
                    <div class="d-flex gap-4 align-items-center">
                        <i class="fa-solid fa-phone"></i>
                        <span>{{ $block->fields['Phone'] ?? '' }}</span>
                    </div>
                    <div class="d-flex gap-4 align-items-center">
                        <i class="fa-solid fa-envelope"></i>
                        <span>{{ $block->fields['Email'] ?? '' }}</span>
                    </div>
                    <h5>{{ $block->fields['Delivery Title'] ?? '' }}</h5>
                    <div class="d-flex gap-4 align-items-center">
                        <i class="fa-solid fa-clock"></i>
                        <span>{{ $block->fields['Delivery'] ?? '' }} <br> 8:00am to 8:00pm AEDT</span>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 contact-email" data-aos="fade-down"
                     data-aos-easing="linear"
                     data-aos-duration="1500">
                    <h4>EMAIL US</h4>
                    <form action="action_page.php"  id="footer-sub">
                        <div class="row justify-content-center gap-3">
                            <input type="text" name="name" id="name" class="col-md-5 col-sm-12 col-12" placeholder="Your Name" required>
                            <input type="text" name="email" id="email" class="col-md-5 col-sm-12 col-12" placeholder="Email Address" required>
                            <input type="text" name="number" id="number" class="col-md-5 col-sm-12 col-12" placeholder="Phone Number" required>
                            <input type="text" name="subject" id="subject" class="col-md-5 col-sm-12 col-12" placeholder="Subject" required>
                            <textarea class="col-md-11 col-12" name="massage" id="massage" cols="30" rows="10" placeholder="Write here message"></textarea>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button class=" e-btn btn-hover1" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
                <div id="Succes-box"></div>
            </div>
        </div>
    </div>
</section>
