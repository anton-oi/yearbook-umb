@extends('admin.layouts.app')

@section('content')
<section class="content">
        <form action="{{route('admin.yearbook.store')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Yearbook</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Yearbook Title</label>
                            <input type="text" name="name" id="inputName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Yearbook Cover</label>
                            <input type="file" name="cover" id="cover" class="form-control" accept=".png,.jpg,.jpeg" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">PDF Yearbook File</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="pdf" accept="application/pdf" class="custom-file-input" id="exampleInputFile" required>
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Add Yearbook" class="btn btn-success float-right">
            </div>
        </div>
</form>
</section>
@endsection
