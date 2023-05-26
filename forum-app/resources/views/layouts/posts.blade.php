@section('content')
<div class="shadow p-3 mb-5 my-3 w-75 p-3 bg-light bg-gradient rounded">
        <h6 class="border-bottom border-gray pb-2 mb-0 fw-bold">Forum</h6>
        @foreach($data as $key => $data)
            <div class="shadow p-3 mb-3 media text-dark pt-3 rounded">
            <div class="d-flex justify-content-around">
                  <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <a href="/posts/{{$data->id}}" class="nav-link text-dark">
                    <strong class="d-block text-gray-dark">{{$data->post_subject}}</strong></a>
                  </div>
                  @if($data->user->id == Auth::user()->id)
                  <div class="group">
                        <a href= "/updatePostForm/{{$data->id}}" class = "link-primary"><i class="fa fa-pencil" title="Edit"></i></a>
                        <a href = "/deletePost/{{$data->id}}" class ="link-danger ml-2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                  </div>
                  @endif
            </div>
            <h6>{{$data->user->name}}</h6>
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            {{$data->post_desc}}
            </p>
            </div>
        @endforeach
      </div>
@endsection