@extends('admin.layouts.app')

@push('styles_top')
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{!empty($sessiontype) ?trans('/admin/main.edit'): trans('admin/main.new') }} {{ trans('admin/main.sessiontype') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{ trans('admin/main.dashboard') }}</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ getAdminPanelUrl() }}/session-types">{{ trans('admin/main.sessionTypes') }}</a>
                </div>
                <div class="breadcrumb-item">{{!empty($sessiontype) ?trans('/admin/main.edit'): trans('admin/main.new') }}</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ getAdminPanelUrl() }}/session-types/{{ !empty($sessiontype) ? $sessiontype->id.'/update' : 'store' }}"
                                  method="Post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>{{ trans('/admin/main.title') }}</label>
                                    <input type="text" name="title"
                                           class="form-control  @error('title') is-invalid @enderror"
                                           value="{{ !empty($sessiontype) ? $sessiontype->title : old('title') }}"
                                           placeholder="{{ trans('admin/main.choose_title') }}"/>
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('/admin/main.details') }}</label>
                                    <textarea type="text" name="description"
                                           class="form-control  @error('title') is-invalid @enderror"
                                           placeholder="{{ trans('admin/main.choose_details') }}">{{ !empty($sessiontype) ? $sessiontype->description : old('description') }}</textarea>
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('/admin/main.image') }}</label>
                                    <input type="file" class="form-control" id="img" name="image" accept="image/*">
                                    @if(@$sessiontype->image && @$sessiontype->image!=null)
                                    <img src="{{ asset('images/' . $sessiontype->image) }}" alt="Uploaded Image" id="image-preview" style="width: 30%;">
                                    @else
                                    <div id="image-preview"></div>
                                    @endif
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="enabled" class="form-select">{{trans ('/admin/main.enabled')}}</label><br>
                                    <select class="form-select" aria-label="Default select example" name="status">
                                        <option selected disabled>Select any option</option>
                                        <option value="Yes" {{@$sessiontype->status == 'Yes' ? 'selected' : ''}}>Yes</option>
                                        <option value="No" {{@$sessiontype->status == 'No' ? 'selected' : ''}}>No</option>
                                    </select>
                                </div>
                                <div class="text-right mt-4">
                                    <button class="btn btn-primary">{{ trans('admin/main.submit') }}</button>
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
    </section>
    <script>
document.getElementById('img').addEventListener('change', function(event) {
  var file = event.target.files[0];
  var reader = new FileReader();

  reader.onload = function(e) {
    var imageUrl = e.target.result;
    var imagePreview = document.getElementById('image-preview');
    imagePreview.innerHTML = `<img src="${imageUrl}" alt="Selected Image" style="width: 30%;">`;
  };

  reader.readAsDataURL(file);
});
</script>
@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>

    <script src="/assets/default/js/admin/categories.min.js"></script>
@endpush
