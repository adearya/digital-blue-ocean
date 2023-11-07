<section class="container mt-5 text-white header-contact-us">
    <div class="main-tittle text-center fw-bold mb-3">
        <h1><span style="border-bottom: 5px solid white;">CONTACT</span> US</h1>
    </div>
    <div class="sub-tittle text-center">
        <p>Fill out the form to leave a comment or get in touch with us via the Contact details below.</p>
    </div>
    <div class="email-container d-flex flex-column justify-content-center align-items-center mb-2">
        <div class="d-flex align-items-center mb-2">
            <img class="first-gmail-logo" src="{{ asset('assets/img_gmail.svg') }}" alt="google-gmail">
            <a href="mailto:ai_indonesia@alphabetincubator.id" class="custom-email-link">ai_indonesia@alphabetincubator.id</a>
        </div>
        <div class="d-flex align-items-center">
            <img class="second-gmail-logo" src="{{ asset('assets/img_gmail.svg') }}" alt="google-gmail">
            <a href="mailto:info@pandawan.id" class="custom-email-link">info@pandawan.id</a>
        </div>
    </div>
</section>

<section class="container bg-contact-us">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-contact-us mt-5 mb-5 p-3" style="background-color: #D9D9D9; border-radius: 10px;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Enter your first name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Enter your last name" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email address" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" rows="4" placeholder="Enter your message" required></textarea>
                </div>
                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primary" style="width: 30%;">Send</button>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="container img-contact-us text-center float-end">
                <img class="main-img-contact-us img-fluid" src="{{ asset('assets/img_contactUs.svg') }}" alt="contact-us">
            </div>
        </div>
    </div>
</section>