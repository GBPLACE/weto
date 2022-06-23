$(document).ready(function () {
    $.validator.addMethod("alphabetsAndSpaces", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z ]*$/);
    });
    $.validator.addMethod("phoneNumber", function (value, element) {
        return this.optional(element) || value == value.match(/^[0-9()+ ]*$/);
    });
    $.validator.addMethod('fileSize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    });
    jQuery.validator.addMethod("validDate", function (value, element) {
        return this.optional(element) || moment(value, "DD/MM/YYYY").isValid();
    });
    $.validator.addMethod("alphabetsAndSpacesAndNumbers", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z0-9 ]*$/);
    });

    //login Form

    $("#loginForm").validate({
        rules: {
            email: {required: true, email: true,},
            password: {required: true, minlength: 8,},
        },
        messages: {
            email: {required: "Email is required.", email: "Email is invalid.",},
            password: {required: "Password is required.", minlength: "Password should have min 8 characters.",},
        }
    });

    //email Form
    $("#emailForm").validate({
        rules: {email: {required: true, email: true,},},
        messages: {email: {required: "Email is required.", email: "Email is invalid.",},}
    });

    //submit Password Reset Form
    $("#submitPasswordResetForm").validate({
        rules: {
            password: {required: true, minlength: 8,},
            password_conformation: {required: true, equalTo: '#password',},
        },
        messages: {
            password: {
                required: "Password is required.",
                minlength: "Password should have minimum 8 characters",
            },
            password_conformation: {
                required: "Password confirmation is required.",
                equalTo: "Password confirmation is incorrect.",
            },
        }
    });

    //user Form
    $("#userFrom").validate({
        rules: {name: {required: true, alphabetsAndSpaces: true,},},
        messages: {
            name: {
                required: "Name is required.",
                alphabetsAndSpaces: "Only alphabets and spaces are allowed.",
            },
        }
    });

    //Edit property from
    $("#editPropertyForm").validate({
        rules: {
            name: {required: true, alphabetsAndSpacesAndNumbers: true, minlength: 3,},
            country: {required: true,},
            city: {required: true, minlength: 3, maxlength: 255,},
            address: {required: true,},
            number: {required: true, phoneNumber: true,},
            capacity: {
				//required: true,
				digits: true,},
            number_of_people: {required: true, digits: true,},
            type: {required: true,},
            bedroom: {required: true,},
            bathroom: {required: true,},
            floor: { digits: true,},
            description: {required: true,},
            price_per_night: {required: true, digits: true, min: 0,},
            currency: {required: true,},
            each_extra_guest: {digits: true, min: 0,},
            final_cleaning: {},
            city_tax: {
				//required: true,
				number: true,},
            main_photo: {extension: "jpeg|png|jpg", fileSize: 500000,
            }, 'other_photos[]': {extension: "jpeg|png|jpg",}, property_url: {required: true,},
            Villa_category:{
                required: true,
            },
            province_name:{
                required: true,
            },
        }, messages: {
            name: {
                required: "Property name is required.",
                alphabetsAndSpacesAndNumbers: "Only alphabets, numbers and spaces are allowed.",
                minlength: "Property name requires minimum 3 characters.",
            },
            country: {required: "Country is required.",},
            city: {
                required: "City is required.",
                minlength: "City requires minimum 3 characters.",
                maxlength: "City can contain maximum 255 characters.",
            },
            address: {required: "Address is required.",},
            number: {required: "Number is required.", phoneNumber: "Number is invalid.",},
            capacity: {
                required: "CAP or Postal Code is required.",
                digits: "CAP or Postal Code can contain only digits.",
            },
            number_of_people: {
                required: "Maximum number of people is required.",
                digits: "Maximum number of people can contain only digits.",
            },
            type: {required: "Accommodation type is required.",},
            bedroom: {required: "Bedroom is required.",},
            bathroom: {required: "Bathroom is required.",},
            floor: {required: "Floor is required.", digits: "Floor can contain only digits.",},
            description: {required: "Description is required.",},
            price_per_night: {
                required: "Price per night is required.",
                digits: "Price per night can contain only digits.",
                min: "Price per night can be minimum 0.",
            },
            currency: {required: "Currency is required.",},
            each_extra_guest: {
                required: "Each extra guest is required.",
                digits: "Each extra guest can contain only digits.",
                min: "Each extra guest can be minimum 0.",
            },
            final_cleaning: {required: "Final cleaning is required.",},
            city_tax: {required: "City tex is required.", number: "Invalid decimals format.",},
            main_photo: {
                required: "Main Photo is required.",
                extension: "Only file types JPEG, PNG and JPG are allowed.",
                fileSize: "Main photo can contain maximum size of 500 KB.",
            },
            'other_photos[]': {extension: "Only file types JPEG, PNG and JPG are allowed.",},
            property_url: {required: "URL of the property is required.",},
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
            start_date: {required: true, validDate: true,},
            end_date: {required: true, validDate: true,},
        },
        messages: {
            start_date: {required: "Start Date is required.", validDate: "Start Date is invalid.",},
            end_date: {required: "End date is required.", validDate: "End date is invalid.",},
        }
    });

    //property List Search Form
    $("#propertyListSearchForm").validate({
        rules: {
            people: {digits: true,},
            rooms: {digits: true,},
        },
        messages: {
            people: {digits: "Only digits are allowed.",},
            rooms: {digits: "Only digits are allowed.",},
        }
    });

    //settings Form
    $("#settingsForm").validate({
        rules: {
            password: {required: true, minlength: 8,},
            new_password: {required: true, minlength: 8,},
            new_password_conformation: {required: true, equalTo: '#new_password'},
        },
        messages: {
            password: {
                required: "Current password is required.",
                minlength: "Current Password should have minimum 8 characters.",
            },
            new_password: {
                required: "New password is required.",
                minlength: "New password should have minimum 8 characters.",
            },
            new_password_conformation: {
                required: "New password confirmation is required.",
                equalTo: "New password confirmation is incorrect.",
            },
        }
    });

    //countries Form
    $("#addCountryFrom").validate({
        rules: {
            country_name: {
                required: true,
            },
        },
        messages: {
            country_name: {
                required: "Country name is required.",
            },
        }
    });

    //site content form
    $("#site-content").validate({
        rules: {
            favicon_img: {extension: "jpeg|png|jpg",},
            banner_img: {extension: "jpeg|png|jpg",},
            banner_txt: {required: true,},
            logo: {extension: "jpeg|png|jpg",},
            facebook_url: {required: true,},
            insta_url: {required: true,},
            tweeter_url: {required: true,},
            footer_title: {required: true,},
            footer_logo_img: {extension: "jpeg|png|jpg",},
            footer_txt: {required: true,},
            footer_Credits: {required: true,},
        }, messages: {
            favicon_img: {extension: "Only JPG, PNG and JPEG file types are allowed.",},
            banner_img: {extension: "Only JPG, PNG and JPEG file types are allowed.",},
            banner_txt: {required: "Banner text is required.",},
            logo: {extension: "Only JPG, PNG and JPEG file types are allowed.",},
            facebook_url: {required: "Facebook url is required.",},
            insta_url: {required: "Instagram url is required.",},
            tweeter_url: {required: "Tweeter url is required.",},
            footer_title: {required: "Footer title is required.",},
            footer_logo_img: {extension: "Only JPG, PNG and JPEG file types are allowed.",},
            footer_txt: {required: "Footer text is required.",},
            footer_Credits: {required: "Footer credits are required.",},
        }
    });

    //site seo
    $("#site_seo").validate({
        rules: {
            site_page_number: {required: true,},
            page_title: {required: true,},
            keywords: {required: true,},
            description: {required: true,},
        },
        messages: {
            site_page_number: {required: "Please must select SEO page first.",},
            page_title: {required: "Page title is required.",},
            keywords: {required: "keywords are required.",},
            description: {required: "Description is required.",},
        }
    });

    $("#addAdminFrom").validate({
        rules: {
            admin_name: {required: true,},
            email: {required: true,},
            admin_password: {required: true, minlength: 8,},
            confirm_admin_password: {required: true, equalTo: '#admin_password'},
        },
        messages: {
            admin_name: {required: "Name is required.",},
            email: {required: "Email is required.",},
            admin_password: {required: "Password is required.",},
            confirm_admin_password: {required: "Password confirmation is incorrect.",},
        }
    });

    $("#addAdminFromEdit").validate({
        rules: {
            admin_name: {required: true,},
            email: {required: true,},
            admin_password: { minlength: 8},
            confirm_admin_password: {equalTo: '#admin_password'},
        },
        messages: {
            admin_name: {required: "Name is required.",},
            email: {required: "Email is required.",},
            confirm_admin_password: {required: "Password confirmation is incorrect.",},
        }
    });

    $("#villaForm").validate({
        rules: {
            villa_name: {
                required: true,
            },
        },
        messages: {
            villa_name: {
                required: "Accommodation name is required.",
            },
        }
    });

    $("#propertyTypeForm").validate({
        rules: {
            property_type_name: {
                required: true,
            },
        },
        messages: {
            property_type_name: {
                required: "Accommodation type name is required.",
            },
        }
    });





    
});

