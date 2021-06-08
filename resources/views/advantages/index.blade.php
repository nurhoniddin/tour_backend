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
                         <h5 class="card-title"><a class="font-33" href="{{ route('advantages.create') }}"><i class="fa fa-plus-square"></i></a></h5>
                      <div class="table-responsive">
                          <table class="table table-bordered">
                              <thead>
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">category id</th>
                                  <th scope="col">content</th>
                                  <th width="100px" scope="col">Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($advantages as $advantage)
                              <tr>
                                      <th scope="row">{{ $advantage->id }}</th>
                                      <td>{{ $advantage->category_id }}</td>
                                      <td>{!! $advantage->content_uz !!}</td>
                                      <td>
                                      <form action="{{ route('advantages.destroy',$advantage->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                          <a href="{{ route('advantages.edit',$advantage->id) }}"><i class="fa fa-edit"></i></a>
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
                          {{$advantages->links("pagination::bootstrap-4")}}
                      </nav>
              </div>
          </div>


      </div>
    <!-- End container-fluid-->

    </div><!--End content-wrapper-->

@endsection
