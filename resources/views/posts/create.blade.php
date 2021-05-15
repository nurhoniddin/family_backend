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
                                            <li class="text-capitalize" style="font-size: 21px; list-style: none">
                                                {!! $error !!}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" id="form">
                                                    @csrf
                                                    <div class="input-group pb-3">
                                                        <select name="category_id" class="custom-select text-uppercase" id="inputGroupSelect01" required>
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
                                                    <label for="name_uz"> Teglar</label>
                                                    <table class="table table-bordered" id="dynamicAddRemove">
                                                    <tr>
                                                    <th>Tag uz</th>
                                                    <th>Tag ru</th>
                                                    <th>Action</th>
                                                    </tr>
                                                    <tr>
                                                    <td><input type="text" name="name_uz[]" placeholder="tag uz" class="form-control" /></td>
                                                    <td><input type="text" name="name_ru[]" placeholder="tag ru" class="form-control" /></td>
                                                    <td><button type="button" name="add" id="add-btn" class="btn btn-success"><i class="fa fa-plus"></i></button></td>
                                                    </tr>
                                                    </table>
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
                                                                <input type="text" name="title_uz" maxlength="50" required class="form-control" id="name_uz" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description_uz">Matn O'zbekcha</label>
                                                                <input type="text" name="description_uz" class="form-control" required maxlength="120"  id="description_uz" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name_uz"> To'liq</label>
                                                                <textarea class="form-control" id="editor1" name="content_uz"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description_uz">Kalit So'zlar</label>
                                                                <input type="text" name="keywords_uz" class="form-control"   id="description_uz" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="meta_description_uz">Meta Matn</label>
                                                                <input type="text" name="meta_description_uz" class="form-control"   id="meta_description_uz" >
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                             aria-labelledby="pills-contact-tab">
                                                             <div class="form-group">
                                                                <label for="name_uz">Nomi</label>
                                                                <input type="text" name="title_ru" maxlength="50" class="form-control" id="name_uz" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description_ru">Matn Ruscha</label>
                                                                <input type="text" name="description_ru" maxlength="120" class="form-control" id="description_ru" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name_uz"> To'liq</label>
                                                                <textarea class="form-control" id="editor2" name="content_ru"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="keywords_ru">Kalit So'zlar RU</label>
                                                                <input type="text" name="keywords_ru" class="form-control"   id="keywords_ru" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="meta_description_ru">Meta Matn RU</label>
                                                                <input type="text" name="meta_description_ru" class="form-control"   id="meta_description_ru" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Status">Status</label>
                                                            <select class="form-control"  name="status" id="status">
                                                                <option value="inactive">Inactive</option>
                                                                <option value="active">Active</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Status">Telegram</label>
                                                            <select class="form-control"  name="telegram" id="status">
                                                                <option value="0">No</option>
                                                                <option value="1">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary" id="btn">saqlash</button>
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
