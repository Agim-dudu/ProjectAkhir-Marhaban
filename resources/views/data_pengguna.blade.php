<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid"> 
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="{{route('index')}}">Home</a>
                    <a class="nav-link active" href="{{ route('admin.data_pengguna.index') }}">Data Pengguna</a>
                    <a class="nav-link" href="{{route('admin.data_florafauna.index')}}">Flora & Fauna</a>
                    <a class="nav-link" href="{{route('admin.history')}}">History Tiket</a>
                    <a class="nav-link" href="{{route('admin.data_fasilitas.index')}}">Fasilitas</a>
                    <a class="nav-link" href="{{route('admin.data_galery.index')}}">Galery</a>
                    <a class="nav-link" href="{{route('admin.data_contact.index')}}">Pesan Pengguna</a>
                </div>
            </div>
            <div class="text-end d-flex align-items-center">
                <div class="user me-3">
                    Halo, {{ Auth::user()->name }}
                </div>
                <div class="logout">
                    <form action="{{ route('logout') }}" method="POST" style="display: inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout<i class="fa fa-arrow-right ms-3"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>


    <div class="container mt-3">
        <div class="row">
            <div class="col-md-10">
                <h1>Data Pengguna</h1>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Email</th>
                            <th scope="col">Level</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $n= 1;
                        @endphp
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $n }}</th>
                            <td>{{ $user->avatar }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->jenis_kelamin }}</td>
                            <td>{{ $user->no_telpon }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ($user->is_admin)== 1 ? "Admin" : "Pengguna" }}</td>
                            <td>
                                <a href="{{route('admin.data_pengguna.edit', $user->id)}}" class="btn btn-primary mb-3">Edit</a>
                                <form action="{{ route('admin.data_pengguna.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"
                                        onclick="confirm('anda yakin ingin menghapus data ini? ')"
                                        type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $n++;
                        @endphp
                        @endforeach


                    </tbody>
                  </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>