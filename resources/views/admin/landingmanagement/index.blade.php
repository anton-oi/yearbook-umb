@extends('admin.layouts.app')

@section('content')
<section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Wisudawan Berprestasi</h3>
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
                <a href="{{route('admin.create.wisudawan')}}" class="btn btn-block btn-primary btn-sm m-3">Add Wisudawan</a>
            </div>
        </div>
        <div class="card-body p-0">   
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Mahasiswa Name
                      </th>
                      <th style="width: 30%">
                          Study
                      </th>
                      
                      <th style="width: 8%" class="text-center">
                        Level
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($carousels as $carousel)
                  <tr>
                      <td>
                          {{$loop->iteration}}
                      </td>
                      <td>
                          {{$carousel->mhs_name}}
                      </td>
                      <td>
                          {{$carousel->jurusan}}
                      </td>
                      
                      <td class="project-state">
                          {{$carousel->tingkat}}
                      </td>
                      <td class="project-actions text-right">
                        <form method="POST" action="{{route('admin.delete.wisudawan', $carousel->id)}}">
                          @csrf
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus item ini ?')">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </button>
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