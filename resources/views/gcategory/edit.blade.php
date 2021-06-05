@extends('layouts.app')

@section('content')

    <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a class="" href="{{ route('gcategory.index') }}"><i class="fa fa-arrow-left"></i></a></h5>
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
                                                <form action="{{ route('gcategory.update',$gcategory->id) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-group">
                                                        <label for="name_uz"> Image</label>
                                                        <input type="file" name="image" class="form-control" required id="name_uz" >
                                                    </div>
                                                    <br>
                                                    <div class="tab-content" id="pills-tabContent">
                                                        <div class="tab-pane fade show active" id="pills-home"
                                                             role="tabpanel" aria-labelledby="pills-home-tab">
                                                            <div class="form-group">
                                                                <label for="name_uz">UZ</label>
                                                                <input type="text" name="name_uz" value="{{ $gcategory->name_uz }}" maxlength="50" required class="form-control" id="name_uz" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name_uz">RU</label>
                                                                <input type="text" name="name_ru" value="{{ $gcategory->name_uz }}" maxlength="50" required class="form-control" id="name_uz" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name_uz">RU</label>
                                                                <input type="text" name="name_en" value="{{ $gcategory->name_uz }}" maxlength="50" required class="form-control" id="name_uz" >
                                                            </div>
                                                        </div>
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
