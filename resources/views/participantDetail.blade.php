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
                <div class="card-header">{{ __('View') }}</div>

                <div class="card-body">

                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
                    @endif

                    <form id="job_form" method="" action="">
                        @csrf
                        

                        <div class="form-group">
                            <label for="full_name">{{ __('Full Name') }}</label>
                            <input name="full_name" id="full_name" value="{{ $user->full_name }}" type="text" class="form-control" required autofocus>
                        </div>
                                            
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="number  ">{{ __('Contact Number') }}</label>                                
                                <input name="number" id="number" value="{{ $user->number }}" type="text" class="form-control" required autofocus>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="current_company">{{ __('Current Company') }}</label>
                                <input name="current_company" id="current_company" value="{{ $user->current_company }}" type="text" class="form-control" required autofocus>
                            </div>
                        </div>    

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="current_designation">{{ __('Current Designation') }}</label>                                
                                <input name="current_designation" id="current_designation" value="{{ $user->current_designation }}" type="text" class="form-control" required autofocus>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="current_location">{{ __('Current Location') }}</label>
                                <input name="current_location" id="current_location" value="{{ $user->current_location }}" type="text" class="form-control" required autofocus>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="current_salary">{{ __('Current / Last Annual Salary') }}</label>                                
                                <input name="current_salary" id="current_salary" value="{{ $user->current_salary }}" type="text" class="form-control" required autofocus>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="industry">{{ __('Industry') }}</label>
                                <input name="industry" id="industry" value="{{ $user->industry }}" type="text" class="form-control" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="functional_area">{{ __('Functional Area') }}</label>
                            <input id="functional_area" value="{{ $user->functional_area }}" class="form-control" name="functional_area" required autofocus>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="experience_year">{{ __('Experience Year') }}</label>
                                
                                <select class="form-select" name="experience_year">
                                    <option>{{ $user->experience_year }}</option>
                                </select>     
                            </div>

                            <div class="form-group col-md-6">
                                <label for="experience_month">{{ __('Experience Month') }}</label>
                                
                                <select class="form-select" name="experience_month">
                                    <option>{{ $user->experience_month }}</option>
                                </select>     
                            </div>                         
                        </div>    

                        <div class="form-group">
                            <label for="skill">{{ __('Skill') }}</label>
                            <input id="skill" value="{{ $user->skill }}" class="form-control" name="skill" autofocus>
                        </div>
                        
                        <div class="form-group">
                            <label for="reason">{{ __('Reason For Applying') }}</label>
                            <textarea id="reason" class="form-control" name="reason" required autofocus>{{ $user->reason }}</textarea>
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
    $("#job_form input").prop("disabled", true);
    $("#job_form textarea").prop("disabled", true);
    $("#job_form select").prop("disabled", true);
</script>


            

@endsection


</body>

</html>