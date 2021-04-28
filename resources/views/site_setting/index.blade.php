@extends('layouts.app')
@section('content')
    <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <ul class="text-uppercase pt-3">
                                    {{ Session::get('success') }}
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="text-uppercase pt-3">
                                    {{ Session::get('error') }}
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

            @if(empty($setting))
              @forelse($settings as $set)
                         <a class="btn btn-outline-success" href="{{ route('setting.edit',$set->id) }}"
                                  style="font-size: 18px">Malumotlarni Yangilash</a>
              @empty
                  <a class="btn btn-outline-success" href="{{ route('setting.create') }}"
                          style="font-size: 18px">Malumotlarni Kiritish</a>
               @endforelse
              @endif
                </div>
            </div>
            <!-- End container-fluid-->

        </div><!--End content-wrapper-->

@endsection
