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
                        <form action="/panel/addresses/{{ !empty($record) ? $record->id.'/update' : 'store' }}" method="Post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Address</label>
                                <textarea type="text" name="address1" class="form-control  @error('address1') is-invalid @enderror" value="{{ !empty($record) ? @$record->address1 : old('address1') }}" placeholder="Address1" />{{ !empty($record) ? @$record->address1 : old('address1') }}</textarea>
                                @error('address1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- <div class="form-group">
                        <label for="longitude">longitude</label>
                        <input type="number" name="longitude" class="form-control @error('longitude') is-invalid @enderror" value="{{ !empty($record) ? @$record->longitude : old('longitude') }}" placeholder="Longitude">
                        @error('longitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="number" name="latitude" class="form-control @error('latitude') is-invalid @enderror" value="{{ !empty($record) ? @$record->latitude : old('latitude') }}" placeholder="Latitude">
                        @error('latitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div> -->
                    
                            <div class="form-group">
                                <label class="form-select">Country</label><br>
                                <select class="form-control @error('country_id') is-invalid @enderror" aria-label="Default select example" id="country_id" name="country_id">
                                    <option selected disabled>Select any option</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->country}}" class="" {{@$country->country == @$record->country->country ? 'selected' : '' }}>{{$country->country}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">@error('country_id') {{ $message }} @enderror</div>
                            </div>
                            <div class="form-group">
                                <label class="form-select">District</label><br>
                                <select class="form-control @error('district_id') is-invalid @enderror" aria-label="Default select example" name="district_id" id="districtSelect">
                                    <option selected disabled>Select any option</option>

                                </select>
                                <div class="invalid-feedback">@error('district_id') {{ $message }} @enderror</div>
                            </div>
                            <div class="form-group">
                                <label class="form-select">Locality</label><br>
                                <select class="form-control @error('locality_id') is-invalid @enderror" aria-label="Default select example" name="locality_id" id="localitySelect">
                                    <option selected disabled>Select any option</option>

                                </select>
                                <div class="invalid-feedback">@error('locality_id') {{ $message }} @enderror</div>
                            </div>
                            <!-- <div class="form-group">
                        <label class="form-select">Sub Locality</label><br>
                        <select class="form-control @error('sublocality_id') is-invalid @enderror" aria-label="Default select example" name="sublocality_id" id="subLocalitySelect">
                            <option selected disabled>Select any option</option>
                        </select>
                        <div class="invalid-feedback">@error('sublocality_id') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-group">
                        <label class="form-select">Code</label><br>
                        <select class="form-control @error('code') is-invalid @enderror" aria-label="Default select example" name="code">
                            <option selected disabled>Select any option</option>
                           @foreach($locations as $location)
                                <option value="{{$location->id}}" {{@$location->id == @$record->code}} ? selected : ''>{{$location->pin_code}}</option>
                           @endforeach
                        </select>
                        <div class="invalid-feedback">@error('code') {{ $message }} @enderror</div>
                    </div> -->
                            <div class="form-group">
                                <label for="enabled" class="form-select">Active</label><br>
                                <select class="form-control  @error('status') is-invalid @enderror" aria-label="Default select example" name="status">
                                    <option value="Yes" {{@$record->status == 'Yes' ? 'selected' : ''}}>Yes</option>
                                    <option value="No" {{@$record->status == 'No' ? 'selected' : ''}}>No</option>
                                </select>
                                <div class="invalid-feedback">@error('status') {{ $message }} @enderror</div>
                            </div>
                            <div class="form-group">
                                <button id="submitForm" class="btn btn-primary btn-sm" type="button">Submit</button>
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

                                    <input type="text" name="sub_categories[record][title]" class="form-control w-auto flex-grow-1" placeholder="{{ trans('admin/main.choose_title') }}" />

                                    <div class="input-group-append">
                                        <button type="button" class="btn remove-btn btn-danger"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

                                <div class="input-group mt-1">
                                    <input type="text" name="sub_categories[record][slug]" class="form-control w-auto flex-grow-1" placeholder="{{ trans('admin/main.choose_url') }}" />
                                </div>

                                <div class="input-group mt-1">
                                    <div class="input-group-prepend">
                                        <button type="button" class="input-group-text admin-file-manager " data-input="icon_record" data-preview="holder">
                                            <i class="fa fa-upload"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="sub_categories[record][icon]" id="icon_record" class="form-control" placeholder="{{ trans('admin/main.icon') }}" />
                                </div>
                            </div>
                        </li>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
@push('scripts_bottom')
<script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
<script>
    var address_success_send = "{{ trans('panel.address_success_send') }}";
</script>

<script src="/assets/default/js/panel/addresses.min.js"></script>
@endpush
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    var recordDistrict = @json(optional(@$record->country)->district ?? null);
</script>
<script>
    var recordLocality = @json(optional(@$record->locality)->locality ?? null);
</script>
<script>
    $(document).ready(function() {
        function country_change() {
            var country_id = $('#country_id').val();

            // AJAX request
            $.ajax({
                type: "POST",
                url: "{{ route('addresses.getDistrict') }}", // Specify the route URL
                data: {
                    country_id: country_id
                },
                success: function(response) {
                    var select = $("#districtSelect");
                    select.empty(); // Clear existing options

                    // Add the new options
                    $.each(response, function(index, district) {
            select.append('<option value="' + district.district + '" ' + 
                (recordDistrict && recordDistrict == district.district ? 'selected' : '') + 
                '>' + district.district + '</option>');
        });

                    // Optionally, trigger change event to update the select UI
                    select.trigger('change');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
        country_change();
        $("#country_id").change(function() {
            country_change();
        });

        $("#districtSelect").change(function() {
    
            var district_id = $(this).val();
            // AJAX request
            $.ajax({
                type: "POST",
                url: "{{ route('addresses.getLocality') }}", // Specify the route URL
                data: {
                    district_id: district_id
                },
                success: function(response) {
                    var select = $("#localitySelect");
                    select.empty(); // Clear existing options

                    // Add the new options
                    // $.each(response, function(index, locality) {
                    //     select.append('<option value="' + locality.locality + '">' + locality.locality + '</option>');
                    // });
                    $.each(response, function(index, locality) {
            select.append('<option value="' + locality.locality + '" ' + 
                (recordLocality && recordLocality == locality.locality ? 'selected' : '') + 
                '>' + locality.locality + '</option>');
        });

                    // Optionally, trigger change event to update the select UI
                    select.trigger('change');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $("#localitySelect").change(function() {
            var locality_id = $(this).val();
            // AJAX request
            $.ajax({
                type: "POST",
                url: "{{ route('addresses.getSubLocality') }}", // Specify the route URL
                data: {
                    locality_id: locality_id
                },
                success: function(response) {
                    var select = $("#subLocalitySelect");
                    select.empty(); // Clear existing options

                    // Add the new options
                    $.each(response, function(index, sublocality) {
                        select.append('<option value="' + sublocality.id + '">' + sublocality.sub_locality + '</option>');
                    });

                    // Optionally, trigger change event to update the select UI
                    select.trigger('change');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>