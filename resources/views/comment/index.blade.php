@extends('layouts.app')

@section('content')

    <div class="clearfix"></div>
    <div class="content-wrapper">
    <div class="container-fluid">

      <div class="row mt-3">
          <div class="col-lg-12">
              <div class="card">
                  @if(Session::has('success'))
                      <p class="alert alert-success">{{ Session::get('success') }}</p>
                  @endif
                  @if(Session::has('error'))
                      <p class="alert alert-danger">{{ Session::get('error') }}</p>
                  @endif
                  <div class="card-body">
{{--                      <h5 class="card-title"><a class="font-33" href="{{ route('posts.create') }}"><i class="fa fa-plus-square"></i></a></h5>--}}
                      <div class="table-responsive">
                          <table class="table table-bordered">
                              <thead>
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">post name</th>
                                  <th scope="col">name</th>
                                  <th scope="col">email</th>
                                  <th scope="col">message</th>
                                  <th scope="col">status</th>
                                  <th width="100px" scope="col">Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($comment as $comments)
                              <tr>
                                      <th scope="row">{{ $comments->id }}</th>
                                      <td>{{ $comments->post->title_uz }}</td>
                                      <td>{{ $comments->name }}</td>
                                      <td>{{ $comments->email }}</td>
                                      <td>{{ $comments->message }}</td>
                                  @if($comments->status == 1)
                                      <td><a href="{{ route('comment.update',$comments->id) }}" class="btn btn-success">Active</a></td>
                                  @endif
                                  @if($comments->status == 0)
                                      <td><a href="{{ route('comment.update',$comments->id) }}" class="btn btn-danger">InActive</a></td>
                                  @endif
                                      <td>
                                      <form action="{{ route('comment.destroy',$comments->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                          <a href="{{ route('comment.edit',$comments->id) }}"><i class="fa fa-edit"></i></a>
                                          <button  type="submit" class="bg-transparent"><i class="fa fa-trash text-white"></i></button>
                                      </form>
                                      </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
                      <nav aria-label="Page navigation example">
                          {{$comment->links("pagination::bootstrap-4")}}
                      </nav>
              </div>
          </div>


      </div>
    <!-- End container-fluid-->

    </div><!--End content-wrapper-->

@endsection
