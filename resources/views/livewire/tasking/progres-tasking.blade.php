<div>
    <div class="overflow-hidden mb-3 rounded-xl border border-yellow-500">
        <div class="flex bg-yellow-500 text-white py-3 px-4">
            <h3>OPEN</h3>
            <small class="ms-auto rounded-md px-2 py-1 bg-white text-black">4 Task</small>
        </div>
        <div class="py-3 px-4 z-10">
            @foreach ($datatasking as $item)
                <div class="flex align-center justify-between mb-2">
                    <div class="leading-5">
                        <p class="font-bold mb-0 lh-1">{{ $item->tasking }}</p>
                        <small>Due Date: {{ $item->date }}</small>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="hover:text-blue-500 px-3 py-1">
                            <i class="fas fa-ellipsis-v-alt"></i>
                        </button>
                        <div
                            class="dropdown-menu hidden bg-white absolute flex-row mt-[-100px] ms-[-90px] w-[140px] shadow-xl rounded-xl z-50 p-3">
                            <button type="button" wire:click="edit({{ $item->tasking_id }})"
                                class="w-full text-start hover:text-blue-500 py-0.5"><i
                                    class="fas fa-pencil fs-sm w-8"></i>Edit</button>
                            <button type="button" wire:click="prepareDelete({{ $item->tasking_id }})"
                                class="w-full text-start hover:text-rose-500 py-0.5"><i
                                    class="fas fa-trash-alt fa-sm w-8"></i>Delete</button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div wire:ignore.self
            class="modal hidden transition ease-in-out fixed bg-white rounded-xl overflow-hidden border border-gray-200 shadow-xl w-[90%] md:w-[540px] top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] z-[999]"
            style="animation: fadeIn 5s;">
            <div class="modal-head bg-gray-100 px-4 py-3">
                <p class="font-bold">Edit Tasking</p>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label for="tasking" class="block w-full mb-1">Tasking</label>
                    <input type="text" id="tasking" name="tasking" wire:model="tasking"
                        class="block box-border w-full px-3 py-1 rounded-md border border-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none @error('tasking') border-rose-500 @else border-gray-400 @enderror"
                        placeholder="Input your tasking" value="{{ old('tasking') }}">
                    @error('tasking')
                        <div class="text-rose-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="block w-full mb-1">status</label>
                    <select id="status" name="status" wire:model="status"
                        class="block box-border w-full px-3 py-1 rounded-md border border-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none @error('status') border-rose-500 @else border-gray-400 @enderror">
                        <option value="open" @if ($status == 'open') selected @endif>Open</option>
                        <option value="progres" @if ($status == 'progres') selected @endif>Progres</option>
                        <option value="done" @if ($status == 'done') selected @endif>Done</option>
                        <option value="cancle" @if ($status == 'cancle') selected @endif>Cancle</option>
                    </select>
                    @error('status')
                        <div class="text-rose-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="modal footer flex justify-end px-4 pb-3">
                <button type="button" wire:click.prevent="update()"
                    class="flex items-center justify-center bg-yellow-500 hover:bg-yellow-400 rounded-lg text-white w-32 ms-3 py-2">Update</button>
                <button type="button"
                    class="btn-modal-close flex items-center justify-center bg-gray-500 hover:bg-gray-400 rounded-lg text-white w-32 ms-3 py-2">Cancle</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('./dist/js/jquery.js') }}"></script>
    <script>
        $('.btn-modal-close').click(function() {
            $('.modal').removeClass('block');
            $('.modal').addClass('hidden');
        })
        document.addEventListener('deleteConfrim', function() {
            Swal.fire({
                    title: "Delete!",
                    text: "Are you sure to delete this Task!!!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete!',
                    cancelButtonText: 'No Cancle',
                })
                .then((next) => {
                    if (next.isConfirmed) {
                        Livewire.emit('deleteAction');
                    }
                });
        })
        document.addEventListener('ShowEdit', function() {
            $('.modal').removeClass('hidden');
            $('.modal').addClass('block');
        })
        document.addEventListener('UpdateComplate', function() {
            $('.modal').removeClass('block');
            $('.modal').addClass('hidden');
        })
    </script>


    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Good Jobs!',
                text: '{{ session()->get('success') }}',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @elseif(session()->has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Opps...!',
                text: '{{ session()->get('error') }}',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @endif

</div>
