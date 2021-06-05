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
                         <h5 class="card-title"><a class="font-33" href="{{ route('gcategory.create') }}"><i class="fa fa-plus-square"></i></a></h5>
                      <div class="table-responsive">
                          <table class="table table-bordered">
                              <thead>
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">image</th>
                                  <th width="100px" scope="col">Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($gcategory as $gcategorys)
                              <tr>
                                      <th scope="row">{{ $gcategorys->id }}</th>
                                      <th scope="row">{{ $gcategorys->name_uz }}</th>
                                      <td>
                                          <img src="{{ Storage::url($gcategorys->image) }}" style="width: 150px">
                                      </td>
                                      <td>
                                      <form action="{{ route('gcategory.destroy',$gcategorys->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                          <a href="{{ route('gcategory.edit',$gcategorys->id) }}"><i class="fa fa-edit"></i></a>
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
                          {{$gcategory->links("pagination::bootstrap-4")}}
                      </nav>
              </div>
          </div>


      </div>
    <!-- End container-fluid-->

    </div><!--End content-wrapper-->

@endsection
