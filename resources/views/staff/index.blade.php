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
                         <h5 class="card-title"><a class="font-33" href="{{ route('staff.create') }}"><i class="fa fa-plus-square"></i></a></h5>
                      <div class="table-responsive">
                          <table class="table table-bordered">
                              <thead>
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">category_id</th>
                                  <th scope="col">name</th>
                                  <th scope="col">position</th>
                                  <th scope="col">image</th>
                                  <th width="100px" scope="col">Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($staff as $staffs)
                              <tr>
                                      <th scope="row">{{ $staffs->id }}</th>
                                      <th scope="row">{{ $staffs->category_id }}</th>
                                      <td>{{ Str::limit($staffs->name_uz, 20)  }}</td>
                                      <td>{{ Str::limit($staffs->position_uz, 30) }}</td>
                                      <td>
                                          <img src="{{ Storage::url($staffs->image) }}" style="width: 150px">
                                      </td>
                                      <td>
                                      <form action="{{ route('staff.destroy',$staffs->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                          <a href="{{ route('staff.edit',$staffs->id) }}"><i class="fa fa-edit"></i></a>
                                          <a href="{{ route('staff.show',$staffs->id)  }}"><i class="fa fa-eye"></i></a>
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
                          {{$staff->links("pagination::bootstrap-4")}}
                      </nav>
              </div>
          </div>


      </div>
    <!-- End container-fluid-->

    </div><!--End content-wrapper-->

@endsection
