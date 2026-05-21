@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    .card-header {
        display: flex;
        justify-content: space-between;
    }

    .action {
        display: flex;
        justify-content: flex-end;
    }

    label {
        font-size: 20px
    }

    button {
        width: 120px;
    }
</style>

@extends("menu")
@section("content")

<div class="card">
    <div class="card-header" style="background: #303a4e">
        <h2 style="color:white">Tambah Data Supplier</h2>
        <a href="{{route('supplier.index')}}">
            <i class="fa fa-arrow-left" style="color: white; font-size:40px"></i>
        </a>
    </div>
    <div class="card-body">
        <form action="{{route('supplier.save')}}" method="POST">
            @csrf

            <div class="form-group row">
                <label class="col-sm-2">ID supplier : </label>
                <div class="col-sm-10">
                    <input type="text" name="id_supplier" class="form-control" required>
                </div>
                <div class="error" style="margin-top: 10px">
                    @error("id_supplier")
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Nama : </label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="error" style="margin-top: 10px">
                    @error("nama")
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Alamat : </label>
                <div class="col-sm-10">
                    <input type = "text" name="alamat" class="form-control" required>
                </div>
            </div>
        
            <div class="form-group row">
                <label class="col-sm-2">Kode Pos :</label>
                <div class="col-sm-10">
                    <input type="text" name="kode_pos" class="form-control" required>
                </div>
                <div class="error" style="margin-top: 10px">
                    @error("id_pembeli")
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Kota :</label>
                <div class="col-sm-10">
                    <input type="text" name="kota" class="form-control" required>
                </div>
            </div>

            <div class="action">
                <button type="submit" class="btn btn-primary" style="font-size:20px">
                    <i class="fa fa-save mr-2"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>
@endsection