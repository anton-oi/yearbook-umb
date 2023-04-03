@extends('admin.layouts.app')

@section('content')
<section class="content">
        <form action="{{route('admin.store.wisudawan')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Mahasiswa Name</label>
                            <input type="text" name="mhs_name" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Study Program</label>
                            <input type="text" name="jurusan" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Level (e.g. Tingkat Universitas)</label>
                            <input type="text" name="tingkat" id="inputName" class="form-control">
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleInputFile">Photo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Add Mahasiswa Berprestasi" class="btn btn-success float-right">
            </div>
        </div>
</form>
</section>
@endsection