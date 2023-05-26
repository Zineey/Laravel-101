@section('content')
<div class="shadow p-3 mb-5 my-3 w-75 p-3 bg-light rounded">
<form action ="{{ url('updatePost/'.$data->id) }}" method ="POST">
  @csrf
  <div class="form-group mt-3">
    <!-- Static user id -->
    <input type="hidden" class="form-control" name = "user_id" value = "{{Auth::id()}}">
    <label>Topic Subject</label>
    <input type="text" class="form-control"name = "post_subject" value = "{{$data->post_subject}}">
  </div>

  <div class="form-group mt-3">
    <label for="PostDesc">Topic Description</label>
    <textarea class="form-control" rows="10" name = "post_desc">{{$data->post_desc}}</textarea>
  </div>
  <div class="form-group d-flex flex-row-reverse">
  <button type="submit" class="btn btn-primary px-4 gap-3 mt-3 mr-2">Post</button>
  <a href="/posts" class="nav-link text-danger mt-4 mr-2">Cancel</a>
  </div>
</form>

</div>
@endsection