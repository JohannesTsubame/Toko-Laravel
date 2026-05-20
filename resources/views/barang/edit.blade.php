@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    .action {
        display: flex;
        justify-content: flex-end;
    }

    label {
        font-size: 20px
    }

    button {
        width: 80px;
    }
</style>

@extends("menu")
@section("content")

<div class="card">
    <div class="card-header" style="background: #303a4e">
        <h2 style="color:white">Edit Data Barang</h2>
    </div>
    <div class="card-body">
        <form action="{{route('barang.save')}}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2">ID Barang :</label>
                <div class="col-sm-10">
                    <input type="text" name="id_barang" class="form-control" required>
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('id_barang')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Nama Barang :</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('id_barang')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Varian :</label>
                <div class="col-sm-10">
                    <input type="text" name="varian" class="form-control" required>
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('id_barang')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Harga Beli (Rp) :</label>
                <div class="col-sm-10">            
                    <input type="number" name="harga_beli" class="form-control" required>
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('id_barang')
                    {{$message}}
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2">Harga Jual (Rp) :</label>
                <div class="col-sm-10">            
                    <input type="number" name="harga_jual" class="form-control" required>
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('id_barang')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="action">
                <button type="submit" class="btn btn-primary ml-2 mr-2" style="font-size: 20px">
                    Save
                </button>
                <a href="{{ route('barang.index') }}">
                <button type="submit" class="btn btn-danger ml-2 mr-2" style="font-size: 20px">
                    Exit
                </button>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection 