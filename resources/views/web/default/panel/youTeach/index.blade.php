@extends(getTemplate() .'.panel.layouts.panel_layout')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
@endpush

@section('content')
    <section>
        <h2 class="section-title">My What To Teach</h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/webinars.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"></strong>
                        <span class="font-16 text-gray font-weight-500"></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/hours.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"></strong>
                        <span class="font-16 text-gray font-weight-500"></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/sales.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"></strong>
                        <span class="font-16 text-gray font-weight-500"></span>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/download-sales.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"></strong>
                        <span class="font-16 text-gray font-weight-500">{{ trans('update.bundle_sales_count') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-25">
        <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
            <!-- <h2 class="section-title">My Subjects</h2> -->
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Banner</th>
                <th scope="col">Level</th>
                <th scope="col">Sub Level</th>
                <th scope="col">Subject</th>
                <th scope="col">Active</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <td scope="col">Actions</td>
            </tr>
            </thead>
            <tbody>
                @foreach($records as $record)
                    <td><img src="{{ asset('images/' . $record->banner) }}" alt="Uploaded Image" id="image-preview" style="width: 50px;"></td>
                    <td>{{@$record->level->title}}</td>
                    <td>{{@$record->sublevel->title}}</td>
                    <td>{{@$record->subject->title}}</td>
                    <td>{{@$record->status}}</td>
                    <td>{{@$record->created_at}}</td>
                    <td>{{@$record->updated_at}}</td>
                    <td class="text-right align-middle">
                        <div class="btn-group dropdown table-actions">
                            <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="more-vertical" height="20"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="/panel/what-to-teach/{{ $record->id }}/edit" class="webinar-actions d-block mt-10 text-hover-primary">{{ trans('public.edit') }}</a>
                                <a href="/panel/what-to-teach/{{ $record->id }}/delete" class="delete-action webinar-actions d-block mt-10 text-hover-primary">{{ trans('public.delete') }}</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

            <div class="my-30">
                
            </div>

            <div class="d-none" id="noticeboardMessageModal">
        <div class="text-center">
            <h3 class="modal-title font-16 font-weight-bold text-dark-blue"></h3>
            <span class="modal-time d-block font-12 text-gray mt-15"></span>
            <p class="modal-message font-weight-500 text-gray mt-2"></p>
        </div>
    </div>

    </section>

@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/js/panel/noticeboard.min.js"></script>
@endpush