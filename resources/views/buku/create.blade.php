<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        
    </head>
    <body>
        @if (count($errors) > 0)
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <br><br>
        <h1 style="text-align:center;">Tambah Buku</h1>
        <br>
        <div class="container">
            <div class="card">   
                <div class="card-body">
                    <form method="post" action="{{ route('buku.store') }}">
                        @csrf
                        <div>Judul 
                            <input type="text" name="judul" style="margin:5px auto; width:100%; border:0.5px solid ;">
                        </div>
                        <br>
                        <div>Penulis 
                            <input type="text" name="penulis" style="margin:5px auto; width:100%; border:1px solid black;">
                        </div>
                        <br>
                        <div>Harga 
                            <input type="text" name="harga" style="margin:5px auto; width:100%; border:1px solid black;">
                        </div>
                        <br>
                        <div>Tgl. Terbit 
                            <input  class="date form-control" id="datepicker" name="tgl_terbit" style="margin:5px auto; width:100%; border:1px solid black;" placeholder="yyyy/mm/dd">
                        </div>
                        <br>
                        <div>
                            <button class="btn btn-success" type="submit">Simpan</button>
                            <a class="btn btn-danger" href="/buku" style="text-decoration:none;">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
        </script>
</body>
</html>