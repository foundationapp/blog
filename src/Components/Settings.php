<?php

namespace Foundationapp\Blog\Components;

use Foundationapp\Blog\Models\Setting;

use Livewire\Component;

class Settings extends Component
{
    public $settings;

    public $rules = [
        'settings.*.id' => 'required',
        'settings.*.key' => 'required',
        'settings.*.value' => 'required',
    ];

    public function mount()
    {
        $this->refresh();
    }

    public function refresh()
    {
        $this->settings = Setting::orderBy('id', 'DESC')->get();
    }

    public function updated($field, $value)
    {
        $index = explode('.', $field)[1] ?? null;
        if (isset($index)) {
            $this->settings[$index]->save();
            $this->dispatchBrowserEvent('notification-show', [
                'type' => 'success',
                'message' => 'Successfully saved your setting.'
            ]);
        }
    }

    public function newSetting()
    {
        $setting = new Setting;
        $setting->key = $this->getUniqueKey();
        $setting->save();
        $this->refresh();
    }

    public function getUniqueKey()
    {
        $name = 'key-name';
        $original_name = $name;
        $counter = 1;
        while (Setting::where('key', $name)->exists()) {
            $name = $original_name . '-' . $counter;
            $counter++;
        }
        return $name;
    }

    public function delete($index)
    {
        $this->settings[$index]->delete();
        $this->refresh();
        $this->dispatchBrowserEvent('notification-show', [
            'type' => 'success',
            'message' => 'Successfully deleted setting.'
        ]);
    }

    public function render()
    {
        $view = view('blog::livewire.settings');

        $view->extends('layouts.app');

        return $view;
    }
}
