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
                         <h5 class="card-title"><a class="font-33" href="{{ route('posts.create') }}"><i class="fa fa-plus-square"></i></a></h5>
                      <div class="table-responsive">
                          <table class="table table-bordered">
                              <thead>
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">title</th>
                                  <th scope="col">description</th>
                                  <th scope="col">content</th>
                                  <th scope="col">image</th>
                                   <th scope="col">status</th>
                                  <th width="100px" scope="col">Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($post as $posts)
                              <tr>
                                      <th scope="row">{{ $posts->id }}</th>
                                      <td>{{ Str::limit($posts->title_uz, 20)  }}</td>
                                      <td>{{ Str::limit($posts->description_uz, 30) }}</td>
                                      <td>{{ Str::limit($posts->content_uz, 40) }}</td>
                                      <td>
                                          <img src="{{ Storage::url($posts->image) }}" style="width: 150px">
                                      </td>
                                      <td>
                                          @if($posts->status == 'active')
                                          <span class="badge badge-success">
                                                  {{ $posts->status }}
                                          </span>
                                          @else
                                              <span class="badge badge-danger">
                                                  {{ $posts->status }}
                                              </span>
                                          @endif
                                      </td>
                                      <td>
                                      <form action="{{ route('posts.destroy',$posts->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                          @if($posts->file)
                                          <a href="{{ route('posts.downloadFile',$posts->id) }}"><i class="fa fa-download"></i></a>
                                          @endif
                                          <a href="{{ route('posts.edit',$posts->id) }}"><i class="fa fa-edit"></i></a>
                                          <a href="{{ route('posts.show',$posts->id)  }}"><i class="fa fa-eye"></i></a>
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
                          {{$post->links("pagination::bootstrap-4")}}
                      </nav>
              </div>
          </div>


      </div>
    <!-- End container-fluid-->

    </div><!--End content-wrapper-->

@endsection
