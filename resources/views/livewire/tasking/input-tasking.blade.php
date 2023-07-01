<div>
    <div class="mb-3">
        <div class="mb-3">
            <label for="tasking" class="block w-full mb-1">Tasking</label>
            <input type="text" id="tasking" name="tasking" wire:model="taskingname"
                class="block box-border w-full px-3 py-1 rounded-md border border-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none @error('tasking') border-rose-500 @else border-gray-400 @enderror"
                placeholder="Input your tasking" value="{{ old('taskingname') }}">
            @error('taskingname')
                <div class="text-rose-500">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="" class="block w-full mb-1">Due Date</label>
            <div class="flex items-stretch gx-2">
                <input type="date" name="date" id="dates" wire:model="date"
                    class="block box-border w-full px-3 py-1 rounded-md border border-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none @error('tasking') border-rose-500 @else border-gray-400 @enderror">
                <button type="button" wire:click="store()"
                    class="flex items-center justify-center bg-blue-600 hover:bg-blue-500 rounded-lg text-white w-32 ms-3">Add</button>
            </div>
            @error('date')
                <div class="text-rose-500">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

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
