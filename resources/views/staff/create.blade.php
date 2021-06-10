@extends('layouts.app')

@section('content')
    <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a class="" href="{{ route('staff.index') }}"><i class="fa fa-arrow-left"></i></a></h5>
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
                                                <form action="{{ route('staff.store') }}" method="post" enctype="multipart/form-data" id="form">
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
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="pills-profile-tab"
                                                               data-toggle="pill" href="#pills-profile22" role="tab"
                                                               aria-controls="pills-profile" aria-selected="false">EN</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="pills-tabContent">
                                                        <div class="tab-pane fade show active" id="pills-home"
                                                             role="tabpanel" aria-labelledby="pills-home-tab">
                                                            <div class="form-group">
                                                                <label for="name_uz">Ismi</label>
                                                                <input type="text" name="name_uz" maxlength="50" required class="form-control" id="name_uz" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="position_uz">Lavozimi</label>
                                                                <input type="text" name="position_uz" class="form-control" required maxlength="120"  id="description_uz" >
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                             aria-labelledby="pills-contact-tab">
                                                            <div class="form-group">
                                                                <label for="name_ru">Ismi</label>
                                                                <input type="text" name="name_ru" maxlength="50" class="form-control" id="name_uz" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="position_ru">Lavozimi</label>
                                                                <input type="text" name="position_ru" class="form-control" maxlength="120"  id="description_uz" >
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-profile22" role="tabpanel"
                                                             aria-labelledby="pills-contact-tab">
                                                            <div class="form-group">
                                                                <label for="name_uz">Ismi</label>
                                                                <input type="text" name="name_en" maxlength="50" class="form-control" id="name_uz" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="position_uz">Lavozimi</label>
                                                                <input type="text" name="position_en" class="form-control" maxlength="120"  id="description_uz" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="meta_description_ru">Telefoni</label>
                                                            <input type="text" name="phone" class="form-control" value="+998"  id="meta_description_ru" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="meta_description_ru">Email</label>
                                                            <input type="email" name="email" class="form-control"   id="meta_description_ru" >
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
