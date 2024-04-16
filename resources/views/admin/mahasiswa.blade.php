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
<body class="container d-flex flex-column justify-content-center align-items-center" style="width: 100vw; height: 100vh;">
<h1>Ini halaman Admin</h1>
<h2>Selamat datang</h2>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nama</th>
        <th scope="col">NRP</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->nrp }}</td>
            <td><a class="btn btn-warning" href="{{ route('admin.matakuliah-mahasiswa-ubah', ['course' => $course->id, 'student' => $student->id]) }}">Ubah</a></td>
            <td>
                <form action="{{ route('admin.matakuliah-mahasiswa-destroy', ['course' => $course->id, 'student' => $student->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a href="{{ route('admin.matakuliah-mahasiswa.tambah', ['course' => $course->id ]) }}" class="btn btn-primary">Tambah</a>
@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif
</body>
</html>
