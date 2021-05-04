@extends('layouts.app')

@section('content')

    <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a class="" href="{{ route('tags.index') }}"><i
                                        class="fa fa-arrow-left"></i></a></h5>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            {!! $error !!}
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <form action="{{ route('tags.update',$tags->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="tab-content" id="pills-tabContent">
                                                <div class="form-group">
                                                    <label for="name_uz">Tag Uz</label>
                                                    <input type="text" value="{{ $tags->name_uz }}" name="name_uz"
                                                           class="form-control" id="name_uz">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name_ru">Tag Ru</label>
                                                    <input type="text" value="{{ $tags->name_ru }}" name="name_ru"
                                                           class="form-control" id="name_ru">
                                                </div>
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
