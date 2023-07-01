<?php

namespace App\Http\Livewire\Tasking;

use App\Models\tasking;
use Livewire\Component;

class InputTasking extends Component
{
    public $taskingname, $date;

    protected $rules = [
        'taskingname' => 'required',
        'date' => 'required',
    ];

    protected $messages = [
        'taskingname.required' => 'Please input the task label!',
        'date.required' => 'Please input the date tasking!',
    ];

    public function resetInput()
    {
        $this->taskingname = null;
        $this->date = null;
    }

    public function store()
    {
        $this->validate();

        $store = new tasking();
        $store->tasking = $this->taskingname;
        $store->date    = $this->date;
        $store->status  = "open";
        if ($store->save()) {
            session()->flash('success', 'Data telah ditambahkan');
        } else {
            session()->flash('error', 'Maff, data tidak dapat ditambahkan ulangi nanti');
        }

        $this->resetInput();

    }

    public function render()
    {
        return view('livewire.tasking.input-tasking');
    }
}
