@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ trans('admin/main.locations') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">{{ trans('admin/main.locations') }}</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th>{{ trans('location.country') }}</th>
                                        <th class="text-left">{{ trans('location.district') }}</th>
                                        <th class="text-left">{{ trans('location.locality') }}</th>
                                        <th>{{ trans('location.sub_locality') }}</th>
                                        <th>{{ trans('location.pin_code') }}</th>
                                        <th>{{ trans('location.longitude') }}</th>
                                        <th>{{ trans('location.latitude') }}</th>
                                        <th>Actions</th>
                                    </tr>
                                    @foreach($locations as $location)

                                        <tr>
                                            <td class="text-left">{{ $location->country }}</td>
                                            <td class="text-left">{{ $location->district }}</td>
                                            <td>{{ $location->locality }}</td>
                                            <td>{{ $location->sub_locality }}</td>
                                            <td>{{ $location->pin_code }}</td>
                                            <td>{{ $location->longitude }}</td>
                                            <td>{{ $location->latitude }}</td>
                                            
                                            <td>
                                                @can('admin_categories_edit')
                                                    <a href="{{ getAdminPanelUrl() }}/locations/{{ $location->id }}/edit"
                                                       class="btn-transparent btn-sm text-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('admin_categories_delete')
                                                    @include('admin.includes.delete_button',['url' => getAdminPanelUrl().'/locations/'.$location->id.'/delete', 'deleteConfirmMsg' => trans('update.location_delete_confirm_msg')])
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            {{ $locations->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
