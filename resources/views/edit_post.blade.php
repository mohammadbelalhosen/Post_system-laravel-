@extends('layout.frontend_slice')

@section('missing')
      <div class="container">
    <form action="{{route('post.update',$post->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Edit Post Title</label>
        <input type="text" class="form-control" id="formGroupExampleInput" value="{{$post->title}}" name="title" />
        {{-- show error start --}}
        <span class="text-danger">
          @error('title')
          {{$message}}    
          @enderror
        </span>
        {{-- show error end --}}
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Edit Details</label>
        <textarea class="form-control" name="detail" id="" cols="30" rows="10">{{$post->detail}}</textarea>
                {{-- show error start --}}
                <span class="text-danger">
                  @error('detail')
                  {{$message}}    
                  @enderror
                </span>
                {{-- show error end --}}
      </div>

      <div class="mb-3">
        <button name="updatted" type="submit" class="btn btn-primary w-100">Update</button>
      </div>
    </form>
  </div>

@endsection

