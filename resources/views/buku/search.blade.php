<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body>
        @if(Session::has('pesan'))
            <div class="alert alert-success">{{ Session::get('pesan') }}</div>
        @elseif(Session::has('hapus'))
            <div class="alert alert-danger">{{ Session::get('hapus') }}</div>
        @elseif(Session::has('update'))
            <div class="alert alert-success">{{ Session::get('update') }}</div>
        @endif 

        @if(count($data_buku))
            <div class="alert alert-success">Ditemukan <strong>{{ count($data_buku) }}</strong> data dengan kata <strong>{{ $cari }}</strong></div>
        @else
            <div class="alert alert-warning">
                <h4>Data {{ $cari }} tidak ditemukan</h4>
                <a href="/buku" class="btn btn-warning">Kembali</a>
        </div>
        @endif

        <h1 style="text-align:center;">Data Buku</h1>
            <div class="container">
                <br><br>
                <div class="card">   
                    <div class="card-body">
                        <table class="table table-striped" style="margin-top:2em; text-align:center;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Judul Buku</th>
                                <th>Penulis</th>
                                <th>Harga</th>
                                <th>Tgl. Terbit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data_buku as $buku)
                                <tr>
                                    <td>{{ $buku->id }}</td>
                                    <td>{{ $buku->judul }}</td>
                                    <td>{{ $buku->penulis }}</td>
                                    <td>{{ "Rp ".number_format($buku->harga, 0, ',', ',') }}</td>
                                    <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                                    <td style="display:flex;">
                                        <form action="{{ route('buku.destroy', $buku->id) }}" method="post" style="padding-left:2em;">
                                            @csrf
                                            <button class="btn btn-danger" onClick="return confrim('Yakin mau dihapus?')">Hapus</button>    
                                        </form>
                                        <a class="btn btn-primary" href="{{ route('buku.tampilData', $buku->id) }}" style="margin-left:1em;">Update</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>  
                    </table>
                    <p style="text-align:right; margin-right:2em;">
                        <a class="btn btn-success" href="{{ route('buku.create') }}" style="text-decoration:none;">Tambah Buku</a>
                    </p>
                </div>
            </div>    
        </div> 
        <br>
        <div class="d-flex justify-content-center">{{ $data_buku->links() }}</div> 
    </body>
</html>
