@extends('layouts.app')

@section('content')

    <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row mt-3">
                <h5 class="card-title"><a class="" href="{{ route('category.index') }}"><i class="fa fa-arrow-left"></i></a>
                </h5>

                <div class="col-lg-12">
                    <div class="row ">
                        <div class="col-md-6">
                            <strong style="text-transform: uppercase">Kategoriya UZ</strong>
                            <hr>
                            {{ $cat->name_uz }}
                            <hr>
                            <strong style="text-transform: uppercase">Parent_id</strong>
                            <hr>
                            {{ $cat->parent_id }}
                        </div>
                        <div class="col-md-6">
                            <strong style="text-transform: uppercase">Kategoriya ru</strong>
                            <hr>
                            {{ $cat->name_ru }}
                        </div>
                    </div>
                </div>


            </div>
            <!-- End container-fluid-->

        </div><!--End content-wrapper-->

@endsection
