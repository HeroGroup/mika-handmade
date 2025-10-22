@extends('layouts.admin.dashboard', ['pageTitle' => 'Customer Message'])
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Message</h4>
          <h6>{{ $contact->name }}</h6>
          <h6>{{ $contact->email }}</h6>
          <h6>{{ $contact->phone }}</h6>
          <hr />
          <p>{{ $contact->subject }}</p>
          @if($contact->subject) <hr /> @endif
          <p>{{ $contact->message }}</p>
          <hr />
          <div class="form-group row">
            <div class="col-md-12">
              <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#reply-modal">Reply</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Reply Modal -->
  <div class="modal fade" id="reply-modal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5">Reply</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form method="post" action="{{route('admin.messages.reply')}}">
                      @csrf
                      <div class="form-group row">
                          <div class="col-12">
                              <label for="reply_message">Message</label>
                              <textarea class="form-control" name="reply_message" rows="8"></textarea>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-12" style="text-align:center;">
                              <input type="submit" class="btn btn-success" value="Send Message" />
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <!-- End Reply Modal -->
@endsection