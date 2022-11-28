<?php

namespace App\Http\Livewire\Adm;

use App\Models\ContentType;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Support\Collection;

class CustomFields extends Component
{
    public mixed $fieldTypes;
    public string $selectedFieldType = 'text';
    public $fieldGroup;
    public string $urlId = '';
    public string $pageModel = '';

    public function mount()
    {
        $this->fieldTypes = config('adm.custom_fields');

        $this->fieldGroup = collect([]);

        $this->urlId = collect(request()->segments())->last();

        $this->pageModel = request()->segment(2);

        $this->getContentTypeFields();
    }

    public function addFieldToGroup()
    {
        $this->fieldGroup[] = [
            'id' => Str::random(5),
            'type' => $this->selectedFieldType,
            'label' => '',
            'key' => '',
            'required' => 0,
            'position' => 0,
            'data' => '',
        ];

        $this->selectedFieldType = 'text';
    }

    public function saveFieldGroup()
    {
        if($this->pageModel == 'content-type') {
            $this->saveFieldsToContentType();
        }
    }

    public function validateFieldGroup()
    {
        foreach ($this->fieldGroup as $key => $field) {

            if(!$field['label']) {
                session()->flash('error', 'You have empty label for type: "' . $field['type'] . '"');
                return false;
            }

            if(!$field['key']) {
                session()->flash('error', 'You have empty key for type: "' . $field['key'] . '"');
                return false;
            }

            if ($this->fieldGroup->where('label', $field['label'])->count() > 1) {
                session()->flash('error', 'You have duplicate label "' . $field['label'] . '"');
                return false;
            }

            if ($this->fieldGroup->where('key', $field['key'])->count() > 1) {
                session()->flash('error', 'You have duplicate key "' . $field['key'] . '"');
                return false;
            }
        }

        return true;
    }


    public function saveFieldsToContentType()
    {
        $sorted = $this->fieldGroup->sortBy('position');
        $fields = $sorted->values()->all();

        if($this->validateFieldGroup()) {

            ContentType::query()->where('id', $this->urlId)->update([
                'fields' => $fields,
            ]);

            session()->flash('success', trans('adm.updated_successfully'));

            return true;
        }
    }

    public function getContentTypeFields()
    {
        $contentType = ContentType::query()->where('id', $this->urlId)->first();
        $this->fieldGroup = collect($contentType->fields);
    }

    public function removeFromGroup($id)
    {
        unset($this->fieldGroup[$id]);
    }
    
    public function render()
    {
        return view('livewire.adm.custom-fields');
    }
}
