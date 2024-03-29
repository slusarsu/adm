@extends('adm.layouts.app')

@section('content')
    <x-adm.breadcrumb>
        <x-slot name="breadcrumb_title">
            {{__('adm.trashed')}}
        </x-slot>
        <li class="breadcrumb-item">
            <a href="{{route('adm.menu')}}">{{__('adm.menus')}}</a>
        </li>
    </x-adm.breadcrumb>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header pb-0">

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <div class="d-flex">
                        <x-adm.button.btn-link
                            :url="route('adm.menu')"
                            :translateText="'adm.menus'"
                            :iconClass="'fa fa-mail-reply'"
                        />
                        <x-adm.button.bulk-actions
                            :restoreUrl="route('adm.menu-bulk-restore')"
                            :removeUrl="route('adm.menu-bulk-remove')"
                        />
                    </div>
                    <div>
                        <x-adm.form.filter-search/>
                    </div>
                </div>
                <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive-sm">
                            <table class="table table-border-vertical">
                                <thead class="table-danger">
                                <tr>
                                    <th class="id-column">
                                        <x-adm.table.checkbox-all/>
                                    </th>
                                    <th class="adm-sortable id-column" data-name="id">
                                        ID
                                    </th>
                                    <th class="adm-sortable" data-name="code">
                                        {{__('adm.language')}}
                                    </th>
                                    <th class="adm-sortable" data-name="name">
                                        {{__('adm.name')}}
                                    </th>
                                    <th class="adm-sortable" data-name="native_name">
                                        {{__('adm.enabled')}}
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
                                            <td>{{$item->code}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->native_name}}</td>
                                            <td class="text-end">
                                                <x-adm.button.table-actions
                                                    :restoreUrl="route('adm.menu-restore', $item->id)"
                                                    :removeUrl="route('adm.menu-remove', $item->id)"
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

    <x-adm.modal.sure :title="'adm.remove_selected_item'"/>

@endsection