@extends('layouts.app')

@section('content')
    <div class="container pb-5">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-4">Archive {{date("F", mktime(0, 0, 0, request()->route('month'), 1))}} {{request()->route('year')}}</h1>
            </div>
        </div>
        @foreach($years as $year)
        <div class="row mb-5">
            <div class="col-12">
                <div class="card text-secondary p-0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <a href="{{url('pdf/'.$year->url)}}" role="button" target="_blank" class="text-decoration-none">
                                    <h5 class="text-dark mt-3">{{$year->name}}</h5>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <div class="float-right">
                                    <button class="btn btn-light text-primary mr-1" data-toggle="modal" data-target="#exampleModalCenter" data-file="{{$year->url}}">Download</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       @endforeach
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="exampleModalLongTitle">Download Ebook Yearbook Sekarang Juga!!</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="modal-image d-flex justify-content-center mb-3">
                    <img src="{{asset('img/download.png')}}" alt="download" height="100">
                </div>
                <div class="font-24" id="alert"></div>
		            <div class="d-flex justify-content-center">
                        <h5 class="font-24 mr-2 mt-2">Masukan Password : </h5>
                        <form id="modal-form">
                        <input type="text" class="form-control form-control-sm" name="password" id="password" style="font-size: 1.4em">
                        </form>
                    </div>
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-light text-primary rounded-pill px-4 py-2" id="download">Download File</button>
            </div>
          </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
    let file = null;
    jQuery(document).ready(function() {
        $('#exampleModalCenter').on('show.bs.modal', function (event) {
            file = $(event.relatedTarget).data('file');
        });
        $('#download').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            var formData = {
                password: $('#password').val(),
                file: file
            };
    
            $.ajax({
                type: "GET",
                url: "/download/pdf",
                data: formData,
                success: function (data){
                    window.open(data, '_blank')
                },
                error: function (data) {
                    console.log(data)
                    $('#alert').append(`
                    <div class="alert alert-danger" role="alert">
                        `+data.responseJSON.message+`   
                    </div>
                    `)
                }
            })
        })
    })
</script>