@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Sublevels</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">Sublevels</div>
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
                                        <th>Title</th>
                                        <th>Level</th>
                                        <th>Enabled</th>
                                        <th>Actions</th>
                                    </tr>
                                    @foreach($sub_levels as $sub_level)

                                        <tr>
                                            <td class="text-left">{{ @$sub_level->title }}</td>
                                            <td>{{@$sub_level->level->title}}</td>
                                            <td>{{@$sub_level->status}}</td>
                                            
                                            <td>
                                                @can('admin_categories_edit')
                                                    <a href="{{ getAdminPanelUrl() }}/sublevels/{{ $sub_level->id }}/edit"
                                                       class="btn-transparent btn-sm text-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('admin_categories_delete')
                                                    @include('admin.includes.delete_button',['url' => getAdminPanelUrl().'/sublevels/'.$sub_level->id.'/delete', 'deleteConfirmMsg' => trans('update.sub_level_delete_confirm_msg')])
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            {{ $sub_levels->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
