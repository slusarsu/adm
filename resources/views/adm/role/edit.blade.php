@extends('adm.layouts.app')

@section('content')
    <x-adm.breadcrumb>
        <x-slot name="breadcrumb_title">
            {{__('adm.edit_role')}}
        </x-slot>
        <li class="breadcrumb-item">
            <a href="{{route('adm.role')}}">{{__('adm.roles')}}</a>
        </li>
        <li class="breadcrumb-item">{{__('adm.edit_role')}}</li>
    </x-adm.breadcrumb>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <form method="post" action="{{route('adm.role-update')}}">
            @csrf
            <div class="card">

                <div class="card-body">

                    <input type="hidden" name="id" value="{{$item->id}}">

                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="name">{{__('adm.name')}}*</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="{{__('adm.enter_name')}}" required value="{{$item->name}}">
                    </div>

                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="label">{{__('adm.label')}}*</label>
                        <input class="form-control" id="label" name="label" type="text" placeholder="{{__('adm.label')}}" required value="{{$item->label}}">
                    </div>

                    <div class="mb-3">
                        <x-adm.form.select2-multiple
                                :label="'adm.permissions'"
                                :name="'permissions'"
                                :id="'role-permissions'"
                                :required="false"
                                :data="$permissions"
                                :value="$permissionSelected"
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
@endsection