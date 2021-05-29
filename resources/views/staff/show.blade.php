@extends('layouts.app')

@section('content')

    <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row mt-3">
                <h5 class="card-title"><a class="" href="{{ route('staff.index') }}"><i class="fa fa-arrow-left"></i></a>
                </h5>

                <div class="col-lg-12">
                    <div class="row ">
                        <div class="col-md-6">
                            <strong style="text-transform: uppercase">Ismi </strong>
                            <hr>
                            {{ $staff->name_uz }}
                            <hr>
                            <strong style="text-transform: uppercase">Lavozimi  </strong>
                            <hr>
                            {{ $staff->position_uz }}
                            <hr>
                            <strong style="text-transform: uppercase">Telefoni  </strong>
                            <hr>
                            {{ $staff->phone }}
                            <hr>
                            <strong style="text-transform: uppercase">Email  </strong>
                            <hr>
                            {{ $staff->email }}
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <strong style="text-transform: uppercase">Image</strong>
                            <hr>
                            <img src="{{ Storage::url($staff->image) }}" style="width: 300px">
                        </div>
                    </div>
                </div>


            </div>
            <!-- End container-fluid-->

        </div><!--End content-wrapper-->

@endsection
