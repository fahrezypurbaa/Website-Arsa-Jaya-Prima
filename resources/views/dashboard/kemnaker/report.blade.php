<!DOCTYPE html>
<html>
<head>
    <title>Laravel 11 Generate PDF Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>
    
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Program</th>
            <th>Email</th>
            <th>No Telepon</th>
            <th>Perusahaan</th>
            <th>Alamat Perusahaan</th>
        </tr>
        @foreach($pendaftars as $pendaftar)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pendaftar->name }}</td>
            <td>{{ $pendaftar->training->name }}</td>
            <td>{{ $pendaftar->email }}</td>
            <td>{{ $pendaftar->phone }}</td>
            <td>{{ $pendaftar->company }}</td>
            <td>{{ $pendaftar->company_address}}</td>
        </tr>
        @endforeach
    </table>
  
</body>
</html>
