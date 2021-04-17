@extends('layouts.app')

@section('content')

    <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a class="" href="{{ route('question.index') }}"><i
                                        class="fa fa-arrow-left"></i></a></h5>
                            @if ($errors->any())
                                <div class="alert alert-danger  ">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <span class="text-uppercase">{!! $error !!}</span>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <form action="{{ route('question.store') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="savol_uz">Savol uz</label>
                                            <input type="text" name="savol_uz"  class="form-control" id="savol_uz">
                                        </div>
                                        <div class="form-group">
                                            <label for="savol_ru">Savol ru</label>
                                            <input type="text" name="savol_ru" class="form-control" id="savol_ru">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-light px-5"><i class="fa fa-save"></i>
                                                Saqlash
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!--End Row-->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End container-fluid-->
    </div><!--End content-wrapper-->

@endsection
