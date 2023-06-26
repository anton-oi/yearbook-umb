@extends('layouts.app')

@section('content')
<div class="background-big">
    <div class="container">
        <div class="py-5">
            <h1>Events</h1>
            <div>
                <div class="row">
                    @foreach($events as $event)
                    <div class="col-md-6 my-2">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 text-center display-2">
                                    <div class="badge badge-primary">{{ date('d', strtotime($event->date)) }}</div>
                                    <p style="margin-bottom: -34px !important;">{{ date('M', strtotime($event->date)) }}</p>
                                    <p class="m-0">{{ date('Y', strtotime($event->date)) }}</p>
                                </div>
                                <div class="col-md-8">
                                    <div class="font-weight-light display-4">{{ $event->title }}</div>
                                    <p class="font-weight-light" style="font-size: 40px;">{{ $event->location }}</p>
                                    <a class="font-weight-light" href="{{route('event.detail', $event->id)}}" style="font-size: 40px;">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
