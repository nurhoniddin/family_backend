@extends('layouts.app')

@section('content')

    <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row mt-3">
                <h5 class="card-title"><a class="" href="{{ route('posts.index') }}"><i class="fa fa-arrow-left"></i></a>
                </h5>

                <div class="col-lg-12">
                    <div class="row ">
                        <div class="col-md-6">
                            <strong style="text-transform: uppercase">Nomi </strong>
                            <hr>
                            {{ $post->title_uz }}
                            <hr>
                            <strong style="text-transform: uppercase">Qisqacha  </strong>
                            <hr>
                            {{ $post->description_uz }}
                            <hr>
                            <strong style="text-transform: uppercase">To'liq  </strong>
                            <hr>
                            {!! $post->content_uz !!}
                            <hr>

                            <strong style="text-transform: uppercase">Kalit So'zlar Uz  </strong>
                            <hr>
                            {{ $post->keywords_uz }}
                            <hr>
                            <strong style="text-transform: uppercase">Meta Matn Uz  </strong>
                            <hr>
                            {{ $post->meta_description_uz }}
                        </div>
                        <div class="col-md-6">
                            <strong style="text-transform: uppercase">Image</strong>
                            <hr>
                            <img src="{{ Storage::url($post->image) }}" style="width: 300px">
                        </div>
                    </div>
                </div>


            </div>
            <!-- End container-fluid-->

        </div><!--End content-wrapper-->

@endsection
