<div>
    @includeIf('adm.partials.alerts')
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="mb-3">
                <select class="form-select digits" id="custom-field-types" wire:model="selectedFieldType">
                    @foreach($fieldTypes as $fieldType)
                        <option value="{{$fieldType}}">{{$fieldType}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="mb-3">
                <button class="btn btn-light btn-sm" type="button" wire:click="addFieldToGroup">
                    <i class="fa fa-plus-circle"></i>
                    {{__('adm.add')}}
                </button>

                <button class="btn btn-primary btn-sm" type="button" wire:click="saveFieldGroup">
                    <i class="fa fa-check-circle-o"></i>
                    {{__('adm.save')}}
                </button>

            </div>
        </div>
    </div>

    <div class="default-according" id="accordionclose">

        @foreach($fieldGroup as $key => $field)

            <div class="card">

            <div class="card-header d-flex justify-content-between id="{{$field['id']}}"
                style="@if(!$field['label'] || !$field['key']) background: #f1e7e8 @endif"
            >
                <div>
                    <h5 class="mb-0">
                        <button class="btn btn-link"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapse-{{$field['id']}}"
                                aria-expanded="true"
                                aria-controls="{{$field['id']}}"
                        >
                            <span class="text-secondary">{{__('adm.type')}}: </span> {{$field['type']}} /
                            <span class="text-secondary">{{__('adm.label')}}: </span> {{$field['label']}} /
                            <span class="text-secondary">{{__('adm.key')}}: </span> {{$field['key']}}
                        </button>
                    </h5>
                </div>

                <div>
                    <button type="button" class="btn-close" wire:click="removeFromGroup({{$key}})"></button>
                </div>
            </div>

            <div class="collapse show"
                 id="collapse-{{$field['id']}}"
                 aria-labelledby="{{$field['id']}}"
                 data-bs-parent="#accordionclose" style=""
            >
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="mb-3">
                                <label for="label-{{$key}}">{{__('adm.label')}}</label>
                                <input type="text" name="label" class="form-control form-control-sm" id="label-{{$key}}" wire:model="fieldGroup.{{$key}}.label">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <div class="mb-3">
                                <label for="key-{{$key}}">{{__('adm.key')}}</label>
                                <input type="text" name="key" class="form-control form-control-sm" id="key-{{$key}}" wire:model="fieldGroup.{{$key}}.key">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-2">
                            <div class="mb-5">
                                <label for="key-{{$key}}">{{__('adm.position')}}</label>
                                <input type="number" name="position" class="form-control form-control-sm" id="position-{{$key}}" wire:model="fieldGroup.{{$key}}.position" min="0">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-2">
                            <div class="mb-sm-3 mt-md-4 p-md-2">
                                <div class="checkbox checkbox-dark m-squar">
                                    <input type="checkbox" id="required-field-{{$key}}" wire:model="fieldGroup.{{$key}}.required">
                                    <label class="mt-0" for="required-field-{{$key}}">{{__('adm.required')}}</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="key-{{$key}}">{{__('adm.default')}}</label>

                                @if($field['type'] == 'text' || $field['type'] == 'number' || $field['type'] == 'password' || $field['type'] == 'url' || $field['type'] == 'tel' || $field['type'] == 'email')
                                    <input type="{{$field['type']}}" name="default" class="form-control form-control-sm" id="key-{{$key}}" wire:model="fieldGroup.{{$key}}.data">
                                @endif

                                @if($field['type'] == 'link')
                                    <input type="" name="default" class="form-control form-control-sm" id="key-{{$key}}" wire:model="fieldGroup.{{$key}}.data">
                                @endif

                                @if($field['type'] == 'datetime-local' || $field['type'] == 'time' || $field['type'] == 'date')
                                    <input type="{{$field['type']}}" name="default" class="form-control form-control-sm" id="key-{{$key}}" wire:model="fieldGroup.{{$key}}.data">
                                @endif
                                @if($field['type'] == 'img')
                                    <div class="avatar text-center mb-3">
                                        <img class="b-r-8" src="" id="key-{{$key}}_img" alt="#" width="200">
                                    </div>
                                    <div class="input-group mb-1">
                                        <input class="form-control" type="text" placeholder="select image" aria-label="" id="key-{{$key}}" name="image">
                                        <span class="input-group-text popup_selector btn btn-primary" data-inputid="key-{{$key}}">{{__('adm.select_file')}}</span>
                                    </div>
                                @endif

                                @if($field['type'] == 'textarea')
                                    <textarea name="data" class="form-control form-control-sm" id="data-{{$key}}" wire:model="fieldGroup.{{$key}}.data" cols="30" rows="5"></textarea>
                                @endif

                                @if($field['type'] == 'select' || $field['type'] == 'multi_select')
                                    <textarea name="data" class="form-control form-control-sm" id="data-{{$key}}" wire:model="fieldGroup.{{$key}}.data" cols="30" rows="5"></textarea>
                                    <small>
                                        add options separated by commas. <br/>
                                        value|label,<br/>
                                        value|label|selected,<br/>
                                    </small>
                                @endif

                                @if($field['type'] == 'checkbox' || $field['type'] == 'radio')
                                    <textarea name="data" class="form-control form-control-sm" id="data-{{$key}}" wire:model="fieldGroup.{{$key}}.data" cols="30" rows="5"></textarea>
                                    <small>
                                        add options separated by commas. <br/>
                                        value|label,<br/>
                                        value|label|checked,<br/>
                                    </small>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
