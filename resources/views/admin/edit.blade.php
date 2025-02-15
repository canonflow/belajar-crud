<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</head>
<body>
<h1>Edit Mata Kuliah</h1>
<form action="{{ route('admin.simpan-matakuliah', ['course' => $course->id]) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama Mata Kuliah</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="{{ $course->name }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Semester</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="semester" value="{{ $course->semester }}">
    </div>
    <button class="btn btn-primary">Ubah</button>
</form>
@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif
</body>
</html>
