@extends('layout.frontend_slice')
@section('missing')
{{--show toast massage when post updatted start --}}
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
{{--show toast massage when post updatted end --}}
        <div class="container">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Details</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- foreach loop for showing all data  --}}
               @foreach ($posts as $key=> $post)
                   <tr>
                        <td>{{++$key}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->detail}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('post.edit',$post->id)}}">Edit</a>
                            <form class="d-inline" action="{{route('post.delete',$post->id)}}" method="post">
                                @csrf
                                @method('DELETE')  
                                <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                   </tr>
               @endforeach

            </tbody>
        </table>

        {{-- for pagination --}}
        <div>
            {{$posts}}
        </div>
    </div>

@endsection
