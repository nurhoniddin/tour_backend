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
							                      <h5 class="card-title"><a class="font-33" href="{{ route('decision.create') }}"><i class="fa fa-plus-square"></i></a></h5>
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
									<tr>
										<th width="50px" scope="col">ID</th>
										<th scope="col">sarlavha uz</th>
										<th scope="col">Link</th>
										<th width="100px" scope="col">Action</th>
									</tr>
									</thead>
									<tbody>
									@foreach($decisions as $decision)
										<tr>
											<th scope="row">{{ $decision->id }}</th>
											<td>{{ $decision->title_uz }}</td>
											<td>{{ $decision->link_uz }}</td>
											<td>
												<form action="{{ route('decision.destroy',$decision->id) }}" method="post">
													@csrf
													@method('DELETE')
													<a href="{{ route('decision.edit',$decision->id) }}"><i class="fa fa-edit"></i></a>
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
							{{$decisions->links("pagination::bootstrap-4")}}
						</nav>
					</div>
				</div>


			</div>
			<!-- End container-fluid-->

		</div><!--End content-wrapper-->

@endsection
