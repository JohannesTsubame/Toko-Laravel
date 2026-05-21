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
        <h2 style="color:white">Tambah Data Pembelian</h2>
        <a href="{{route('pembelian.index')}}">
            <i class="fa fa-arrow-left" style="color: white; font-size:40px"></i>
        </a>
    </div>
    <div class="card-body">
        <form action="{{route('pembelian.save')}}" method="POST">
            @csrf
            
            <div class="form-group row">
                <label class="col-sm-2">ID Pembelian : </label>
                <div class="col-sm-10">
                    <input type="text" name="id_pembelian" class="form-control" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Nama Barang : </label>
                <div class="col-sm-10">
                    <select name="id_barang" class="form-control" required>
                        <option value="">- - SELECT - -</option>
                        @foreach ($barang as $b)
                        <option value="{{$b->id}}">
                            {{$b->nama}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Supplier : </label>
                <div class="col-sm-10">
                    <select name="id_supplier" class="form-control" required>
                        <option value="">- - SELECT - -</option>
                        @foreach ($supplier as $s)
                        <option value="{{$s->id}}">
                            {{$s->nama}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

        
            <div class="form-group row">
                <label class="col-sm-2">Quantity :</label>
                <div class="col-sm-10">
                    <input type="number" name="qty" class="form-control" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Tanggal Pembelian :</label>
                <div class="col-sm-10">
                    <input type="date" name="tgl" class="form-control" required>
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