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
                      <h5 class="card-title"><a class="font-33" href="{{ route('category.create') }}"><i class="fa fa-plus-square"></i></a></h5>
                      <div class="table-responsive">
                          <table class="table table-bordered">
                              <thead>
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">name</th>
                                  <th scope="col">parent_id</th>
                                  <th width="100px" scope="col">Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($cats as $cat)
                              <tr>
                                      <th scope="row">{{ $cat->id }}</th>
                                      <td>{{ $cat->name_uz }}</td>
                                      <td>{{ $cat->parent_id }}</td>
                                      <td>
                                      <form action="{{ route('category.destroy',$cat->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                          <a href="{{ route('category.edit',$cat->id) }}"><i class="fa fa-edit"></i></a>
                                          <a href="{{ route('category.show',$cat->id)  }}"><i class="fa fa-eye"></i></a>
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
                          {{$cats->links("pagination::bootstrap-4")}}
                      </nav>
              </div>
          </div>
      </div>
    <!-- End container-fluid-->

    </div><!--End content-wrapper-->

@endsection
