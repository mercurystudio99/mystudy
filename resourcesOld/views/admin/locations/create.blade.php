@extends('admin.layouts.app')

@push('styles_top')
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{!empty($location) ?trans('/admin/main.edit'): trans('admin/main.new') }} {{ trans('admin/main.location') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{ trans('admin/main.dashboard') }}</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ getAdminPanelUrl() }}/locations">{{ trans('admin/main.locations') }}</a>
                </div>
                <div class="breadcrumb-item">{{!empty($location) ?trans('/admin/main.edit'): trans('admin/main.new') }}</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ getAdminPanelUrl() }}/locations/{{ !empty($location) ? $location->id.'/update' : 'store' }}"
                                  method="Post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>{{ trans('/admin/main.location_country') }}</label>
                                    <input type="text" name="country"
                                           class="form-control  @error('title') is-invalid @enderror"
                                           value="{{ !empty($location) ? $location->country : old('country') }}"
                                           placeholder="{{ trans('admin/main.choose_country') }}"/>
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('/admin/main.location_district') }}</label>
                                    <input type="text" name="district"
                                           class="form-control  @error('title') is-invalid @enderror"
                                           value="{{ !empty($location) ? $location->district : old('district') }}"
                                           placeholder="{{ trans('admin/main.choose_district') }}"/>
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('/admin/main.location_locality') }}</label>
                                    <input type="text" name="locality"
                                           class="form-control  @error('title') is-invalid @enderror"
                                           value="{{ !empty($location) ? $location->locality : old('locality') }}"
                                           placeholder="{{ trans('admin/main.choose_locality') }}"/>
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('/admin/main.location_sub_locality') }}</label>
                                    <input type="text" name="sub_locality"
                                           class="form-control  @error('title') is-invalid @enderror"
                                           value="{{ !empty($location) ? $location->sub_locality : old('sub_locality') }}"
                                           placeholder="{{ trans('admin/main.choose_sub_locality') }}"/>
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('/admin/main.location_pincode') }}</label>
                                    <input type="text" name="pin_code"
                                           class="form-control  @error('title') is-invalid @enderror"
                                           value="{{ !empty($location) ? $location->pin_code : old('pin_code') }}"
                                           placeholder="{{ trans('admin/main.choose_pincode') }}"/>
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('/admin/main.location_longitude') }}</label>
                                    <input type="number" name="longitude"
                                           class="form-control  @error('title') is-invalid @enderror"
                                           value="{{ !empty($location) ? $location->longitude : old('longitude') }}"
                                           placeholder="{{ trans('admin/main.choose_longitude') }}"/>
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('/admin/main.location_latitude') }}</label>
                                    <input type="number" name="latitude"
                                           class="form-control  @error('title') is-invalid @enderror"
                                           value="{{ !empty($location) ? $location->latitude : old('latitude') }}"
                                           placeholder="{{ trans('admin/main.choose_latitude') }}"/>
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
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
