$(document).ready(function () {
    //additional methods
    $.validator.addMethod("alphabetsAndSpaces", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z ]*$/);
    });

    $.validator.addMethod("phoneNumber", function (value, element) {
        return this.optional(element) || value == value.match(/^[0-9()+ ]*$/);
    });

    $.validator.addMethod('fileSize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    });

    jQuery.validator.addMethod("validDate", function(value, element) {
        return this.optional(element) || moment(value,"DD/MM/YYYY").isValid();
    });

    $.validator.addMethod("alphabetsAndSpacesAndNumbers", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z0-9 ]*$/);
    });


    // show password function
    $('.show_password_btn').click(function(){
        if($('.show_password').attr('type')=='password'){
            $('.show_password').prop('type', 'text');
            $('.show_password_btn').text('Hide Password');
        }else{
            $('.show_password').prop('type', 'password');
            $('.show_password_btn').text('Show Password');
        }
    });

    //become host/Partner from
    $("#registerPartnerForm").validate({
        rules: {
            name:{
                required: true,
                alphabetsAndSpaces: true,
                minlength: 3,
            },
            date_of_birth:{
                required: true,
                validDate: true,
            },
            email:{
                required: true,
                email: true,
            },
            website:{
                required: true,
            },
            password:{
                required: true,
                minlength: 8,
            },
            password_conformation:{
                required: true,
                equalTo: '#password',
            },
        },
        messages: {
            name:{
                required: "Full name is required.",
                alphabetsAndSpaces: "Only alphabets and spaces are allowed.",
                minlength: "Full name requires minimum 3 characters.",
            },
            date_of_birth:{
                required: "Date of birth is required.",
                validDate: "Date of birth accepts only date.",
            },
            email:{
                required: "Email is required.",
                email: "Email is invalid.",
            },
            website:{
                required: "Website is required.",
            },
            password:{
                required: "Password is required.",
                minlength: "Password should have minimum 8 characters",
            },
            password_conformation:{
                required: "Password confirmation is required.",
                equalTo: "Password confirmation is incorrect.",
            },
        }
    });

    //login Form
    $("#loginForm").validate({
        rules: {
            email:{
                required: true,
                email: true,
            },
            password:{
                required: true,
                minlength: 8,
            },
        },
        messages: {
            email:{
                required: "Email is required.",
                email: "Email is invalid.",
            },
            password:{
                required: "Password is required.",
                minlength: "Password should have minimum 8 characters.",
            },
        }
    });


    //settings Form
    $("#settingsForm").validate({
        rules: {
            name:{
                required: true,
                alphabetsAndSpaces: true,
                minlength: 3,
            },
            password:{
                required: true,
                minlength: 8,
            },
            new_password:{
                required: true,
                minlength: 8,
            },
            new_password_conformation:{
                required: true,
                equalTo: '#new_password'
            },
        },
        messages: {
            name:{
                required: "Full name is required.",
                alphabetsAndSpaces: "Only alphabets and spaces are allowed.",
                minlength: "Full name requires minimum 3 characters.",
            },
            password:{
                required: "Password is required.",
                minlength: "Password should have minimum 8 characters.",
            },
            new_password:{
                required: "New password is required.",
                minlength: "New password should have minimum 8 characters.",
            },
            new_password_conformation:{
                required: "New password confirmation is required.",
                equalTo: "New password confirmation is incorrect.",
            },
        }
    });

    //Register User from
    $("#registerUserForm").validate({
        rules: {
            name:{
                required: true,
                alphabetsAndSpaces: true,
                minlength: 3,
            },
            email:{
                required: true,
                email: true,
            },
            password:{
                required: true,
                minlength: 8,
            },
            password_conformation:{
                required: true,
                equalTo: '#password',
            },
        },
        messages: {
            name:{
                required: "Full name is required.",
                alphabetsAndSpaces: "Only alphabets and spaces are allowed.",
                minlength: "Full name requires minimum 3 characters.",
            },
            email:{
                required: "Email is required.",
                email: "Email is invalid.",
            },
            password:{
                required: "Password is required.",
                minlength: "Password should have minimum 8 characters.",
            },
            password_conformation:{
                required: "Password confirmation is required.",
                equalTo: "Password confirmation is incorrect.",
            },
        }
    });

    //email Form
    $("#emailForm").validate({
        rules: {
            email:{
                required: true,
                email: true,
            },
        },
        messages: {
            email:{
                required: "Email is required.",
                email: "Email is invalid.",
            },
        }
    });

    //submit Password Reset Form
    $("#submitPasswordResetForm").validate({
        rules: {
            password:{
                required: true,
                minlength: 8,
            },
            password_conformation:{
                required: true,
                equalTo: '#password',
            },
        },
        messages: {
            password:{
                required: "Password is required.",
                minlength: "Password should have minimum 8 characters.",
            },
            password_conformation:{
                required: "Password confirmation is required.",
                equalTo: "Password confirmation is incorrect.",
            },
        }
    });

    //Add property from
    $("#addPropertyForm").validate({
        rules: {
            name:{
                required: true,
                alphabetsAndSpacesAndNumbers: true,
                minlength: 3,
            },
            country_id:{
                required: true,
            },
            country_name:{
                required: function(element){
                    return ($("#country_id :selected").val()=='other_country');
                },
                alphabetsAndSpaces: true,
            },
            city:{
                required: true,
                minlength: 3,
                maxlength: 255,
            },
            address:{
                required: true,
            },
            number:{
                required: true,
                phoneNumber: true,
            },
            capacity:{
               // required: true,
                digits: true,
            },
            number_of_people:{
                required: true,
                digits: true,
            },
            type:{
                required: true,
            },
            bedroom:{
                required: true,
            },
            bathroom:{
                required: true,
            },
            floor:{
                digits: true,
            },
            description:{
                required: true,
            },
            price_per_night:{
                required: true,
                digits: true,
                min: 0,
            },
            currency:{
                required: true,
            },
            each_extra_guest:{
                digits: true,
                min: 0,
            },
            city_tax:{
              //  required: true,
                number: true,
            },
            main_photo:{
                required: true,
                extension: "jpeg|png|jpg",
                fileSize: 500000,  
            },
            'other_photos[]':{
                extension: "jpeg|png|jpg",
            },
            property_url:{
                required: true,
            },

            Villa_category:{
                required: true,
            },
            province_name:{
                required: true,
            },
        },


        messages: {
            name:{
                required: "Property name is required.",
                alphabetsAndSpacesAndNumbers: "Only alphabets, numbers and spaces are allowed.",
                minlength: "Property name requires minimum 3 characters.",
            },
            country_id:{
                required: "Country is required.",
            },
            country_name:{
                required: "Country name is required.",
                alphabetsAndSpaces: "Only alphabets and spaces are allowed.",
            },
            city:{
                required: "City is required.",
                minlength: "City requires minimum 3 characters.",
                maxlength: "City can contain maximum 255 characters.",
            },
            address:{
                required: "Address is required.",
            },
            number:{
                required: "Number is required.",
                phoneNumber: "Number is invalid.",
            },
            capacity:{
                required: "CAP or Postal Code is required.",
                digits: "CAP or Postal Code can be only in digits.",
            },
            number_of_people:{
                required: "Maximum number of people is required.",
                digits: "Maximum number of people can contain only digits.",
            },
            type:{
                required: "Accommodation type is required.",
            },
            bedroom:{
                required: "Bedroom is required.",
            },
            bathroom:{
                required: "Bathroom is required.",
            },
            floor:{
                required: "Floor is required.",
                digits: "Floor can contain only digits.",
            },
            description:{
                required: "Description is required.",
            },
            price_per_night:{
                required: "Price per night is required.",
                digits: "Price per night can contain only digits.",
                min: "Price per night can be minimum 0.",
            },
            currency:{
                required: "Currency is required.",
            },
            each_extra_guest:{
                required: "Each extra guest is required.",
                digits: "Each extra guest can contain only digits.",
                min: "Each extra guest can be minimum 0.",
            },
            city_tax:{
                required: "City tax is required.",
                number: "Invalid decimals format.",
            },
            main_photo:{
                required: "Main photo is required.",
                extension: "Only file types JPEG, PNG and JPG are allowed.",
                fileSize: "Main photo can contain maximum size of 500 KB.",
            },
            'other_photos[]':{
                extension: "Only file types JPEG, PNG and JPG are allowed.",
            },
            property_url:{
                required: "URL of the property is required.",
            },
            province_name:{
                required: "Province is required.",
            },
            Villa_category:{
                required: "Accommodation is required.",
            },
        }
    });


    $(".one1").click(function () {
        if ($('#addPropertyForm').valid() === true) {
            $(".form-cntr").css("display", "none");
            $("#two").css("display", "inline-block");
            $('#save_draft').show();
        }
    });

    $(".one2").click(function () {
        $(".form-cntr").css("display", "none");
        $("#one").css("display", "inline-block");
        $('#save_draft').hide();
    });

    $(".two1").click(function () {
        if ($('#addPropertyForm').valid() === true) {
            $(".form-cntr").css("display", "none");
            $("#three").css("display", "inline-block");
        }
    });

    $(".two2").click(function () {
        $(".form-cntr").css("display", "none");
        $("#two").css("display", "inline-block");
    });

    $(".three1").click(function () {
        $(".form-cntr").css("display", "none");
        $("#four").css("display", "inline-block");
    });

    $(".three2").click(function () {
        $(".form-cntr").css("display", "none");
        $("#three").css("display", "inline-block");
    });

    $(".four1").click(function () {
        if ($('#addPropertyForm').valid() === true) {
            $(".form-cntr").css("display", "none");
            $("#five").css("display", "inline-block");
        }
    });

    $(".four2").click(function () {
        $(".form-cntr").css("display", "none");
        $("#four").css("display", "inline-block");
    });

    $(".five1").click(function () {
        if ($('#addPropertyForm').valid() === true) {
            $(".form-cntr").css("display", "none");
            $("#six").css("display", "inline-block");
        }
    });

    $(".five2").click(function () {
        $(".form-cntr").css("display", "none");
        $("#five").css("display", "inline-block");
    });

    $(".six1").click(function () {
        if ($('#addPropertyForm').valid() === true) {
            $(".form-cntr").css("display", "none");
            $("#seven").css("display", "inline-block");
            $('#save_draft').hide();
        }
    });

    $(".six2").click(function () {
        $(".form-cntr").css("display", "none");
        $("#six").css("display", "inline-block");
        $('#save_draft').show();
    });


    //Edit property from
    $("#editPropertyForm").validate({
        rules: {
            name:{
                required: true,
                alphabetsAndSpacesAndNumbers: true,
                minlength: 3,
            },
            country:{
                required: true,
            },
            city:{
                required: true,
                minlength: 3,
                maxlength: 255,
            },
            address:{
                required: true,
            },
            number:{
                required: true,
                phoneNumber: true,
            },
            capacity:{
               // required: true,
                digits: true,
            },
            number_of_people:{
                required: true,
                digits: true,
            },
            type:{
                required: true,
            },
            bedroom:{
                required: true,
            },
            bathroom:{
                required: true,
            },
            floor:{
                digits: true,
            },
            description:{
                required: true,
            },
            price_per_night:{
                required: true,
                digits: true,
                min: 0,
            },
            currency:{
                required: true,
            },
            each_extra_guest:{
                digits: true,
                min: 0,
            },
            city_tax:{
               // required: true,
                number: true,
            },
            main_photo:{
                extension: "jpeg|png|jpg",
                fileSize: 500000,  
            },
            'other_photos[]':{
                extension: "jpeg|png|jpg",
            },
            property_url:{
                required: true,
            },
            Villa_category:{
                required: true,
            },
            province_name:{
                required: true,
            },
        },
        messages: {
            name:{
                required: "Property name is required.",
                alphabetsAndSpacesAndNumbers: "Only alphabets, numbers and spaces are allowed.",
                minlength: "Property name requires minimum 3 characters.",
            },
            country:{
                required: "Country is required.",
            },
            city:{
                required: "City is required.",
                minlength: "City requires minimum 3 characters.",
                maxlength: "City can contain maximum 255 characters.",
            },
            address:{
                required: "Address is required.",
            },
            number:{
                required: "Number is required.",
                phoneNumber: "Number is invalid.",
            },
            capacity:{
                required: "CAP or Postal Code is required.",
                digits: "CAP or Postal Code can be only in digits.",
            },
            number_of_people:{
                required: "Maximum number of people is required.",
                digits: "Maximum number of people can contain only digits.",
            },
            type:{
                required: "Accommodation type is required.",
            },
            bedroom:{
                required: "Bedroom is required.",
            },
            bathroom:{
                required: "Bathroom is required.",
            },
            floor:{
                required: "Floor is required.",
                digits: "Floor can contain only digits.",
            },
            description:{
                required: "Description is required.",
            },
            price_per_night:{
                required: "Price per night is required.",
                digits: "Price per night can contain only digits.",
                min: "Price per night can be minimum 0.",
            },
            currency:{
                required: "Currency is required.",
            },
            each_extra_guest:{
                digits: "Each extra guest can contain only digits.",
                min: "Each extra guest can be minimum 0.",
            },
            city_tax:{
                required: "City tax is required.",
                number: "Invalid decimals format.",
            },
            main_photo:{
                required: "Main Photo is required.",
                extension: "Only file types JPEG, PNG and JPG are allowed.",
                fileSize: "Main photo can contain maximum size of 500 KB.",
            },
            'other_photos[]':{
                extension: "Only file types JPEG, PNG and JPG are allowed.",
            },
            property_url:{
                required: "URL of the property is required.",
            },
            province_name:{
                required: "Province is required.",
            },
            Villa_category:{
                required: "Accommodation is required.",
            },
        }
    });

    //unavailable dates Form
    $("#setUnavailabilityForm").validate({
        rules: {
            start_date:{
                required: true,
                validDate: true,
            },
            end_date:{
                required: true,
                validDate: true,
            },
        },
        messages: {
            start_date:{
                required: "Start Date is required.",
                validDate: "Start Date is invalid.",
            },
            end_date:{
                required: "End date is required.",
                validDate: "End date is invalid.",
            },
        }
    });

    //search Form
    $("#searchForm").validate({
        rules: {
            city:{
                required: true,
            },
            check_in:{
                required: true,
                validDate: true,
            },
            check_out:{
                required: true,
                validDate: true,
            },
            people:{
                required: true,
                digits: true,
            },
            accommodation:{
                required: true,
            },
        },
        messages: {
            city:{
                required: "City is required.",
            },
            check_in:{
                required: "Check in date is required.",
                validDate: "Check in date is invalid.",
            },
            check_out:{
                required: "Check out date is required.",
                validDate: "Check out date is invalid.",
            },
            people:{
                required: "Number of people are required.",
                digits: "Number of people can contain only digits.",
            },
            accommodation:{
                required: "Accommodation is required.",
            },
        }
    });

});