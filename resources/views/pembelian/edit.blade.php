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
        <h2 style="color:white">Edit Data Pembelian</h2>
        <a href="{{route('pembelian.index')}}">
            <i class="fa fa-arrow-left" style="color: white; font-size:40px"></i>
        </a>
    </div>
    <div class="card-body">
        <form action="{{route('pembelian.update', $pembelian->id_pembelian)}}" method="POST">
            @csrf
            @method("PUT")


            <div class="form-group row">
                <label class="col-sm-2">ID Pembelian : </label>
                <div class="col-sm-10">
                    <input type="text" name="id_pembelian" class="form-control" required readonly value="{{old('id_pembelian', $pembelian->id_pembelian)}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Nama Barang : </label>
                <div class="col-sm-10"> 
                <select name="id_barang" class="form-control">
                    @foreach ($barang as $b)
                        <option value="{{$b->id}}" {{old('id_barang', $pembelian->id_barang) == $b->id ? 'selected' : ''}}>
                            {{$b->nama}}
                        </option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Nama Supplier : </label>
                <div class="col-sm-10"> 
                    <select name="id_supplier" class="form-control">
                        @foreach ($supplier as $s)
                            <option value="{{$s->id}}" {{old('id_supplier', $pembelian->id_supplier) == $s->id ? 'selected' : ''}}>
                                {{$s->nama}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Quantity :</label>
                <div class="col-sm-10">
                    <input type="text" name="qty" class="form-control" required value="{{old('qty', $pembelian->qty)}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Tanggal Pembelian :</label>
                <div class="col-sm-10">
                    <input type="date" name="tgl" class="form-control" required value="{{old('tgl', $pembelian->tgl)}}">
                </div>
            </div>
            
            <div class="action">
            <button type="submit" class="btn btn-primary" style="font-size:20px;">
                <i class="fa fa-save mr-2"></i> Save
            </button>
            </div>
        </form>
    </div>
</div>

@endsection