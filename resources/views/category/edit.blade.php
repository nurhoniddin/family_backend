@extends('layouts.app')

@section('content')

    <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a class="" href="{{ route('category.index') }}"><i
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
                                    <form action="{{ route('category.update',$category->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="input-group pb-3">
                                            <select name="parent_id" value="{{ $category->id }}"
                                                    class="custom-select text-uppercase" id="inputGroupSelect01">
                                                <!-- <option value="0" select>Kategoriyalar...</option> -->
                                                <?php echo $categories_dropdown; ?>
                                            </select>
                                        </div>
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="pills-home-tab"
                                                   data-toggle="pill" href="#pills-home" role="tab"
                                                   aria-controls="pills-home" aria-selected="true">UZ</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="pills-profile-tab"
                                                   data-toggle="pill" href="#pills-profile" role="tab"
                                                   aria-controls="pills-profile" aria-selected="false">RU</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home"
                                                 role="tabpanel" aria-labelledby="pills-home-tab">
                                                <div class="form-group">
                                                    <label for="name_uz">Kategoriya Uz</label>
                                                    <input type="text" value="{{ $category->name_uz }}" name="name_uz"
                                                           class="form-control" id="name_uz">
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                 aria-labelledby="pills-contact-tab">
                                                <div class="form-group">
                                                    <label for="name_ru">Kategoriya Ru</label>
                                                    <input type="text" value="{{ $category->name_ru }}" name="name_ru"
                                                           class="form-control" id="name_ru">
                                                </div>

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
