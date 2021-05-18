@extends('layouts.app')

@section('content')

    <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a class="" href="{{ route('posts.index') }}"><i class="fa fa-arrow-left"></i></a></h5>
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
                                                <form action="{{ route('posts.update',$post->id) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="input-group pb-3">
                                                        <select name="category_id" class="custom-select text-uppercase" id="inputGroupSelect01">
                                                            <!-- <option value="0" select>Kategoriyalar...</option> -->
                                                            <?php echo $categories_dropdown; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name_uz"> Image</label>
                                                        <input type="file" name="image" class="form-control" required id="name_uz" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name_uz"> File</label>
                                                        <input type="file" name="file" class="form-control" id="name_uz" >
                                                    </div>
                                                    <br>
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
                                                                <label for="name_uz">Nomi</label>
                                                                <input type="text" value="{{ $post->title_uz }}" required name="title_uz" class="form-control" id="name_uz" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name_uz"> Qisqacha</label>
                                                                <input type="text" value="{{ $post->description_uz}}" required name="description_uz" class="form-control" id="name_uz" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name_uz"> To'liq</label>
                                                                <textarea class="form-control" id="editor1" name="content_uz">{{ $post->content_uz}}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="keywords_ru">Kalit So'zlar UZ</label>
                                                                <input type="text" name="keywords_uz" class="form-control" value="{{ $post->keywords_uz }}"  id="keywords_ru" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="meta_description_ru">Meta Matn Uz</label>
                                                                <input type="text" name="meta_description_uz" class="form-control" value="{{ $post->meta_description_uz }}"  id="meta_description_ru" >
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                             aria-labelledby="pills-contact-tab">
                                                             <div class="form-group">
                                                                <label for="name_uz">Nomi</label>
                                                                <input type="text" value="{{ $post->title_ru}}" name="title_ru" class="form-control" id="name_uz" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name_uz"> Qisqacha</label>
                                                                <input type="text" value="{{ $post->description_ru}}" name="description_ru" class="form-control" id="name_uz" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name_uz"> To'liq</label>
                                                                <textarea class="form-control" id="editor2" name="content_ru">{{ $post->content_ru }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="keywords_ru">Kalit So'zlar RU</label>
                                                                <input type="text" name="keywords_ru" class="form-control" value="{{ $post->keywords_ru }}"  id="keywords_ru" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="meta_description_ru">Meta Matn RU</label>
                                                                <input type="text" name="meta_description_ru" class="form-control" value="{{ $post->meta_description_ru }}"  id="meta_description_ru" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Status">Status</label>
                                                        <select class="form-control"  name="status" id="status">
                                                            <option value="inactive">Not Published</option>
                                                            <option value="active">Published</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Status">Telegram</label>
                                                        <select class="form-control"  name="telegram" id="status">
                                                            <option value="0">No</option>
                                                            <option value="1">Yes</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-light px-5"><i class="fa fa-save"></i> Saqlash</button>
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

        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
        CKEDITOR.replace( 'editor3' );
        CKEDITOR.replace( 'editor4' );
        filebrowserBrowseUrl: '/browser/browse.php';
        filebrowserImageBrowseUrl: '/browser/browse.php?type=Images';
        filebrowserUploadUrl: '/uploader/upload.php';
        filebrowserImageUploadUrl: '/uploader/upload.php?type=Images';
    </script>

@endsection
