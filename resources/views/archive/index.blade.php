@extends('layouts.app')

@section('content')
    <div class="container pb-5">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-4">Archive</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($years as $year)
            <a href="{{url('archive/year'.'/'.$year->month.'/'.$year->year)}}" class="card mr-2 mb-3 col-lg-3 col-md-3 col-sm-12 py-2 cursor-pointer text-decoration-none" role="button">
                <h5 class="text-dark text-center mt-2">
                    {{date("F", mktime(0, 0, 0, $year->month, 1))}} {{$year->year}}
                </h5>
            </a>
            @endforeach
        </div>
       
    </div>
@endsection