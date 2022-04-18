<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Create Job</title>
  <meta content="" name="description">
  <meta content="" name="keywords">



  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

<style>
    .error{
        color: red;
    }
</style>


</head>

<body>

    @extends('layouts.header')
    @extends('layouts.sidebar')

    @extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-end">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Create Job') }}</div>

                <div class="card-body">

                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
                    @endif

                    <form id="job_form" method="POST" action="{{ route('submitjob') }}">
                        @csrf
                        

                        <div class="form-group">
                            <label for="job_title">{{ __('Job Title') }}</label>
                            <input name="job_title" id="job_title" placeholder="Job Title" type="text" class="form-control @error('job_title') is-invalid @enderror" autofocus>
                        </div>

                        
                        <div class="form-group">
                            <label for="job_description">{{ __('Job Description') }}</label>
                            <textarea id="job_description" placeholder="Job Description" class="form-control @error('job_description') is-invalid @enderror" name="job_description" autofocus></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="location">{{ __('Location') }}</label>                
                                <select class="form-select" name="location">
                                    <option selected value="india">India</option>
                                    <option value="us">US</option>
                                    <option value="japan">Japan</option>
                                </select>
                        </div>
        
                        <div class="form-group">
                            <label for="functional_area">{{ __('Functional Area') }}</label>
                                <select class="form-select" name="functional_area"> 
                                    @foreach($functionals as $functional)
                                        <option value="{{ $functional->id }}">{{ $functional->functional_area }}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="job_category">{{ __('Job Category') }}</label>
                                <select class="form-select" name="job_category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->job_category }}</option>
                                    @endforeach
                                </select>     
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="job_time">{{ __('Job Time') }}</label>                                

                                <select name="job_time" class="form-select">
                                    <option value="fulltime" selected>Full Time</option>
                                    <option value="partime">Part Time</option>
                                </select>     
                            </div>

                            <div class="form-group col-md-6">
                                <label for="work_from_home">{{ __('Work From Home') }}</label>
                                
                                <select class="form-select" name="work_from_home">
                                    <option value="yes" selected>Yes</option>
                                    <option value="no">No</option>
                                </select>     
                            </div>
                        </div>    

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="vacancies">{{ __('Number of Vacancies') }}</label>                                
                                <input id="vacancies" placeholder="Vacancies" type="text" class="form-control @error('vacancies') is-invalid @enderror" name="vacancies" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gender">{{ __('Gender Preference') }}</label>
                                
                                <select class="form-select" name="gender">
                                    <option value="any" selected>Any</opti  on>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>     
                            </div>
                        </div>    


                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="minimum_age">{{ __('Minimum Age') }}</label>
                                <input id="minimum_age" placeholder="Minimum Age" type="text" class="form-control @error('minimum_age') is-invalid @enderror" name="minimum_age" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="maximum_age">{{ __('Maximum Age') }}</label>
                                <input id="maximum_age" placeholder="Maximum Age" type="text" class="form-control @error('maximum_age') is-invalid @enderror" name="maximum_age" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="qualificaion">{{ __('Qualificaion') }}</label>
                                <input id="qualification" placeholder="Qualification" type="text" class="form-control @error('qualification') is-invalid @enderror" name="qualification" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="experience">{{ __('Experience') }}</label>                                
                                <input id="experience" placeholder="Experience" type="text" class="form-control @error('experience') is-invalid @enderror" name="experience" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="benefits">{{ __('Job Benefits') }}</label>
                            <textarea id="benefits" placeholder="Job Benefits" class="form-control @error('benefits') is-invalid @enderror" name="benefits" required autofocus></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="currency">{{ __('Salary Currency') }}</label>
                                
                                <select class="form-select" name="currency">
                                    <option value="rupees" selected>Rupees</option>
                                    <option value="dolar">Dolar</option>
                                </select>     
                            </div>

                            <div class="form-group col-md-4">
                                <label for="minimum_salary">{{ __('Minimum Salary') }}</label>
                                <input id="minimum_salary" placeholder="Minimum Salary" type="text" class="form-control @error('minimum_salary') is-invalid @enderror" name="minimum_salary" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="maximum_salary">{{ __('Maximum Salary') }}</label>                                
                                <input id="maximum_salary" placeholder="Maximum Salary" type="text" class="form-control @error('maximum_salary') is-invalid @enderror" name="maximum_salary" required>
                            </div>
                        </div>    


                        <div class="form-group">
                            <label for="organization_name">{{ __('Organization Name') }}</label>
                            <input id="organization_name" placeholder="Organization Name" type="text" class="form-control @error('organization_name') is-invalid @enderror" name="organization_name" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="about_organization">{{ __('About Organization') }}</label>
                            <textarea id="about_organization" placeholder="About Organization" class="form-control @error('about_organization') is-invalid @enderror" name="about_organization" required autofocus></textarea>
                        </div>

                        <div class="form-group">
                            <label for="contact">{{ __('Contact Details') }}</label>
                            <input id="contact" placeholder="Contact details" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" required>        
                        </div>

                        <div class="form-group">
                            <label for="skill">{{ __('Required skill') }}</label>                        
                            <input id="skill" placeholder="Required skill" type="text" class="form-control @error('skill') is-invalid @enderror" name="skill" required>
                        </div>


                        <div class="form-group">
                                <button type="submit" value="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

    <!-- Popper JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->

    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->


<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> -->

<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->



  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
  <!-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->
  
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->


  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <!-- <script src="{{ asset('assets/vendor/php-email-form/validate2.js')}}"></script> -->

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js')}}"></script>
  <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
  <!-- <script src="{{ asset('assets/js/jquery.validate.min.js')}}"></script> -->
  <script src="{{ asset('assets/js/jquery.validate.js')}}"></script>





<script>
    
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
                required: "Title is required",
                minlength: "Your title should be minimum 3 characters.",
                maxlength: "Your title should not exceed 50 characters."
            },
            job_description: {
                required: "Description required",
                minlength: "Your desscription should be minimum 3 characters.",
                maxlength: "Your desscription should not exceed 100 characters."
            },
            vacancies: {
                required: "required",
                vacanciesCheck: "Your vacancies should not exceed 100."
            },
            minimum_age: {
                required: "Minimum age required",
                ageCheck: "age should less than 50"
            },
            maximum_age: {
                required: "Maximum age required",
                ageCheck: "age should less than 50",
            },
            qualification: {
                required: "Qualification field is required",
                minlength: "Your qualification should be minimum 3 characters.",
                maxlength: "Your qualification should not exceed 50 characters."
            },
            experience: {
                required: "Experience field is required",
                minlength: "Your experience should be minimum 3 characters.",
                maxlength: "Your experience should not exceed 100 characters."
            },
            benefits: {
                required: "Benefits field is required",
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

    // $.validator.addMethod('le', function (value, element, param) {
    //     return this.optional(element) || value <= $(param).val();
    // }, 'Invalid value');


    // $.validator.addMethod('totalCheck', function(value, element, params) {
    //     var field_1 = $('input[name="' + params[0] + '"]').val(),
    //         field_2 = $('input[name="' + params[1] + '"]').val();
    //     return parseInt(value) === parseInt(field_1) + parseInt(field_2);
    // }, "Enter the number of persons (including yourself)");



    // $.validator.addMethod('glCheck', function(value, element, params) {
    //     var field_1 = $('input[name="' + params[0] + '"]').val(),
    //     var field_2 = $('input[name="' + params[1] + '"]').val();
    //         if(parseInt(field_1) === parseInt(field_2)){
    //             return  false;
    //         }
    //         else{
    //             return true;
    //         }
    // });


</script>
    
            

@endsection


</body>

</html>