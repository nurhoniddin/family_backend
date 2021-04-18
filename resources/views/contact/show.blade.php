@extends('layouts.app')

@section('content')

    <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row mt-3">
                <h5 class="card-title"><a class="" href="{{ route('contact.index') }}"><i class="fa fa-arrow-left"></i></a>
                </h5>
                <div class="col-lg-12">
                    <div class="row ">
                        <div class="col-md-6">
                            <strong style="text-transform: uppercase">Ism</strong>
                            <hr>
                            {{ $contact->name }}
                            <hr>
                            <strong style="text-transform: uppercase">Sana</strong>
                            <hr>
                            {{ $contact->created_at->format('Y-d-M-H:m') }}
                            <hr>
                            <strong style="text-transform: uppercase">Telifon</strong>
                            <hr>
                            {{ $contact->phone }}
                        </div>
                        <div class="col-md-6">
                            <strong style="text-transform: uppercase">Email</strong>
                            <hr>
                            {{ $contact->email }}
                            <hr>
                            <strong style="text-transform: uppercase">Savol</strong>
                            <button class="btn btn-primary">{{ $contact->question->question_uz  }}</button>
                            <hr>
                           <strong style="text-transform: uppercase">mavzu</strong>
                            <hr>
                            {{ $contact->subject }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End container-fluid-->
            <hr>
            <div class="text-center">
                <strong class="text-center text-uppercase">Habar</strong>
                <hr>
                <p class="bg-secondary">
                    {!! $contact->message !!}
                </p>
            </div>
        </div><!--End content-wrapper-->

@endsection
