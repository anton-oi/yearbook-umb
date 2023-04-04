@extends('layouts.app')

@section('content')
<div class="background-big">
    <div class="container-fluid p-0 m-0">
        <div class="bg-hero px-5 py-5">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">HOME</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">UMB WEBSITE</a></li>
                    <li class="breadcrumb-item active" aria-current="page">VIRTUAL TOUR</li>
                </ol>
            </nav>
            <div class="row d-flex flex-row-reverse mb-5">
                <div class="embed-responsive embed-responsive-1by1 col-12 col-lg-7 px-5">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/-_hKLLiLCT4" frameborder="0" width="100%" height="100%"></iframe>
                </div>
                <div class="col-12 col-lg-5 px-5">
                    <div class="row">
                        <div class="col-12 col-lg-3 mt-3">
                            <h1 class="text-white" style="font-size: 7em; line-height: 80%;">
                                UMB
                                Digital
                                Yearbook
                            </h1>
                            <div class="bg-white" style="height: 15px; opacity: 0.4"></div>

                            <a href="/yearbook" class="btn btn-lg btn-download rounded-pill px-5 py-2 mt-5">DOWNLOAD</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container p-5">
        <section class="border-bottom border-1 border-black my-5">
            <div class="text-center">
                <h2 style="font-size: 3rem; letter-spacing: 3px;">Selamat Wisuda !</h2>
                <p class="font-weight-light" style="font-size: 2em; letter-spacing: 3px;">Selamat datang menuju jalan yang baru. Kini saatnya untuk berjuang demi kehidupan di masa depan. </p>
            </div>
        </section>
        
        <section class="mt-5 mb-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 100%;">
                <ol class="carousel-indicators">
                    @foreach($items as $item)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$item->id}}" class="{{$loop->first ? 'active' : ''}}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                @foreach($items as $item)
                    <div class=" {{$loop->first ? 'carousel-item active' : 'carousel-item'}}">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <img src="{{$item->image}}" class="rounded-lg" alt="Image" width="100%">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="d-flex justify-content-start align-items-center mt-5">
                                    <img src="img/logo.png" alt="logo-image" height="40">
                                    <div class="bg-grey ml-3" style="width: 20px; height: 1px;"></div>
                                    <h5 class="font-weight-lighter ml-3 mt-3" style="line-height: 10px;">WISUDAWAN TERBAIK</h5>
                                </div>
                                <div>
                                    <div class="mt-3 font-weight-light" style="font-size: 26px;">{{$item->tingkat}}</div>
                                    <div class="font-weight-light" style="font-size: 42px;">{{$item->mhs_name}}</div>
                                    <div class="border-top border border-5 border-primary" style="width: 40px; opacity: 0.4"></div>
                                    <span class="font-weight-light" style="font-size: 22px;">{{$item->jurusan}}</span>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                    <div class="bg-grey text-center d-flex justify-content-center p-4 rounded-circle">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </div>

                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                    <div class="bg-grey text-center d-flex justify-content-center p-4 rounded-circle">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </div>
                </button>
            </div>
        </section>
    </div>
</div>
@endsection