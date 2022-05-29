@extends('adm.layouts.app')

@section('content')
    <x-adm.breadcrumb>
        <x-slot name="breadcrumb_title">
            {{__('adm.profile')}}
        </x-slot>
        <li class="breadcrumb-item">
            <a href="{{route('adm.profile', $item->user->id)}}">{{__('adm.profile')}}</a>
        </li>
        <li class="breadcrumb-item">{{__('adm.edit_profile')}}</li>
    </x-adm.breadcrumb>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <form method="post" action="{{route('adm.profile-update')}}" class="theme-form mega-form">
            @csrf

            <input type="hidden" name="id" value="{{$item->id}}">

            <div class="card">
                <div class="card-header pb-0">
                    <button class="btn btn-primary" type="submit">{{__('adm.submit')}}</button>
                    <a href="{{route('adm.profile', $item->user->id)}}" class="btn btn-secondary">{{__('adm.cancel')}}</a>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="info-user-tab" data-bs-toggle="tab" href="#info-user" role="tab" aria-controls="info-user" aria-selected="true">
                                <i class="icofont icofont-man-in-glasses"></i>
                                {{__('adm.user_information')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="info-address-tab" data-bs-toggle="tab" href="#info-address" role="tab" aria-controls="info-address" aria-selected="false">
                                <i class="icofont icofont-ui-home"></i>
                                {{__('adm.address_information')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="info-social-tab" data-bs-toggle="tab" href="#info-social" role="tab" aria-controls="info-social" aria-selected="false">
                                <i class="icofont icofont-ui-social-link"></i>
                                {{__('adm.social_information')}}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="info-tabContent">

                        <div class="tab-pane fade show active" id="info-user" role="tabpanel" aria-labelledby="info-user-tab">

                            <div class="row my-3">
                                <div class="cl-sm-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="first_name">{{__('adm.first_name')}}*</label>
                                        <input class="form-control" id="first_name" name="first_name" type="text" placeholder="{{__('adm.first_name')}}" value="{{$item->first_name}}">
                                    </div>
                                </div>

                                <div class="cl-sm-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="last_name">{{__('adm.last_name')}}</label>
                                        <input class="form-control" id="last_name" name="last_name" type="text" placeholder="{{__('adm.last_name')}}" value="{{$item->last_name}}">
                                    </div>
                                </div>

                                <div class="cl-sm-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="middle_name">{{__('adm.middle_name')}}</label>
                                        <input class="form-control" id="middle_name" name="middle_name" type="text" placeholder="{{__('adm.middle_name')}}" value="{{$item->middle_name}}">
                                    </div>
                                </div>
                                <div class="cl-sm-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="birth_day">{{__('adm.birth_day')}}</label>
                                        <input class="form-control" id="birth_day" name="birth_day" type="date" value="{{$item->birth_day}}">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="description">{{__('adm.description')}}</label>
                                <textarea id="description" class="ckeditor" name="description" cols="30" rows="10" name="description">{{$item->description}}</textarea>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="info-address" role="tabpanel" aria-labelledby="info-address-tab">

                            <div class="row">
                                <div class="cl-sm-12 col-md-4">
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="country">{{__('adm.country')}}*</label>
                                        <input class="form-control" id="country" name="country" type="text" placeholder="{{__('adm.country')}}" value="{{$item->country}}">
                                    </div>
                                </div>

                                <div class="cl-sm-12 col-md-4">
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="city">{{__('adm.city')}}</label>
                                        <input class="form-control" id="city" name="city" type="text" placeholder="{{__('adm.city')}}" value="{{$item->city}}">
                                    </div>
                                </div>

                                <div class="cl-sm-12 col-md-4">
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="postal_code">{{__('adm.postal_code')}}</label>
                                        <input class="form-control" id="postal_code" name="postal_code" type="text" placeholder="{{__('adm.postal_code')}}" value="{{$item->postal_code}}">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="address">{{__('adm.address')}}</label>
                                <input class="form-control" id="address" name="address" type="text" placeholder="{{__('adm.address')}}" value="{{$item->address}}">
                            </div>

                        </div>

                        <div class="tab-pane fade" id="info-social" role="tabpanel" aria-labelledby="contact-info-tab">
                            <div class="row">
                                <div class="cl-sm-12 col-md-3">
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="country">{{__('adm.website')}}*</label>
                                        <input class="form-control" id="website" name="website" type="url" placeholder="{{__('adm.website')}}" value="{{$item->website}}">
                                    </div>
                                </div>

                                <div class="cl-sm-12 col-md-3">
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="facebook">Facebook</label>
                                        <input class="form-control" id="facebook" name="facebook" type="text" placeholder="facebook" value="{{$item->facebook}}">
                                    </div>
                                </div>

                                <div class="cl-sm-12 col-md-3">
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="instagram">Instagram</label>
                                        <input class="form-control" id="instagram" name="instagram" type="text" placeholder="instagram" value="{{$item->instagram}}">
                                    </div>
                                </div>

                                <div class="cl-sm-12 col-md-3">
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="linkedin">LinkedIn</label>
                                        <input class="form-control" id="linkedin" name="linkedin" type="text" placeholder="linkedin" value="{{$item->linkedin}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </form>
    </div>
    <!-- Container-fluid Ends-->
@endsection