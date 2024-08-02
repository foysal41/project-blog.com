@extends('backend.layouts.app')
@section('content')
@section('style')
@endsection

<section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit</h5>

            <!-- Vertical Form -->
            <form class="row g-3" action="" method="POST">
                {{ csrf_field()}}
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Name *</label>
                <input type="text" required name="name" value="{{ $getRecord->name}}" class="form-control" id="inputNanme4">
              </div>

              <div class="col-12">
                <label for="inputNanme4" class="form-label">Title *</label>
                <input type="text" required name="title" value="{{ $getRecord->title}}" class="form-control" id="inputNanme4">
              </div>

              <div class="col-12">
                <label for="inputNanme4" class="form-label"> Meta Title *</label>
                <input type="text" name="meta_title" value="{{ $getRecord->meta_title}}" class="form-control" id="inputNanme4">
              </div>

              <div class="col-12">
                <label for="inputNanme4" class="form-label"> Meta Keywords</label>
                <input type="text"  name="meta_keywords" value="{{ $getRecord->meta_keywords}}" class="form-control" id="inputNanme4">
              </div>

              <div class="col-12">
                <label for="inputNanme4" class="form-label"> Meta Description </label>
                <textarea name="meta_description" value="{{ $getRecord->meta_description}}" class="form-control"></textarea>
              </div>
          
           
              <div class="col-12">
                <label for="inputPassword4" class="form-label">Status *</label>
                <select name="status" class="form-control" id="">
                    <option {{ ($getRecord->status == 1) ? "selected" : " "}} value="1">Active</option>
                    <option {{ ($getRecord->status == 0) ? "selected" : " "}}  value="2">Inactive</option>
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

