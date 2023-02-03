@extends('layout.frontend_slice')

@section('missing')

{{--show toast massage when post submitted start --}}
@if (session()->has('success'))
<div class="toast show" style="position: absolute; right:20px;bottom:20px" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="me-auto">Post System</strong>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    {{session('success')}}
  </div>
</div>
@endif
{{--show toast massage when post submitted end --}}

    <div class="container">
    <form action="{{route('post.postsubmit')}}" method="post">
      @csrf
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Post Title</label>
        <input type="text" class="form-control" id="formGroupExampleInput" value="{{old('title')}}" name="title" />
       {{-- show error massage start  --}}
       <span class="text-danger">
         @error('title')
         {{$message}}
         @enderror
        </span>
        {{-- show error massage end --}}
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Details</label>
        <textarea class="form-control" name="detail" id="" cols="30" rows="10">{{old('detail')}}</textarea>
        {{-- show error massage start  --}}
        <span class="text-danger">
          @error('detail')
          {{$message}}
          @enderror
        </span>
        {{-- show error massage end --}}
      </div>

      <div class="mb-3">
        <button class="btn-primary btn w-100" name="submitted" type="submit" >Submit</button>
      </div>
    </form>
  </div>


@endsection

  

