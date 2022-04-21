@component('mail::message')
# Applicants for your job

<br>
<br>
<br>

<table class="table"style=" background-repeat:no-repeat; width:450px;margin:0; " cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th scope="col" style = "border: 1px solid;">Name</th>
      <th scope="col"  style = "border: 1px solid;">Number</th>
      <th scope="col"  style = "border: 1px solid;">Functional Area</th>
      <th scope="col"  style = "border: 1px solid;">Skill</th>
    </tr>
  </thead>
  <tbody>
        @foreach($applications as $application)
    <tr>
          <td  style = "border: 1px solid;">{{$application->full_name}}</td>
          <td  style = "border: 1px solid;">{{$application->number}}</td>
          <td  style = "border: 1px solid;">{{$application->functional_area}}</td>
          <td  style = "border: 1px solid;">{{$application->skill}}</td>
    </tr>
        @endforeach
  </tbody>
</table>


<br>
<br>
<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
