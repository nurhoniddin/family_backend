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
                        <div class="card-body">
                            <h5 class="card-title"><a class="font-33" href="{{ route('question.create') }}"><i class="fa fa-plus-square"></i></a></h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Savollar</th>
                                        <th width="100px" scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($questions as $que)
                                        <tr>
                                            <th scope="row">{{ $que->id }}</th>
                                            <td>{{ $que->question_uz }}</td>
                                            <td>
                                                <form action="{{ route('question.destroy',$que->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('question.edit',$que->id) }}"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('question.show',$que->id)  }}"><i class="fa fa-eye"></i></a>
                                                    <button  type="submit" class="bg-transparent"><i class="fa fa-trash text-white"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="Page navigation example">
                        {{$questions->links("pagination::bootstrap-4")}}
                    </nav>
                </div>
            </div>
            <!-- End container-fluid-->

        </div><!--End content-wrapper-->

@endsection
