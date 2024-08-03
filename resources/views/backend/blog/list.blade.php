@extends('backend.layouts.app')
@section('content')
@section('style')
@endsection

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          @include('layouts.message')
          <div class="card-body">
            <h5 class="card-title">
                Blog List
                <a href="{{ url('panel/blog/add')}}" class="btn btn-primary float-end"> Add New</a>
            </h5>

            <!-- Default Table -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Title </th>
                  <th scope="col">Meta Title </th>
                  <th scope="col">Meta Description</th>
                  <th scope="col">Meta Keywords</th>
                  <th scope="col">Status </th>
                  <th scope="col">Created Date</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>
               
               
              </tbody>
            </table>
            <!-- End Default Table Example -->

           
          </div>
        </div>

      </div>


    </div>
  </section>


 @endsection

 @section('script')
 @endsection

