@extends('admin.template.master');

@section('css')
@endsection

@section('content')
    ;

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ $title }}</a></li>
                            <li class="breadcrumb-item active">{{ $subtitle }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                        <a href="{{ route('produk.index') }}" class="btn btn-sm btn-warning float-right">kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="form-create-produk" method="post">
                            <label for="">Nama Produk</label>
                            <input type="text" name="NamaProduk" class="form-control" required>
                            <label for="">Harga</label>
                            <input type="number" name="Harga" class="form-control" required>
                            <label for="">Stok</label>
                            <input type="number" name="Stok" class="form-control" required>
                            <button class="btn btn-primary mt-2" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#form-create-produk").submit(function(e) {
                e.preventDefault();
                dataForm = $(this).serialize() + "&_token={{ csrf-token() }}";
                $.ajax({
                    type: "POST",
                    url: "{{ route('produk.store') }}",
                    data: dataForm ,
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data.status == 200) {
                            window.location.href = "{{ route('produk.index') }}"
                        }
                    },
                    error:function(data){
                        console.log(data);
                        alert(data.responseJSON.message);
                    }
                });
            });
        });
    </script>
@endsection
