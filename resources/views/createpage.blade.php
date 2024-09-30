<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Get All</title>
  </head>
  <body>

    <div class="container pt-5 pb-5">
    <form action="/create" method="post">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input name="name" value="{{old('name')}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    @error('name')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Designation</label>
    <input name="designation" value="{{old('designation')}}" type="text" class="form-control" id="exampleInputPassword1">
    @error('designation')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Join Date</label>
    <input name="joining_date"  value="{{old('joining_date')}}" type="date" class="form-control" id="exampleInputPassword1">
    @error('joining_date')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Salary</label>
    <input name="salary"  value="{{old('salary')}}" type="number" class="form-control" id="exampleInputPassword1">
    @error('salary')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input name="email"  value="{{old('email')}}" type="email" class="form-control" id="exampleInputPassword1">
    @error('email')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mobile No.</label>
    <input name="mobile_no" value="{{old('mobile_no')}}" type="phone" class="form-control" id="exampleInputPassword1">
    @error('mobile_no')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Address</label>
    <input name="address" value="{{old('address')}}" type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>
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
