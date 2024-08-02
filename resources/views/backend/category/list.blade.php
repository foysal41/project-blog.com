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
                Category List
                <a href="{{ url('panel/category/add')}}" class="btn btn-primary float-end"> Add New</a>
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
                @forelse ( $getRecord as $value )
                <tr>
                  <th scope="row">{{ $value->id }}</th>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->slug }}</td>
                  <td>{{ $value->title }}</td>
                  <td>{{ $value->meta_title }}</td>
                  <td>{{ $value->meta_description }}</td>
                  <td>{{ $value->meta_keywords }}</td>

                  <td>{{ !empty($value->status) ? 'Active' : 'Inactive ' }}</td>
                  <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                  <td>

                    
                    <a href="{{ url('panel/category/edit/' . $value->id)}}" class="btn btn-sm btn-primary">Edit</a>
                    <a onclick="return confirm(' Are you sure you want to delete?');" href="{{ url('panel/category/delete/' . $value->id)}}" class="btn btn-sm btn-danger">Delete</a>
                    

                  </td>
                  
                </tr>

                @empty
                <tr>
                  <td colspan="100%"> Record Not Found </td>
                </tr>

                 
                
                  
                @endforelse
               
              </tbody>
            </table>
            <!-- End Default Table Example -->

            {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
          </div>
        </div>

      </div>


    </div>
  </section>


 @endsection

 @section('script')
 @endsection

