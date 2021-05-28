@extends('layouts.app')

@section('content')

	<div class="clearfix"></div>
	<div class="content-wrapper">
		<div class="container-fluid">

			<div class="row mt-3">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title"><a class="" href="{{ route('decision.index') }}"><i
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
									<form action="{{ route('decision.store') }}" method="post">
										@csrf
										<div class="input-group pb-3">
											<select name="category_id" class="custom-select text-uppercase" id="inputGroupSelect01" required>
												<!-- <option value="0" select>Kategoriyalar...</option> -->
												<?php echo $categories_dropdown; ?>
											</select>
										</div>
										<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
											<li class="nav-item" role="presentation">
												<a class="nav-link active" id="pills-home-tab"
												   data-toggle="pill" href="#pills-home" role="tab"
												   aria-controls="pills-home" aria-selected="true">sarlavha_uz</a>
											</li>
											<li class="nav-item" role="presentation">
												<a class="nav-link" id="pills-profile-tab"
												   data-toggle="pill" href="#pills-profile" role="tab"
												   aria-controls="pills-profile" aria-selected="false">sarlavha_ru</a>
											</li>
											<li class="nav-item" role="presentation">
												<a class="nav-link" id="pills-profile-tab"
												   data-toggle="pill" href="#pills-profile22" role="tab"
												   aria-controls="pills-profile" aria-selected="false">sarlavha_en</a>
											</li>
										</ul>
										<div class="tab-content" id="pills-tabContent">
											<div class="tab-pane fade show active" id="pills-home"
											     role="tabpanel" aria-labelledby="pills-home-tab">
												<div class="form-group">
													<label for="name_uz">sarlavha_uz</label>
													<input type="text" name="title_uz"  required class="form-control" id="name_uz">
												</div>

												<div class="form-group">
													<label for="name_uz">link_uz</label>
													<input type="text" name="link_uz" required class="form-control" id="name_uz">
												</div>

											</div>
											<div class="tab-pane fade" id="pills-profile" role="tabpanel"
											     aria-labelledby="pills-contact-tab">
												<div class="form-group">
													<label for="name_ru">sarlavha_ru</label>
													<input type="text" name="title_ru" class="form-control" id="name_ru">
												</div>

												<div class="form-group">
													<label for="name_ru">link_ru</label>
													<input type="text" name="link_ru" class="form-control" id="name_ru">
												</div>

											</div>
											<div class="tab-pane fade" id="pills-profile22" role="tabpanel"
											     aria-labelledby="pills-contact-tab">
												<div class="form-group">
													<label for="name_ru">sarlavha_en</label>
													<input type="text" name="title_en" class="form-control" id="name_ru">
												</div>

												<div class="form-group">
													<label for="name_ru">link_en</label>
													<input type="text" name="link_en" class="form-control" id="name_ru">
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

	<!-- End container-fluid-->

	<!--End content-wrapper-->

@endsection
