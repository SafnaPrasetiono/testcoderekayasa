<?php

namespace App\Http\Livewire\Tasking;

use App\Models\tasking;
use Livewire\Component;

class ProgresTasking extends Component
{
    public $tasking_id;
    public $tasking, $status;

    protected $listeners = [
        'deleteAction' => 'delete',
    ];

    public function edit($id)
    {
        $this->tasking_id = $id;
        $items = tasking::find($this->tasking_id);
        $this->tasking = $items->tasking;
        $this->status = $items->status;
        $this->dispatchBrowserEvent('ShowEdit');
    }
    public function update()
    {
        $update = tasking::find($this->tasking_id);
        $update->tasking = $this->tasking;
        $update->status = $this->status;
        if ($update->save()) {
            session()->flash('success', 'Data telah terupdate');
        } else {
            session()->flash('error', 'Maff, data tidak dapat ditambahkan ulangi nanti');
        }
    }

    public function prepareDelete($id)
    {
        $this->tasking_id = $id;
        $this->dispatchBrowserEvent('deleteConfrim');
    }
    public function delete()
    {
        $dataToDelete = tasking::find($this->tasking_id);
        if ($dataToDelete->delete()) {
            session()->flash('success', 'Data telah berhasil dihapus!');
        } else {
            session()->flash('error', 'Oops data tidak ditemukan!');
        }
    }

    public function render()
    {
        $data = tasking::where('status', 'progres')->get();
        return view('livewire.tasking.progres-tasking', [
            'datatasking' => $data
        ]);
    }
}
