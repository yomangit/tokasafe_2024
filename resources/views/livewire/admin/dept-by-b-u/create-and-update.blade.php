<div>
    <label wire:click="openModal" class="btn btn-square btn-xs btn-outline btn-info tooltip tooltip-right tooltip-info"
        data-tip="Add Data">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd"
                d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                clip-rule="evenodd" />
        </svg>


    </label>

    <dialog class="{{ $modal }}">
        <div class="modal-box">
            <div
                class="py-4 font-extrabold text-transparent divider divider-info bg-clip-text bg-gradient-to-r from-pink-500 to-violet-500">
                {{ $divider }}</div>
            <form wire:submit.prevent='store'>
                @csrf
                @method('PATCH')
                <div class="w-full max-w-xs sm:max-w-sm xl:max-w-xl form-control">
                    <x-label-req :value="__('Business Unit')" />
                    <x-select wire:model='busines_unit_id' :error="$errors->get('busines_unit_id')">
                        <option value="" selected>Select an option</option>
                        @foreach ($BusinesUnit as $bu)
                            <option value="{{ $bu->id }}">
                                {{ $bu->Company->name_company }}</option>
                        @endforeach
                    </x-select>
                    <x-label-error :messages="$errors->get('busines_unit_id')" />
                </div>
                <div class="w-full max-w-xs sm:max-w-sm xl:max-w-xl form-control">
                    <x-label-req :value="__('Department')" />
                    <x-select wire:model='department_id' :error="$errors->get('department_id')">
                        <option value="" selected>Select an option</option>
                        @foreach ($Department as $dept)
                            <option value="{{ $dept->id }}">
                                {{ $dept->department_name }}</option>
                        @endforeach
                    </x-select>
                    <x-label-error :messages="$errors->get('department_id')" class="mt-0" />
                </div>
                <div>

                </div>
                <div class="modal-action">
                    <button type="submit" class="btn btn-xs btn-success btn-outline">Save</button>
                    <label wire:click='closeModal' class="btn btn-xs btn-error btn-outline">Close</label>
                </div>
            </form>
        </div>
    </dialog>
</div>
