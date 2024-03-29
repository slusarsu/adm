@extends('adm.layouts.app')

@section('content')
    <x-adm.breadcrumb>
        <x-slot name="breadcrumb_title">
            {{__('adm.languages')}}
        </x-slot>
        <li class="breadcrumb-item">{{__('adm.languages')}}</li>
    </x-adm.breadcrumb>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header pb-0">

            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <div class="d-flex">
                        <x-adm.button.create :url="route('adm.language-create')"/>
                        <x-adm.button.bulk-actions
                            :trashUrl="route('adm.language-bulk-trash')"
                        />
                        <a href="{{route('adm.language-trashed')}}" class="btn btn-danger mx-1">
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
                                    <th class="adm-sortable" data-name="code">
                                        {{__('adm.code')}}
                                    </th>
                                    <th class="adm-sortable" data-name="name">
                                        {{__('adm.name')}}
                                    </th>
                                    <th class="adm-sortable" data-name="native_name">
                                        {{__('adm.native_name')}}
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
                                                    :editUrl="route('adm.language-edit', $item->id)"
                                                    :trashUrl="route('adm.language-trash', $item->id)"
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