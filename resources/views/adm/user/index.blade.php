@extends('adm.layouts.app')

@section('content')
    <x-adm.breadcrumb>
        <x-slot name="breadcrumb_title">
            {{__('adm.users')}}
        </x-slot>
        <li class="breadcrumb-item">{{__('adm.users')}}</li>
    </x-adm.breadcrumb>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header pb-0">

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <div class="d-flex">
                        <x-adm.button.create :url="route('adm.user-create')"/>
                        <x-adm.button.bulk-actions
                            :trashUrl="route('adm.user-bulk-trash')"
                        />
                        <a href="{{route('adm.user-trashed')}}" class="btn btn-danger mx-1">
                            <i class="fa fa-trash-o"></i>
                            {{__('adm.trashed')}} {{$trashedCount}}
                        </a>

                    </div>
                    <div>
                        <x-adm.form.filter-search/>
                    </div>
                </div>
                <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive-sm">
                            <table class="table table-border-vertical">
                                <thead class="table-success">
                                <tr>
                                    <th class="id-column">
                                        <x-adm.table.checkbox-all/>
                                    </th>
                                    <th class="adm-sortable id-column" data-name="id">
                                        ID
                                    </th>
                                    <th class="adm-sortable" data-name="name">
                                        {{__('adm.name')}}
                                    </th>
                                    <th class="adm-sortable" data-name="email">
                                        {{__('adm.email')}}
                                    </th>
                                    <th class="adm-sortable" data-name="created_at">
                                        {{__('adm.created_at')}}
                                    </th>
                                    <th class="text-end action-column">
                                        {{__('adm.actions')}}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <th scope="row">
                                                <x-adm.table.checkbox-item :id="$item->id"/>
                                            </th>
                                            <td>{{$item->id}}</td>
                                            <td>
                                                <a href="{{route('adm.profile', $item->id)}}">{{$item->name}}</a>
                                            </td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td class="text-end">
                                                <x-adm.button.table-actions
                                                    :editUrl="route('adm.user-edit', $item->id)"
                                                    :trashUrl="route('adm.user-trash', $item->id)"
                                                />
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="my-3 text-end">
                            @if(method_exists($items, 'links'))
                                {!! $items->appends(Request::except('page'))->render() !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

@endsection