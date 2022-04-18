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
</head>

<style>
    .error{
        color:red;
    }
</style>

<body>

    @extends('layouts.header')
    @extends('layouts.sidebar')

    @extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-end">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Job Details') }}
                </div>

                <div class="card-body">
                        @foreach($dataa as $data)
                        @if($id == $data->id)


                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
                    @endif

                    <form method="POST" id="job_form" action="{{ url('updatejob/'.$data->id) }} ">
                        @csrf
                        

                        <div class="form-group">
                            <label for="job_title">{{ __('Job Title') }}</label>
                            <input id="job_title" value="{{ $data->job_title }}" placeholder="Job Title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" required autocomplete="job_title" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="job_description">{{ __('Job Description') }}</label>
                            <textarea id="job_description" placeholder="Job Description" class="form-control @error('job_description') is-invalid @enderror" name="job_description" required autocomplete="job_description" autofocus>{{ $data->job_description }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="location">{{ __('Location') }}</label>                
                                <select class="form-select" name="location">
                                    @if($data->location == 'india')
                                        <option selected value="india">India</option>
                                        <option value="japan">Japan</option>
                                        <option value="us">US</option>
                                    @endif
                                    @if($data->location == 'us')
                                        <option value="india">India</option>
                                        <option value="japan">Japan</option>
                                        <option selected value="us">US</option>
                                    @endif
                                    @if($data->location == 'japan')
                                        <option value="india">India</option>
                                        <option selected value="japan">Japan</option>
                                        <option value="us">US</option>
                                    @endif
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="functional_area">{{ __('Functional Area') }}</label>
                                <select class="form-select" name="functional_area"> 


                                        @foreach($functionals as $functional)
                                            @if($data->functional_id == $functional->id )
                                                <option selected value="{{$functional->id}}">{{ $functional->functional_area }}</option>
                                            @else
                                                <option value="{{$functional->id}}">{{ $functional->functional_area }}</option>

                                            @endif
                                        @endforeach
                                        
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="job_category">{{ __('Job Category') }}</label>
                                <select class="form-select" name="job_category">

                                    @foreach($categories as $category)
                                        @if($data->category_id == $category->id)
                                        <option selected value="{{$category->id}}">{{ $category->job_category }}</option>
                                        @else
                                        <option value="{{$category->id}}">{{ $category->job_category }}</option>
                                        @endif
                                    @endforeach

                                </select>     
                        </div>
                        
                        
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="job_time">{{ __('Job Time') }}</label>                                

                                <select name="job_time" class="form-select">
                                    @if($data->job_time == 'fulltime')
                                        <option selected value="fulltime">Full Time</option>
                                        <option value="partime">Part Time</option>
                                    @endif
                                    @if($data->job_time == 'partime')
                                        <option value="fulltime">Full Time</option>
                                        <option selected value="partime">Part Time</option>
                                    @endif
                                </select>     
                            </div>

                            <div class="form-group col-md-6">
                                <label for="work_from_home">{{ __('Work From Home') }}</label>
                                
                                <select class="form-select" name="work_from_home">
                                    @if($data->work_from_home == 'yes')
                                        <option selected value="yes">Yes</option>
                                        <option value="no">No</option>
                                    @endif
                                    @if($data->work_from_home == 'no')
                                        <option value="yes">Yes</option>
                                        <option selected value="no">No</option>
                                    @endif
                                </select>     
                            </div>
                        </div>    

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="vacancies">{{ __('Number of Vacancies') }}</label>                                
                                <input id="vacancies" value="{{ $data->vacancies }}" placeholder="Vacancies" type="text" class="form-control @error('vacancies') is-invalid @enderror" name="vacancies" required autocomplete="vacancies">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gender">{{ __('Gender Preference') }}</label>
                                
                                <select class="form-select" name="gender">
                                    @if($data->gender == 'male')
                                        <option value="any">Any</option>
                                        <option value="male"  selected>Male</option>
                                        <option value="female">Female</option>
                                    @endif
                                    @if($data->gender == 'female')
                                        <option value="any">Any</option>
                                        <option value="male">Male</option>
                                        <option value="female" selected>Female</option>
                                    @endif
                                    @if($data->gender == 'any')
                                        <option value="any" selected>Any</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    @endif

                                </select>     
                            </div>
                        </div>    

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="minimum_age">{{ __('Minimum Age') }}</label>
                                <input value="{{ $data->minimum_age }}" id="minimum_age" placeholder="Minimum Age" type="text" class="form-control @error('minimum_age') is-invalid @enderror" name="minimum_age" required autocomplete="minimum_age">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="maximum_age">{{ __('Maximum Age') }}</label>
                                <input value="{{ $data->maximum_age }}" id="maximum_age" placeholder="Maximum Age" type="text" class="form-control @error('maximum_age') is-invalid @enderror" name="maximum_age" required autocomplete="maximum_age">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="qualificaion">{{ __('Qualificaion') }}</label>
                                <input value="{{ $data->qualification }}" id="qualification" placeholder="Qualification" type="text" class="form-control @error('qualification') is-invalid @enderror" name="qualification" required autocomplete="qualification">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="experience">{{ __('Experience') }}</label>                                
                                <input value="{{ $data->experience }}" id="experience" placeholder="Experience" type="text" class="form-control @error('experience') is-invalid @enderror" name="experience" required autocomplete="experience">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="benefits">{{ __('Job Benefits') }}</label>
                            <textarea id="benefits" placeholder="Job Benefits" class="form-control @error('benefits') is-invalid @enderror" name="benefits" required autocomplete="benefits" autofocus>{{ $data->benefits }}</textarea>
                        </div>
                  
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="currency">{{ __('Salary Currency') }}</label>
                                
                                <select class="form-select" name="currency">
                                    @if($data->currency == 'rupees')
                                        <option selected value="rupees">Rupees</option>
                                        <option value="dolar">Dolar</option>
                                    @endif
                                    @if($data->currency == 'dolar')
                                        <option value="rupees">Rupees</option>
                                        <option selected value="dolar">Dolar</option>
                                    @endif
                                </select>     
                            </div>

                            <div class="form-group col-md-4">
                                <label for="minimum_salary">{{ __('Minimum Salary') }}</label>
                                <input id="minimum_salary" value="{{ $data->minimum_salary }}" placeholder="Minimum Salary" type="text" class="form-control @error('minimum_salary') is-invalid @enderror" name="minimum_salary" required autocomplete="minimum_salary">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="maximum_salary">{{ __('Maximum Salary') }}</label>                                
                                <input value="{{ $data->maximum_salary }}" id="maximum_salary" placeholder="Maximum Salary" type="text" class="form-control @error('maximum_salary') is-invalid @enderror" name="maximum_salary" required autocomplete="maximum_salary">
                            </div>
                        </div>    

                        <div class="form-group">
                            <label for="organization_name">{{ __('Organization Name') }}</label>
                            <input id="organization_name" value="{{ $data->organization_name }}" placeholder="Organization Name" type="text" class="form-control @error('organization_name') is-invalid @enderror" name="organization_name" required autocomplete="organization_name" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="about_organization">{{ __('About Organization') }}</label>
                            <textarea id="about_organization" placeholder="About Organization" class="form-control @error('about_organization') is-invalid @enderror" name="about_organization" required autocomplete="about_organization" autofocus>{{ $data->about_organization }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="contact">{{ __('Contact Details') }}</label>
                            <input id="contact" value="{{ $data->contact }}" placeholder="Contact details" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" required autocomplete="contact">        
                        </div>

                        <div class="form-group">
                            <label for="skill">{{ __('Required skill') }}</label>                        
                            <input id="skill" value="{{ $data->skill }}" placeholder="Required skill" type="text" class="form-control @error('skill') is-invalid @enderror" name="skill" required autocomplete="skill">
                        </div>

                        <div class="d-flex justify-content-center">
                            <a class="btn btn-success" href="{{ url('applyjob/'.$data->id) }}">Apply</a>
                        </div>

                        @endif
                        @endforeach

         
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



    




  

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>

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