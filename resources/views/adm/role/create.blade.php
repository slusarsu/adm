@extends('adm.layouts.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/select2.css') }}">
@endpush

@section('content')
    <x-adm.breadcrumb>
        <x-slot name="breadcrumb_title">
            {{__('adm.create_role')}}
        </x-slot>
        <li class="breadcrumb-item">
            <a href="{{route('adm.role')}}">{{__('adm.roles')}}</a>
        </li>
        <li class="breadcrumb-item">{{__('adm.create_role')}}</li>
    </x-adm.breadcrumb>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <form method="post" action="{{route('adm.role-store')}}">
            @csrf
            <div class="card">

                <div class="card-body">

                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="name">{{__('adm.name')}}*</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="{{__('adm.enter_name')}}" required value="{{old('name')}}">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="label">{{__('adm.label')}}</label>
                        <input class="form-control" id="label" name="label" type="text" placeholder="{{__('adm.label')}}" value="{{old('label')}}">
                    </div>

                    <div class="mb-3">
                        <x-adm.form.select2-multiple
                                :label="'adm.permissions'"
                                :name="'permissions'"
                                :id="'role-permissions'"
                                :required="false"
                                :data="$permissions"
                        />
                    </div>

                </div>

                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">{{__('adm.submit')}}</button>
                    <a href="{{route('adm.role')}}" class="btn btn-secondary">{{__('adm.cancel')}}</a>
                </div>

            </div>

        </form>
    </div>
    <!-- Container-fluid Ends-->

    @push('scripts')
        <script src="{{ asset('/assets/js/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('/assets/js/select2/select2-custom.js') }}"></script>
    @endpush
@endsection