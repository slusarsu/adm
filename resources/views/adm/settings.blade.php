@extends('adm.layouts.app')

@section('content')
    <x-adm.breadcrumb>
        <x-slot name="breadcrumb_title">
            {{__('adm.settings')}}
        </x-slot>
        <li class="breadcrumb-item">
            <a href="{{route('adm')}}">{{__('adm.dashboard')}}</a>
        </li>
        <li class="breadcrumb-item">{{__('adm.settings')}}</li>
    </x-adm.breadcrumb>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Sample Card</h5><span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                    </div>
                    <div class="card-body">
                        <div class="private-color color-one" data-primary="#24695c" data-secondary="#ba895d"></div>
                        <div class="private-color color-two" data-primary="#d97f3d" data-secondary="#f25f4c"></div>
                        <div class="private-color color-three" data-primary="#168eea" data-secondary="#90b4cd"></div>
                        <div class="private-color color-fore" data-primary="#d1d1e9" data-secondary="#665ed5"></div>
                        <div class="private-color color-five" data-primary="#3a9aa8" data-secondary="#984ff3"></div>
                        <div class="private-color color-six" data-primary="#7951aa" data-secondary="#72757D"></div>

                        <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off">
                        <label class="btn private-color color-one" for="option1"></label>

                        <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                        <label class="btn private-color color-two" for="option2"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection