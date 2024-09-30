<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Search Result</title>
  </head>
  <body>

  <div class="container pt-5">
  <div class="row">
    <div class="col col-md-4"><a class="btn btn-success" href="/create">Add New</a></div>
    <div class="col col-md-8">
      <form class="form-inline" method="post" action="/search">
        @csrf
      <div class="form-group mx-sm-3 mb-2">
        <input type="text" name="text" class="form-control" id="inputPassword2" placeholder="Text to search">
        <button type="submit" class="btn btn-primary mb-2">Search</button>
      </div>
      
      </form>
    </div>
  </div>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Designation</th>
      <th scope="col">Join Date</th>
      <th scope="col">Salary</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile No</th>
      <th scope="col">Address</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($employees as $employee)
    <tr>
      <td>{{ $employee->id }}</td>
      <td>{{ $employee->name }}</td>
      <td>{{ $employee->designation }}</td>
      <td>{{ $employee->joining_date }}</td>
      <td>{{ $employee->salary }}</td>
      <td>{{ $employee->email }}</td>
      <td>{{ $employee->mobile_no }}</td>
      <td>{{ $employee->address }}</td>
      <td>
        <a class="btn btn-sm btn-danger" href="/delete/{{$employee->id}}" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</a>
        <a class="btn btn-sm btn-warning" href="{{ route('employee.update', $employee->id) }}">Update</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
  </div>
    
    
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
