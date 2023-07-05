@extends('layouts.app')
@section('headscript')
<script>
    let eventt = {!! json_encode($event) !!}

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
            left: null,
            center: 'title',
            right: null
            },
          initialView: 'dayGridMonth',
          displayEventTime: false,
          events: [
              {
                  groupId: 'testGroupId',
                  start: new Date(eventt.date),
                  end: new Date(eventt.date),
                  display: 'block',
                  backgroundColor: "#5ef211",
                  color: '#378006',
                }
            ],
        });
        calendar.render();
      });

    </script>
@endsection
@section('content')
<div class="background-big">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-dark justify-content-center mt-3">
            <li class="breadcrumb-item"><a class="text-dark" href="/">HOME</a></li>
            <li class="breadcrumb-item"><a class="text-dark" href="#">EVENT</a></li>
        </ol>
    </nav>
    <div class="container-fluid bg-hero-full py-5" >
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($event->covers as $item)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$item->id}}" class="{{$loop->first ? 'active' : ''}}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($event->covers as $item)
                        <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                            <img src="{{$item->url}}" class="d-block mx-auto w-55" alt="Image">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="top-150"></div>
    <div class="container">
        <div class="py-5 d-flex flex-column justify-content-center align-items-center text-center">
            <h3 style="font-size: 3rem; letter-spacing: 3px;">Don't Miss It!</h3>
            <p class="font-weight-light" style="font-size: 2rem;">{{ $event->title }}</p>
            <p class="font-weight-light" style="font-size: 2rem;">{{ date('D, d M Y', strtotime($event->date))  }}</p>
            <p class="fw-bold" style="font-size: 2rem;">MARK YOUR CALENDAR !</p>

            <div id='calendar' style="width: 100%;font-size: 2rem;"></div>

            <div id="datetimer" class="d-flex flex-row align-items-center gap-4" style="font-size: 6vw; margin-top:30px;">
                <div class="d-flex">
                    <span id="days"></span>
                    <span> Days</span>
                </div>
                <div>/</div>
                <div>
                    <span id="hours"></span>
                    <span>Hours</span>
                </div>
                <div>/</div>
                <div>
                    <span id="minutes"></span>
                    <span>Minutes</span>
                </div>
                <div>/</div>
                <div>
                    <span id="seconds"></span>
                    <span>Seconds</span>
                </div>
            </div>

            <p style="font-size: 4rem; letter-spacing: 3px;" id="graduate">To Graduation!</p>
        </div>
    </div>
</div>
@endsection

<script>
    let event = {!! json_encode($event) !!}

    function startCounter() {
        let _second = 1000
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;

        setInterval(() => {
            let endDate = new Date(event.date)
            let now = new Date()
            let different = endDate - now

            if (different <= 0) {
                let timer = document.getElementById('datetimer')
                let graduate = document.getElementById('graduate')
                timer.classList.value = 'd-none'
                graduate.innerHTML = 'Event Sedang Berlangsung'
                console.log(timer);
                return
            }

            var days = Math.floor(different / _day);
            var hours = Math.floor((different % _day) / _hour);
            var minutes = Math.floor((different % _hour) / _minute);
            var seconds = Math.floor((different % _minute) / _second);

            document.getElementById('seconds').innerHTML = seconds
            document.getElementById('minutes').innerHTML = minutes
            document.getElementById('hours').innerHTML = hours
            document.getElementById('days').innerHTML = days
        }, 1000)
    }
    document.addEventListener('DOMContentLoaded', () => {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
        startCounter()
    })
</script>
