@extends('layouts.app')

@section('content')
    <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a class="" href="{{ route('gallery.index') }}"><i class="fa fa-arrow-left"></i></a></h5>
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
                                                <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data" id="form">
                                                    @csrf
                                                    <br>
                                                    <select class="custom-select" id="inputGroupSelect03" name="category_id" required>
                                                        <option value="">kategoriya...</option>
                                                        @foreach($gallery as $gallerys)
                                                            <option value="{{ $gallerys->id }}">{{ $gallerys->name_uz }}</option>
                                                        @endforeach
                                                    </select>
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="name_uz"> Image</label>
                                                        <input type="file" name="image[]" class="form-control" required id="name_uz" multiple>
                                                    </div>
                                                    <br>
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
