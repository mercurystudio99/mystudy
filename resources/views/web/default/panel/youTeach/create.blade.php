@extends(getTemplate() .'.panel.layouts.panel_layout')

@push('styles_top')

@endpush

@section('content')
<div class="section">
    <div class="section-body">
        <div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="/panel/what-to-teach/{{ !empty($record) ? $record->id.'/update' : 'store' }}"
                      method="Post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
        <label>Banner</label>
        <input type="file" class="form-control @error('banner') is-invalid @enderror" onchange="loadFile(event)" id="fileUpload" name="banner" accept="image/*">
        @if(isset($record->banner) && $record->banner != null)
            <img src="{{ asset('images/' . $record->banner) }}" alt="Uploaded Image" id="image-preview" style="width: 30%;">
        @else
            <img id="image-preview" style="width: 30%;">
        @endif
        @error('banner')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
                    <div class="form-group">
                        <label class="form-select">Subject</label><br>
                        <select class="form-control @error('subject_id') is-invalid @enderror" aria-label="Default select example" name="subject_id">
                            <option selected disabled>Select any option</option>
                            @foreach($subjects as $subject)
                                <option value="{{$subject->id}}" {{@$subject->id == @$record->subject_id ? 'selected' : ''}}>{{$subject->title}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('subject_id') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-group">
                        <label class="form-select">Level</label><br>
                        <select class="form-control @error('level_id') is-invalid @enderror" aria-label="Default select example" name="level_id">
                            <option selected disabled>Select any option</option>
                            @foreach($levels as $level)
                                <option value="{{$level->id}}" {{@$level->id == @$record->level_id ? 'selected' : ''}}>{{$level->title}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('level_id') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-group">
                        <label class="form-select">Sublevel</label><br>
                        <select class="form-control @error('sublevel_id') is-invalid @enderror" aria-label="Default select example" name="sublevel_id">
                            <option selected disabled>Select any option</option>
                            @foreach($sub_levels as $sub_level)
                                <option value="{{$sub_level->id}}" {{@$sub_level->id == @$record->sublevel_id ? 'selected' : ''}}>{{$sub_level->title}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('sublevel_id') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" name="description"
                               class="form-control  @error('description') is-invalid @enderror"
                               value="{{ !empty($level) ? @$record->description : old('description') }}"
                               placeholder="Description"/>{{ !empty($record) ? @$record->description : old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="enabled" class="form-select">Active</label><br>
                        <select class="form-control @error('status') is-invalid @enderror" aria-label="Default select example" name="status">
                            <option selected disabled>Select any option</option>
                            <option value="Yes" {{@$level->status == 'Yes' ? 'selected' : ''}}>Yes</option>
                            <option value="No" {{@$level->status == 'No' ? 'selected' : ''}}>No</option>
                        </select>
                        <div class="invalid-feedback">@error('status') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                </div>
                </form>

                <li class="form-group main-row list-group d-none">
                    <div class="p-2 border rounded-sm">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text cursor-pointer move-icon">
                                    <i class="fa fa-arrows-alt"></i>
                                </div>
                            </div>

                            <input type="text" name="sub_categories[record][title]"
                                   class="form-control w-auto flex-grow-1"
                                   placeholder="{{ trans('admin/main.choose_title') }}"/>

                            <div class="input-group-append">
                                <button type="button" class="btn remove-btn btn-danger"><i class="fa fa-times"></i></button>
                            </div>
                        </div>

                        <div class="input-group mt-1">
                            <input type="text" name="sub_categories[record][slug]"
                                   class="form-control w-auto flex-grow-1"
                                   placeholder="{{ trans('admin/main.choose_url') }}"/>
                        </div>

                        <div class="input-group mt-1">
                            <div class="input-group-prepend">
                                <button type="button" class="input-group-text admin-file-manager " data-input="icon_record" data-preview="holder">
                                    <i class="fa fa-upload"></i>
                                </button>
                            </div>
                            <input type="text" name="sub_categories[record][icon]" id="icon_record" class="form-control" placeholder="{{ trans('admin/main.icon') }}"/>
                        </div>
                    </div>
                </li>

            </div>
        </div>
    </div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById("image-preview");
            var input = event.target;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    image.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        };

        // $(document).ready(function() {
        //     // Your other jQuery code if needed
        // });
    </script>
@endsection

@push('scripts_bottom')
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script>
        var teach_success_send = '{{ trans('panel.teach_success_send') }}';
    </script>

    <script src="/assets/default/js/panel/youTeach.min.js"></script>
@endpush