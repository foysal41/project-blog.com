@extends('backend.layouts.app')
@section('content')
@section('style')
@endsection

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
                Users List
                <a href="" class="btn btn-primary float-end"> Add New</a>
            </h5>

            <!-- Default Table -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Email Verified</th>
                  <th scope="col">Status</th>
                  <th scope="col">Created Date</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>
                @forelse ( $getRecord as $value )
                <tr>
                  <th scope="row">{{ $value->id }}</th>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ !empty($value->email_verified_at) ? 'Yes' : 'No' }}</td> 
                  <td>{{ !empty($value->status) ? 'Varified' : 'Not ' }}</td>
                  <td>{{ ($value->created_at) }}</td>
                  <td>

                    <a href="" class="btn btn-sm btn-primary">Edit</a>
                    <a href="" class="btn btn-sm btn-danger">Delete</a>

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

