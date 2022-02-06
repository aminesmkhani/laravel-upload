@extends('layout.core')

@section('content')
    <div class="row my-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
            <div>
{{--                @include('partials.alerts')--}}
            </div>
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row mb-3">
                        <div class="col-6">
                            <h6>آپلود فایل</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0 pb-2">
                    <form action="{{route('file.new')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="mb-3 m-4">
                                <lable class="col-form-label" for="customFile">فایل خود را انتخاب کنید</lable>
                                <input type="file" name="file" class="input-group" id="customFile">

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3 m-4">
                                <lable class="col-form-label" for="is-private">به صورت خصوصی آپلود شود!</lable>
                                <input type="checkbox" name="is-private" class="input-group" id="is-private">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-center m-4">
                                <button type="submit" class="btn btn-primary">آپلود فایل</button>
                            </div>
                        </div>

                        <div class="form-group">
{{--                            @include('partials.validation')--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
