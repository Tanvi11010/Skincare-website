<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/additional-methods.min.js"></script>
    <script>
        $(document).ready(function() {
            $.validator.addMethod("filesize", function(value, element, param) {
                return this.optional(element) || (element.files[0].size <= param);
            }, "File size must be less than 250 KB");

            $('#form1').validate({
                rules: {  
                    fn: {
                        required: true,
                        minlength: 3,
                        maxlength: 30,
                        pattern: /^[a-zA-Z ]+$/
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    pswd: {
                        required: true,
                        minlength: 8,
                        maxlength: 20,
                        pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%#*?&])[A-Za-z\d@$!%#*?&]{8,20}$/
                    },
                    cpswd: {
                        required: true,
                        equalTo: "#password"
                    },
                    gen: {
                        required: true
                    },
                    "hobby[]": {
                        required: true
                    },
                    file: {
                        required: true,
                        extension: "jpg|png",
                        filesize: 256000 
                    }
                },
                messages: { 
                    fn: {
                        required: "Full name is a required field",
                        minlength: "Full name requires at least 3 characters",
                        maxlength: "More than 30 characters not allowed",
                        pattern: "Full name should contain only alphabets and spaces"
                    },
                    email: {
                        required: "Please enter an email address",
                        email: "Please enter a valid email address"
                    },
                    pswd: {
                        required: "Please enter a password",
                        minlength: "Password must be at least 8 characters long",
                        maxlength: "Password must be at most 20 characters long",
                        pattern: "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character"
                    },
                    cpswd: {
                        required: "Please confirm your password",
                        equalTo: "Passwords do not match"
                    },
                    gen: {
                        required: "Please select your gender"
                    },
                    "hobby[]": {
                        required: "Please select at least one hobby"
                    },
                    file: {
                        required: "Please upload a file",
                        extension: "Only JPG and PNG files are allowed",
                        filesize: "File size must be less than 250 KB"
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
</head>
<body>
    <form id="form1">
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fn" placeholder="Enter your full name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="pswd" placeholder="Enter your password">
        </div>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpswd" placeholder="Confirm your password">
        </div>
        <fieldset class="form-group">
            <legend>Gender</legend>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gen" id="male" value="Male">
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gen" id="female" value="Female">
                <label class="form-check-label" for="female">Female</label>
            </div>
            <div id="gen-error"></div>
        </fieldset>
        <fieldset class="form-group">
            <legend>Hobbies</legend>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="hobby[]" id="reading" value="Reading">
                <label class="form-check-label" for="reading">Reading</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="hobby[]" id="traveling" value="Traveling">
                <label class="form-check-label" for="traveling">Traveling</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="hobby[]" id="music" value="Music">
                <label class="form-check-label" for="music">Music</label>
            </div>
            <div id="hobby-error"></div>
        </fieldset>
        <div class="form-group">
            <label for="file">Upload File</label>
            <input type="file" class="form-control" id="file" name="file">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>
</html>
