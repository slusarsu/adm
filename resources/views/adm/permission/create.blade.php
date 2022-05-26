@extends('adm.layouts.app')

@section('content')
    <x-adm.breadcrumb>
        <x-slot name="breadcrumb_title">
            {{__('adm.create_permission')}}
        </x-slot>
        <li class="breadcrumb-item">
            <a href="{{route('adm.permission')}}">{{__('adm.permissions')}}</a>
        </li>
        <li class="breadcrumb-item">{{__('adm.create_permission')}}</li>
    </x-adm.breadcrumb>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <form method="post" action="{{route('adm.permission-store')}}">
            @csrf
            <div class="card">

                <div class="card-body">

                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="name">{{__('adm.name')}}*</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="{{__('adm.enter_name')}}" required value="{{old('name')}}">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="native-name">{{__('adm.label')}}</label>
                        <input class="form-control" id="native-name" name="label" type="text" placeholder="{{__('adm.label')}}" value="{{old('label')}}">
                    </div>

                </div>

                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">{{__('adm.submit')}}</button>
                    <a href="{{route('adm.permission')}}" class="btn btn-secondary">{{__('adm.cancel')}}</a>
                </div>

            </div>

        </form>
    </div>
    <!-- Container-fluid Ends-->
@endsection