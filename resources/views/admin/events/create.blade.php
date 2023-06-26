@extends('admin.layouts.app')

@section('content')
<section class="content">
    <form action="{{route('admin.events.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Event</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Event Title</label>
                            <input type="text" name="title" id="inputName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Event Venue</label>
                            <input type="text" name="location" id="inputName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Date and time</label>
                            <input type="datetime-local" name="date" id="inputName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Covers</label>
                            <input type="file" name="covers[]" multiple="multiple" accept="image/jpeg, image/png, image/jpg">
                            <output></output>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Add Event" class="btn btn-success float-right">
            </div>
        </div>
    </form>
</section>
@endsection