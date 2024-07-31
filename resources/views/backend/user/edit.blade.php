@extends('backend.layouts.app')
@section('content')
@section('style')
@endsection

<section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Users</h5>

            <!-- Vertical Form -->
            <form class="row g-3" action="" method="POST">
                {{ csrf_field()}}
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Name</label>
                <input type="text"  name="name" value="{{ $getRecord->name }}" class="form-control" id="inputNanme4">
              </div>
              <div class="col-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email"  name="email" value="{{ $getRecord->email }}" class="form-control" id="inputEmail4">
              </div>
              <div class="col-12">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="text" name="password"   class="form-control" id="inputPassword4">
                <p>Due you want change password please enter</p>
              </div>

              <div class="col-12">
                <label for="inputPassword4" class="form-label">Status</label>
                <select name="status" class="form-control" id="">
                    <option {{ $getRecord->status == 1 ? 'selected' : ''}} value="1">Active</option>
                    <option {{ $getRecord->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
                </select>
              </div>

              <div class="col-12" >
                <button type="submit" class="btn btn-primary">Submit</button>
                
              </div>
            </form><!-- Vertical Form -->

          </div>
        </div>


      </div>
    </div>
  </section>


 @endsection

 @section('script')
 @endsection

