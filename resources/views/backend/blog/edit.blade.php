@extends('backend.layouts.app')
@section('content')
@section('style')
@endsection

<section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title"> Edit Blog</h5>

            <!-- Vertical Form -->
            <form class="row g-3" action="" method="POST">
                {{ csrf_field()}}
    

              <div class="col-12">
                <label for="inputNanme4" class="form-label">Title *</label>
                <input type="text" required name="title" class="form-control" id="inputNanme4" value="{{ $getRecord->title}}">
              </div>

              <div class="col-12">
                <label for="inputNanme4" class="form-label">Category *</label>
               <select name="category_id" id="" class="form-control" required>
                <option value="">Select Category</option>
                <!--Array আকারে তুলে category dropdown দেখাতে সক্কম হলাম-->
                <!--এই $getCategory model থেকে ডাটা call করা হয়েছে-->
                @foreach ($getCategory as $value )
                  <option {{ ($getRecord->category_id == $value->id ) ? 'selected' : ''}} value="{{ $value->id}}">{{ $value->name}}</option>
                @endforeach
               </select>
              </div>

              <div class="col-12">
                <label for="inputNanme4" class="form-label">Image  *</label>
                <input type="file" name="image_file" class="form-control" id="inputNanme4">

              </div>

              <div class="col-12">
                <label for="inputNanme4" class="form-label">Description  *</label>
                <textarea class="form-control tinymce-editor" name="description" > {{ $getRecord->description}}</textarea>
              </div>

              

              <div class="col-12">
                <label for="inputNanme4" class="form-label"> Tags</label>
                <input type="text"  name="meta_keywords" class="form-control" id="inputNanme4" value="{{ $getRecord->tag}}">
              </div>

              <div class="col-12">
                <label for="inputPassword4" class="form-label">Publish *</label>
                <select name="is_publish" class="form-control" id="">
                    <option {{ ($getRecord->is_publish == 1 ) ? 'selected' : ''}} value="1">Yes</option>
                    <option {{ ($getRecord->is_publish == 0 ) ? 'selected' : ''}} value="0">No</option>
                </select>
              </div>
          
           
              <div class="col-12">
                <label for="inputPassword4" class="form-label">Status *</label>
                <select name="status" class="form-control" id="">
                    <option {{ ($getRecord->status == 1 ) ? 'selected' : ''}}  value="1">Active</option>
                    <option  {{ ($getRecord->status == 0 ) ? 'selected' : ''}}value="0">Inactive</option>
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

