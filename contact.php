<?php include('header2.php'); ?>
<style>
    h3,
    h5 {
        color: rgb(72, 28, 82);
        font-weight: 600;
    }

    /* Stylish border around the contact form only */
    .contact-form-box {
        border: 2px solid rgba(141, 56, 156, 0.3);
        border-radius: 12px;
        padding: 30px;
        background-color: #ffffff;
        box-shadow: 0 4px 15px rgba(141, 56, 156, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .contact-form-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(141, 56, 156, 0.2);
    }

    .form-label {
        color: #4e2b5b;
        font-weight: 500;
    }

    .form-control {
        border-radius: 8px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
        border-color: rgb(141, 56, 156);
        box-shadow: 0 0 5px rgba(141, 56, 156, 0.5);
    }

    .btn-outline-custom {
        background: white;
        border: 2px solid rgb(141, 56, 156);
        color: rgb(43, 6, 49);
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .btn-outline-custom:hover {
        background: rgb(113, 49, 124);
        color: white;
        transform: translateY(-3px) scale(1.03);
        box-shadow: 0 8px 20px rgba(75, 55, 78, 0.4);
        border-color: rgb(105, 37, 117);
    }

    .is-invalid {
        border-color: red;
    }

    .is-valid {
        border-color: green;
    }

    .invalid-feedback {
        display: block;
        font-size: 0.875rem;
        color: red;
    }

    .info-box {
        background-color: #f8f9fa;
        border-left: 5px solid rgb(141, 56, 156);
        box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
    }

    .info-box i {
        color: rgb(141, 56, 156);
        margin-right: 8px;
    }

    @media (max-width: 768px) {
        .container {
            padding: 25px;
        }
    }
</style>

<body>
    <div class="container py-5">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-md-7 contact-form-box">
                <h3 class="mb-4">Contact Us</h3>
                <form method="POST" action="submit_contact.php" id="contactForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name">
                    </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile Number</label>
                        <input type="tel" class="form-control" id="mobile" name="number" placeholder="Enter your mobile number">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email (e.g. example@gmail.com)">
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter message subject">
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Type your message here..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-outline-custom w-100" name="send_btn">Send Message</button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="col-md-5 mt-5 mt-md-0">
                <h5 class="mb-3">Our Information</h5>

                <div class="info-box rounded p-3 mb-3">
                    <i class="fas fa-map-marker-alt"></i><strong> Location</strong>
                    <p class="mb-0 ms-4">RK University, Rajkot, Gujarat</p>
                </div>

                <div class="info-box rounded p-3 mb-3">
                    <i class="fas fa-envelope"></i><strong> Email</strong>
                    <p class="mb-0 ms-4">support@skinzoneshop.com</p>
                </div>

                <div class="info-box rounded p-3">
                    <i class="fa-solid fa-phone"></i><strong> Contact</strong>
                    <p class="mb-0 ms-4">+91 9876543210</p>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    $(document).ready(function() {
        // Initialize the form validation
        $("#contactForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                number: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                subject: {
                    required: true,
                    minlength: 3

                },
                message: {
                    required: true,
                    minlength: 10
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                    minlength: "Your name must be at least 3 characters long"
                },
                email: {
                    required: "Please enter an email address",
                    email: "Please enter a valid email address"
                },
                number: {
                    required: "Please enter a number",
                    number: "Please enter a valid number",
                    minlength: "Number must be exactly 10 digits",
                    maxlength: "Number must be exactly 10 digits"
                },
                subject: {
                    required: "Please enter a subject",
                    minlength: "Your subject must be at least 3 characters long"
                },
                message: {
                    required: "Please enter a message",
                    minlength: "Your message must be at least 10 characters long"
                }
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                if (element.attr('name') == 'gen') {
                    error.insertAfter('#gen-error');
                } else if (element.attr('name') == 'hobby[]') {
                    error.insertAfter('#hobby-error');
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            }
        });
    });
</script>
<?php include('footer.php'); ?>