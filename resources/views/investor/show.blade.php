@extends('layouts.app')

@section('content')

	<div class="clearfix"></div>
	<div class="content-wrapper">
		<div class="container-fluid">

			<div class="row mt-3">
				<h5 class="card-title"><a class="" href="{{ route('investor.index') }}"><i class="fa fa-arrow-left"></i></a>
				</h5>
				<div class="col-lg-12">
					<div class="row ">
						<div class="col-md-6">
							<strong style="text-transform: uppercase">Ism</strong>
							<hr>
							{{ $investor->first_name }}
							<strong style="text-transform: uppercase">familiya</strong>
							<hr>
							{{ $investor->last_name }}
							<hr>
							<strong style="text-transform: uppercase">email</strong>
							<hr>
							{{ $investor->email }}
							<hr>
							<strong style="text-transform: uppercase">tel</strong>
							<hr>
							{{ $investor->phone }}
							<hr>
						</div>
						<div class="col-md-6">
							<strong style="text-transform: uppercase">davlat</strong>
							<hr>
							{{ $investor->country }}
							<hr>
							<strong style="text-transform: uppercase">hudud</strong>
							<hr>
							{{ $investor->place }}
							<hr>
						</div>
					</div>
				</div>
			</div>
			<!-- End container-fluid-->
			<hr>
			<div class="text-center">
				<strong class="text-center text-uppercase">Habar</strong>
				<hr>
				<p class="bg-secondary">
					{!! $investor->message !!}
				</p>
			</div>
		</div><!--End content-wrapper-->

@endsection
