@extends('backend.layouts.app')
@section('content')
@section('style')
@endsection

<section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add New Users</h5>

            <!-- Vertical Form -->
            <form class="row g-3" action="" method="POST">
                {{ csrf_field()}}
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Name</label>
                <input type="text" required name="name" class="form-control" id="inputNanme4">
              </div>
              <div class="col-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" required name="email" class="form-control" id="inputEmail4">
              </div>
              <div class="col-12">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" name="password" required class="form-control" id="inputPassword4">
              </div>

              <div class="col-12">
                <label for="inputPassword4" class="form-label">Status</label>
                <select name="status" class="form-control" id="">
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
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

