@extends('layouts.app')

@section('content')

	<div class="clearfix"></div>
	<div class="content-wrapper">
		<div class="container-fluid">

			<div class="row mt-3">
				<div class="col-lg-12">
					<div class="card">
						@if(Session::has('success'))
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<ul class="text-uppercase pt-3">
									{{ Session::get('success') }}
								</ul>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						@endif
						@if(Session::has('error'))
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<ul class="text-uppercase pt-3">
									{{ Session::get('error') }}
								</ul>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						@endif
						<div class="card-body">
							{{--                            <h5 class="card-title"><a class="font-33" href="{{ route('contact.create') }}"><i class="fa fa-plus-square"></i></a></h5>--}}
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Ism</th>
										<th scope="col">familiya</th>
										<th scope="col">email</th>
										<th scope="col">tel</th>
										<th scope="col">davlat</th>
										<th scope="col">Hudud</th>
										<th scope="col">habar</th>
										<th width="100px" scope="col">Action</th>
									</tr>
									</thead>
									<tbody>
									@foreach($invests as $invest)
										<tr>
											<td>{{ $invest->id }}</td>
											<td>{{ $invest->first_name }}</td>
											<td>{{ $invest->last_name }}</td>
											<td>{{ $invest->email }}</td>
											<td>{{ $invest->phone }}</td>
											<td>{{ $invest->country }}</td>
											<td>{{ $invest->place }}</td>
											<td>{!! Str::words($invest->message,5) !!}</td>
											<td>
												<form action="{{ route('investor.destroy',$invest->id) }}" method="post">
													@csrf
													@method('DELETE')
													{{--                                                    <a href="{{ route('contact.edit',$contact->id) }}"><i class="fa fa-edit"></i></a>--}}
													<a href="{{ route('investor.show',$invest->id)  }}"><i class="fa fa-eye"></i></a>
													<button  type="submit" class="bg-transparent"><i class="fa fa-trash text-white"></i></button>
												</form>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<nav aria-label="Page navigation example">
						{{$invests->links("pagination::bootstrap-4")}}
					</nav>
				</div>
			</div>
			<!-- End container-fluid-->

		</div><!--End content-wrapper-->

@endsection
