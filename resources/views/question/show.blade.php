@extends('layouts.app')

@section('content')

    <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row mt-3">
                <h5 class="card-title"><a class="" href="{{ route('question.index') }}"><i class="fa fa-arrow-left"></i></a>
                </h5>

                <div class="col-lg-12">
                    <div class="row ">
                        <div class="col-md-6">
                            <strong style="text-transform: uppercase">Savol UZ</strong>
                            <hr>
                            {{ $question->question_uz }}
                        </div>
                        <div class="col-md-6">
                            <strong style="text-transform: uppercase">Savol ru</strong>
                            <hr>
                            {{ $question->question_ru }}
                        </div>
                    </div>
                </div>


            </div>
            <!-- End container-fluid-->

        </div><!--End content-wrapper-->

@endsection
