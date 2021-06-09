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
							<h5 class="card-title"><a class="font-33" href="{{ route('urik.create') }}"><i class="fa fa-plus-square"></i></a></h5>
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">mavzu</th>
										<th scope="col">Description</th>
										<th scope="col">Rasm</th>
										<th width="100px" scope="col">Action</th>
									</tr>
									</thead>
									<tbody>
									@foreach($uriks as $urik)
										<tr>
											<th scope="row">{{ $urik->id }}</th>
											<td>{{ Str::limit($urik->title_uz, 20)  }}</td>
											<td>{{ Str::limit($urik->description_uz, 30) }}</td>
											<td>
													<img src="{{ Storage::url($urik->cover_image)  }}" style="width: 150px">
											</td>

											<td>
												<form action="{{ route('urik.destroy',$urik->id) }}" method="post">
													@csrf
													@method('DELETE')

													<a href="{{ route('urik.edit',$urik->id) }}"><i class="fa fa-edit"></i></a>
													<a href="{{ route('urik.show',$urik->id)  }}"><i class="fa fa-eye"></i></a>
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
							{{$uriks->links("pagination::bootstrap-4")}}
						</nav>
					</div>
				</div>


			</div>
			<!-- End container-fluid-->

		</div><!--End content-wrapper-->

@endsection
