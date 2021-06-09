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
									<form action="{{ route('urik.store') }}" method="post" enctype="multipart/form-data">
										@csrf
										<label for="cover">Asosiy Rasm</label>
										<hr>
										<input type="file" class="form-group" name="cover_image">
										<hr>
										<label for="multi">Rasmlar</label>
										<hr>
										<input type="file" id="file-input" onchange="loadPreview(this)" name="image[]"   multiple/>
										<span class="text-danger">{{ $errors->first('image') }}</span>
										<div id="thumb-output"></div>

										<hr>
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
													<label for="name_uz">mavzu</label>
													<input type="text" name="title_uz" maxlength="50" required class="form-control" id="name_uz" >
												</div>
												<div class="form-group">
													<label for="description_uz">Description</label>
													<input type="text" name="description_uz" class="form-control" required maxlength="120"  id="description_uz" >
												</div>
												<div class="form-group">
													<label for="name_uz">content</label>
													<textarea class="form-control" id="editor1" name="content_uz"></textarea>
												</div>
											</div>
											<div class="tab-pane fade" id="pills-profile" role="tabpanel"
											     aria-labelledby="pills-contact-tab">
												<div class="form-group">
													<label for="name_uz">mavzu</label>
													<input type="text" name="title_ru" maxlength="50" class="form-control" id="name_uz" >
												</div>
												<div class="form-group">
													<label for="description_ru">description</label>
													<input type="text" name="description_ru" maxlength="120" class="form-control" id="description_ru" >
												</div>
												<div class="form-group">
													<label for="name_uz"> To'liq</label>
													<textarea class="form-control" id="editor2" name="content_ru"></textarea>
												</div>

											</div>
											<div class="tab-pane fade" id="pills-profile22" role="tabpanel"
											     aria-labelledby="pills-contact-tab">
												<div class="form-group">
													<label for="name_uz">mavzu</label>
													<input type="text" name="title_en" maxlength="50" class="form-control" id="name_uz" >
												</div>
												<div class="form-group">
													<label for="description_ru">description</label>
													<input type="text" name="description_en" maxlength="120" class="form-control" id="description_ru" >
												</div>
												<div class="form-group">
													<label for="name_uz">content</label>
													<textarea class="form-control" id="editor3" name="content_en"></textarea>
												</div>

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
					</div><!--End Row-->
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- End container-fluid-->
	</div><!--End content-wrapper-->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
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
	<script>
        function loadPreview(input){
            var data = $(input)[0].files; //this file data
            $.each(data, function(index, file){
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){
                    var fRead = new FileReader();
                    fRead.onload = (function(file){
                        return function(e) {
                            var img = $('<img height="150px"/>').addClass('thumb').attr('src', e.target.result); //create image thumb element
                            $('#thumb-output').append(img);
                        };
                    })(file);
                    fRead.readAsDataURL(file);
                }
            });
        }
	</script>

@endsection
