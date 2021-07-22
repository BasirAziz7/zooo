@extends('base')
@section('content')

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<div class="container py-5">
<div class="row">
<div class="col-6 bg-light">
<h3>Senarai Haiwan</h3>

<div class="col-6">


<ul>
    @foreach ($haiwans as $haiwan)
    <li style="text-transform:"> Nama:{{$haiwan->nama}} jenis: {{$haiwan->jenis}}, Harga: {{$haiwan->harga}}</li>
        
    @endforeach 
</ul>

<form method="POST" action="/haiwans">
@csrf
                <div class="form-group">
                    <label for="">Nama :</label>
                    <input class="form-control mb-3" type="text" name="nama">
                    <label for="">Jenis :</label>
                    <input class="form-control mb-3" type="text" name="jenis">
                    <label for="">Harga :</label>
                    <input class="form-control mb-3" type="text" name="harga">
                    
                </div>
                <input type="hidden" name="kedai_id" value=1>
                <button class="btn btn-primary" type="submit">Tambah</button>
            </form>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-12">
            <h3>Data from SWAPI</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Manufacturer</th>
                </tr>
                @foreach ($dataAPI as $data)
                <tr>
                    <td>{{ $data['name'] }}</td>
                    <td>{{ $data['model'] }}</td>
                    <td>{{ $data['manufacturer'] }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<div class="container mt-5">
        <form action="/fails" method="post" enctype="multipart/form-data">
          <h3 class="text-center mb-5">Upload File in Laravel</h3>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload Files
            </button>
        </form>
    </div>



@stop

