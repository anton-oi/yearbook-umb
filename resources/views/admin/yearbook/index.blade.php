@extends('admin.layouts.app')

@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Yearbook</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <a href="{{route('admin.yearbook.create')}}" class="btn btn-block btn-primary btn-sm m-3">Add Yearbook</a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th>
                            File Name
                        </th>
                        <th>
                            URL
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                {{$pdfs}}
                <tbody>
                    @foreach($pdfs as $pdf)
                    <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>
                            {{$pdf->name}}
                        </td>
                        <td>
                            {{$pdf->url}}
                        </td>
                        <td class="d-flex">
                            <a class="btn btn-primary btn-sm mr-2" href="{{route('yearbook.show', $pdf->url)}}" target="_blank">
                                <i class="fas fa-eye">
                                </i>
                                Show
                            </a>
                            <form method="POST" action="{{route('admin.yearbook.destroy', $pdf->id)}}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin untuk hapus data ini ?')">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </button>
                                <a href="{{route('edit.pdf', $pdf->id)}}" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit">
                                    </i>
                                    Edit
                                </a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endsection
