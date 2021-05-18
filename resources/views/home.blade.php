@extends('layouts.app')

@section('content')
    <style>
        .card-counter{
            box-shadow: 2px 2px 10px #DADADA;
            margin: 5px;
            padding: 20px 10px;
            background-color: #fff;
            height: 100px;
            border-radius: 5px;
            transition: .3s linear all;
        }

        .card-counter:hover{
            box-shadow: 4px 4px 20px #DADADA;
            transition: .3s linear all;
        }

        .card-counter.primary{
            background-color: #007bff;
            color: #FFF;
        }

        .card-counter.danger{
            background-color: #ef5350;
            color: #FFF;
        }

        .card-counter.success{
            background-color: #66bb6a;
            color: #FFF;
        }

        .card-counter.info{
            background-color: #26c6da;
            color: #FFF;
        }

        .card-counter i{
            font-size: 5em;
            opacity: 0.2;
        }

        .card-counter .count-numbers{
            position: absolute;
            right: 35px;
            top: 20px;
            font-size: 32px;
            display: block;
        }

        .card-counter .count-name{
            position: absolute;
            right: 35px;
            top: 65px;
            font-style: italic;
            text-transform: capitalize;
            opacity: 0.5;
            display: block;
            font-size: 18px;
        }
    </style>
    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card-counter primary">
                            <i class="fa fa-list"></i>
                            <span class="count-numbers">
                                @php
                                    echo \App\Models\Category::all()->count();
                                @endphp
                            </span>
                            <span class="count-name">Kategoriya</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter danger">
                            <i class="fa fa-newspaper-o"></i>
                            <span class="count-numbers">
                                @php
                                    echo \App\Models\Post::all()->count();
                                @endphp
                            </span>
                            <span class="count-name">Yangiliklar</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter success">
                            <i class="fa fa-question"></i>
                            <span class="count-numbers">
                                 @php
                                     echo \App\Models\Question::all()->count();
                                 @endphp
                            </span>
                            <span class="count-name">Savollar</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter info">
                            <i class="fa fa-envelope"></i>
                            <span class="count-numbers">
                                 @php
                                     echo \App\Models\Contact::all()->count();
                                 @endphp
                            </span>
                            <span class="count-name">Murojatlar</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter danger">
                            <i class="fa fa-tags"></i>
                            <span class="count-numbers">
                                 @php
                                     echo \App\Models\Tag::all()->count();
                                 @endphp
                            </span>
                            <span class="count-name">Teglar</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter info">
                            <i class="fa fa-gears"></i>
                            <span class="count-numbers">
                                 @php
                                     echo \App\Models\Setting::all()->count();
                                 @endphp
                            </span>
                            <span class="count-name">Sayt Malumotlari</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-counter primary">
                            <i class="fa fa-bar-chart"></i>
                            <span class="count-numbers">
                                 @php
                                     echo \App\Models\Statistic::all()->count();
                                 @endphp
                            </span>
                            <span class="count-name">Statistika</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-counter danger">
                            <i class="fa fa-picture-o"></i>
                            <span class="count-numbers">
                                 @php
                                     echo \App\Models\Logo::all()->count();
                                 @endphp
                            </span>
                            <span class="count-name">Logotiplar</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--End Dashboard Content-->
    <!--start overlay-->
    <div class="overlay toggle-menu"></div>
    <!--end overlay-->

    </div>
    <!-- End container-fluid-->

    </div><!--End content-wrapper-->
    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
@endsection
