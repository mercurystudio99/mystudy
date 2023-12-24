@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ trans('admin/main.sessionTypes') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">{{ trans('admin/main.sessionTypes') }}</div>
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
                                        <th>{{ trans('sessiontypes.image') }}</th>
                                        <th class="text-left">{{ trans('sessiontypes.title') }}</th>
                                        <th class="text-left">{{ trans('sessiontypes.enabled') }}</th>
                                        <th>{{ trans('sessiontypes.created_at') }}</th>
                                        <th>{{ trans('sessiontypes.updated_at') }}</th>
                                        <th>Actions</th>
                                    </tr>
                                    @foreach($records as $record)

                                        <tr>
                                            <td><img src="{{ asset('images/' . $record->image) }}" alt="Uploaded Image" id="image-preview" style="width: 50px;"></td>
                                            <td class="text-left">{{ $record->title }}</td>
                                            <td>{{ $record->status }}</td>
                                            <td>{{ $record->created_at }}</td>
                                            <td>{{ $record->updated_at }}</td>
                                            
                                            <td>
                                                @can('admin_categories_edit')
                                                    <a href="{{ getAdminPanelUrl() }}/session-types/{{ $record->id }}/edit"
                                                       class="btn-transparent btn-sm text-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('admin_categories_delete')
                                                    @include('admin.includes.delete_button',['url' => getAdminPanelUrl().'/session-types/'.$record->id.'/delete', 'deleteConfirmMsg' => trans('update.session_type_delete_confirm_msg')])
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            {{ $records->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
