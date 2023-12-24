@extends('admin.layouts.app')

@push('styles_top')
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{!empty($subject) ? 'Edit': 'New' }}  Subject</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{ trans('admin/main.dashboard') }}</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ getAdminPanelUrl() }}/subjects">Subjects</a>
                </div>
                <div class="breadcrumb-item">{{!empty($subject) ?trans('/admin/main.edit'): trans('admin/main.new') }}</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ getAdminPanelUrl() }}/subjects/{{ !empty($subject) ? $subject->id.'/update' : 'store' }}"
                                  method="Post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title"
                                           class="form-control  @error('title') is-invalid @enderror"
                                           value="{{ !empty($subject) ? $subject->title : old('title') }}"
                                           placeholder="Title"/>
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="enabled" class="form-select">Level</label><br>
                                    <select class="form-control @error('level_id') is-invalid @enderror" aria-label="Default select example" name="level_id">
                                        <option selected disabled>Select any level</option>
                                        @foreach($levels as $level)
                                        <option value="{{$level->id}}" {{@$subject->level_id == $level->id ? 'selected' : ''}}>{{$level->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('level_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="enabled" class="form-select">Sublevel</label><br>
                                    <select class="form-control @error('sublevel_id') is-invalid @enderror" aria-label="Default select example" name="sublevel_id">
                                        <option selected disabled>Select any sublevel</option>
                                        @foreach($sub_levels as $sub_level)
                                        <option value="{{$sub_level->id}}" {{@$subject->sublevel_id == $sub_level->id ? 'selected' : ''}}>{{$sub_level->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('sublevel_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="enabled" class="form-select">{{trans ('/admin/main.enabled')}}</label><br>
                                    <select class="form-control" aria-label="Default select example" name="status">
                                        <option value="Yes" {{@$subject->status == 'Yes' ? 'selected' : ''}}>Yes</option>
                                        <option value="No" {{@$subject->status == 'No' ? 'selected' : ''}}>No</option>
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
@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>

    <script src="/assets/default/js/admin/categories.min.js"></script>
@endpush
