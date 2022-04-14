$(document).ready(function () {
    
    $("#job_form").validate({
        rules: {
            job_title: {
                required: true,
                minlength: 3,
                maxlength: 50,
            },
            job_description: {
                required: true,
                minlength: 3,
                maxlength: 100,
            },
            vacancies: {
                required: true,
                vacanciesCheck: true,
            },
            minimum_age: {
                required: true,
                ageCheck: true,
            },
            maximum_age: {
                required: true,
                ageCheck: true,
            },
            qualification: {
                required: true,
                minlength: 3,
                maxlength: 50,
            },
            experience: {
                required: true,
                minlength: 3,
                maxlength: 100,
            },
            benefits: {
                required: true,
                minlength: 3,
                maxlength: 255,
            },
            minimum_salary: {
                required: true,
            },
            maximum_salary: {
                required: true,
            },
            organization_name: {
                required: true,
                minlength: 3,
                maxlength: 50,
            },
            about_organization: {
                required: true,
                minlength: 3,
                maxlength: 255,
            },
            contact: {
                required: true,
                minlength: 3,
                maxlength: 50,
            },
            skill: {
                required: true,
                minlength: 3,
                maxlength: 100,
            },
        },
        messages: {
            job_title: {
                required: "required",
                minlength: "Your title should be minimum 3 characters.",
                maxlength: "Your title should not exceed 50 characters."
            },
            job_description: {
                required: "required",
                minlength: "Your desscription should be minimum 3 characters.",
                maxlength: "Your desscription should not exceed 100 characters."
            },
            vacancies: {
                required: "required",
                vacanciesCheck: "Your vacancies should not exceed 100."
            },
            minimum_age: {
                required: "required",
                ageCheck: "age should less than 50"
            },
            maximum_age: {
                required: "required",
                ageCheck: "age should less than 50",
            },
            qualification: {
                required: "required",
                minlength: "Your qualification should be minimum 3 characters.",
                maxlength: "Your qualification should not exceed 50 characters."
            },
            experience: {
                required: "required",
                minlength: "Your experience should be minimum 3 characters.",
                maxlength: "Your experience should not exceed 100 characters."
            },
            benefits: {
                required: "required",
                minlength: "Your benefits should be minimum 3 characters.",
                maxlength: "Your benefits should not exceed 255 characters."
            },
            minimum_salary: {
                required: "required",
            },
            maximum_salary: {
                required: "required",
            },
            organization_name: {
                required: "required",
                minlength: "Your organization name should be minimum 3 characters.",
                maxlength: "Your organiztion name should not exceed 50 characters."
            },
            about_organization: {
                required: "required",
                minlength: "Your about should be minimum 3 characters.",
                maxlength: "Your about should not exceed 255 characters."
            },
            contact: {
                required: "required",
                minlength: "Your contact details should be minimum 3 characters.",
                maxlength: "Your contact details should not exceed 50 characters."
            },
            skill: {
                required: "required",
                minlength: "Your skills should be minimum 3 characters.",
                maxlength: "Your skills should not exceed 100 characters."
            },
        },
        // submitHandler: function (form) {
        //     form.submit();
        // },
    });

    $.validator.addMethod("vacanciesCheck",
        function(value, element) {
        return /^[1-9][0-9]?$|^100$/.test(value);   
    });

    $.validator.addMethod("ageCheck",
        function(value, element) {
        return /^[1-9][0-9]?$|^50$/.test(value);   
    });

  
});
