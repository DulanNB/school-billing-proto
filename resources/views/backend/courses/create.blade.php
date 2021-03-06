@extends('backend.layouts.master')

@section('main-content')

    <div class="card">
        <h5 class="card-header">Add Course</h5>
        <div class="card-body">
            <form method="post" action="{{route('course.store')}}" enctype="multipart/form-data" >
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name" class="col-form-label">Course Name <span class="text-danger">*</span></label>
                    <input id="course_name" type="text" name="course_name" placeholder="Enter course name"  value="{{old('name')}}" class="form-control">
                    @error('course_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="col-form-label">Course Fee</label>
                    <input type="text" class="form-control" placeholder="Enter Course Fee (LKR)" id="value" name="value">
                    @error('value')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="col-form-label">Course Credits</label>
                    <input type="number" class="form-control" placeholder="Enter Course Credits" id="credits" name="credits">
                    @error('credits')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                <div class="form-group mb-3">
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
    <script>
        $('#lfm').filemanager('image');

        $(document).ready(function() {
            $('#summary').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 120
            });
        });
    </script>

    <script>
        $('#is_parent').change(function(){
            var is_checked=$('#is_parent').prop('checked');
            // alert(is_checked);
            if(is_checked){
                $('#parent_cat_div').addClass('d-none');
                $('#parent_cat_div').val('');
            }
            else{
                $('#parent_cat_div').removeClass('d-none');
            }
        })
    </script>
@endpush
