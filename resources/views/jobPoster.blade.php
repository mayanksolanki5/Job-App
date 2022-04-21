<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title></title>
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Number</th>
      <th scope="col">Functional Area</th>
      <th scope="col">Skill</th>
    </tr>
  </thead>
  <tbody>
        @foreach($applications as $application)
    <tr>
          <td>{{$application->full_name}}</td>
          <td>{{$application->number}}</td>
          <td>{{$application->functional_area}}</td>
          <td>{{$application->skill}}</td>
    </tr>
        @endforeach
  </tbody>
</table>
</body>
</html>