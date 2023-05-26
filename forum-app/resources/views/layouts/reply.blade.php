@section('content')
<div class="shadow p-3 mb-5 my-3 w-75 p-3 bg-light rounded">
      <h6 class="border-bottom border-gray pb-2 mb-0 fw-bold">Thread</h6>
      <div class=" p-3 mb-0 media text-dark pt-3 rounded">
            <strong class="d-block text-gray-dark">{{$data->post_subject}}</strong>
            <p class="media-body pb-0 mb-0 small lh-125 border-gray">
                  {{$data->post_desc}}
            </p>
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                  Author: {{$data->user->name}}
            </p>
      </div>

      @foreach($data->replies as $key => $record)
      <div class="p-3 ms-4 media text-dark pt-3 rounded ">
            <div class="d-flex justify-content-around">
                  <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                        <strong class="d-block text-gray-dark">{{$record->user->name}}</strong>
                  </div>
                  @if($record->user->id == Auth::user()->id)
                  <div class="group">
                        <a href="/updateReplyForm/{{$record->id}}" class="link-primary"><i class="fa fa-pencil" title="Edit"></i></a>
                        <a href="/deleteReply/{{$record->id}}" class="link-danger ml-2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                  </div>
                  @endif
            </div>

            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                  {{$record->reply_desc}}
            </p>
      </div>
      @endforeach

      <div class="shadow p-3 mb-3 media text-dark pt-3 rounded">
            <form action="{{url('addReply')}}" method="POST">
                  @csrf
                  <div class="form-group">
                        <!-- static user id dynamicc forum id -->
                        <input type="hidden" class="form-control" name="user_id" value="{{Auth::id()}}">
                        <input type="hidden" class="form-control" name="forum_id" value="{{$data->id}}">
                        <input type="text" class="form-control" name="reply_desc" placeholder="Reply...">
                  </div>
            </form>
      </div>
</div>
@endsection