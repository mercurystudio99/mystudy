@extends('admin.layouts.app')

@push('libraries_top')

@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Subjects</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">Subjects</div>
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
                                        <th>Sublevel</th>
                                        <th>Enabled</th>
                                        <th>Actions</th>
                                    </tr>
                                    @foreach($subjects as $subject)

                                        <tr>
                                            <td class="text-left">{{@$subject->title }}</td>
                                            <td>{{@$subject->sublevel->level->title}}</td>
                                            <td>{{@$subject->sublevel->title}}</td>
                                            <td>{{@$subject->status}}</td>
                                            
                                            <td>
                                                @can('admin_categories_edit')
                                                    <a href="{{ getAdminPanelUrl() }}/subjects/{{ $subject->id }}/edit"
                                                       class="btn-transparent btn-sm text-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('admin_categories_delete')
                                                    @include('admin.includes.delete_button',['url' => getAdminPanelUrl().'/subjects/'.$subject->id.'/delete', 'deleteConfirmMsg' => trans('update.subject_delete_confirm_msg')])
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            {{ $subjects->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
