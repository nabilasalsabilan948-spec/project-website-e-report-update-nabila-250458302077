@extends('template.base')

@section('windy')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <a href="#">Table Data Category</a>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard Category</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <!-- kalo pas manggil modal, dia ga muncul, tambahin -bs- di data toggle sama data targetnya -->
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Tambah Category</a>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <!-- alert create -->
            @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ Session::get('success')}}
            </div>
            @endif
            @if (Session::get('delete'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ Session::get('delete')}}
            </div>
            @endif
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Category</th>
                  <th>Slug</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($category as $jun)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $jun->category }}</td>
                  <td>{{ $jun->slug }}</td>
                  <td>
                    <a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#edit{{ $jun->id }}"><i class="fa-solid fa-pencil"></i></a>
                    @include('Admin.category.modalUpdate')
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $jun->id }}"><i class="fa-solid fa-trash"></i></a>
                    @include('Admin.category.modalDelete')
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
</section>

<!-- modal create -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('create.category') }}" method="post">
          @csrf
          <div class="form-group">
            <input type="text" name="category" class="form-control" placeholder="Masukkan Data Category !">
          </div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  </form>
  <!-- /.modal-dialog -->
</div>

@endsection