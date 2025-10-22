@extends('layouts.admin.dashboard', ['pageTitle' => 'FAQs'])
@section('content')
<div class="mb-4" style="display: flex; justify-content: space-between;">
  <div>
    <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#new-faq-modal">
      <i class="mdi mdi-plus btn-icon-prepend"></i> New FAQ
    </button>
  </div>
  @include('layouts.admin.partials.toast')
</div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">FAQs</h4>

            <p class="card-description">
              <b>{{ count($faqs) }}</b> total faqs 
            </p>
            @include('layouts.admin.partials.toast')

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Question</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($faqs as $faq)
                <tr id="{{ $faq->id }}">
                  <td>{{ $faq->question }}</td>
                  <td>
                    <label class="switch">
                      <input type="checkbox" name="enabled" id="enabled_{{$faq->id}}" @if($faq->is_active) checked @endif onchange="toggleEnable('{{$faq->id}}', this.checked, '{{route('admin.faqs.toggleActive')}}')">
                      <span class="slider round"></span>
                    </label>
                  </td>
                  <td style="font-size: 18px;">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit-faq-{{$faq->id}}-modal">
                      <i class="mdi mdi-pencil"></i>
                    </a>
                    &nbsp;
                    <a href="#" onclick="removeRecord('{{ route('admin.faqs.destroy', $faq) }}', '{{ $faq->id }}')">
                      <i class="mdi mdi-trash-can"></i>
                    </a>
                  </td>
                </tr>
                <!-- Edit FAQ Modal -->
                  <div class="modal fade" id="edit-faq-{{$faq->id}}-modal" tabindex="-1" role="dialog" aria-labelledby="newFAQModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Edit FAQ</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{ route('admin.faqs.update', $faq) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                              <div class="col-md-12">
                                    <label for="question">Question</label>
                                    <input class="form-control" name="question" value="{{$faq->question}}" placeholder="Enter faq question" required />
                                </div>
                              </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="answer">Answer</label>
                                    <input class="form-control" name="answer" value="{{$faq->answer}}" placeholder="Enter faq answer" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12" style="text-align:center;">
                                    <input type="submit" class="btn btn-success" value="Save and close" />
                                </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- End Edit FAQ Modal -->
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Create FAQ Modal -->
  <div class="modal fade" id="new-faq-modal" tabindex="-1" role="dialog" aria-labelledby="newFAQModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5">Add new faq</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form method="post" action="{{route('admin.faqs.store')}}">
                      @csrf
                      <div class="form-group row">
                          <div class="col-12">
                              <label for="question">Question</label>
                              <input class="form-control" name="question" value="{{old('question')}}" placeholder="Enter faq question" required />
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-12">
                              <label for="answer">Answer</label>
                              <input class="form-control" name="answer" value="{{old('answer')}}" placeholder="Enter faq answer" required />
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-12" style="text-align:center;">
                              <input type="submit" class="btn btn-success" value="Save and close" />
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <!-- End Create FAQ Modal -->
@endsection