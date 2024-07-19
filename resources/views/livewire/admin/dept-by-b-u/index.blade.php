<div>
    <x-notification />

    <div class="flex flex-col sm:flex-row sm:justify-between ">
        <div> @livewire('admin.dept-by-b-u.create-and-update') </div>
        <div>
            {{-- <div class="flex flex-col sm:flex-row">

                <x-inputsearch name='search' wire:model.live='search_group' />
                <x-select-search wire:model.live='search_dept'>
                    <option class="opacity-40" value="" selected>Select All</option>
                    @foreach ($Department as $dept)
                        <option value="{{ $dept->department_name }}">
                            {{ $dept->department_name }}
                        </option>
                    @endforeach
                </x-select-search>
            </div> --}}
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="table table-zebra table-xs">
            <!-- head -->
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th class="font-extrabold">Busines Unit</th>
                    <th class="font-extrabold">Department</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @forelse ($BusinesUnit as $no => $bu)
                    <tr>
                        <th class="text-center">{{ $BusinesUnit->firstItem() + $no }}</th>
                        <td class="text-center font-bold">{{ $bu->Company->name_company }}</td>
                        <td class="w-96 ">

                            @forelse ($bu->Department()->get() as $dept)
                                <div class="grid grid-cols-2 items-center hover:bg-slate-300">

                                    <div class="  font-semibold m-1">
                                        {{ $dept->department_name }}
                                    </div>
                                    <div class="m-1">
                                        <label class="btn btn-xs btn-square btn-warning"
                                            wire:click="editDeptByBU({{ $bu->id }}, {{ $dept->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                fill="currentColor" class="size-4">
                                                <path
                                                    d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z" />
                                                <path
                                                    d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z" />
                                            </svg>
                                        </label>
                                        <label class="btn btn-xs btn-square btn-error"
                                            wire:confirm.prompt="Are you sure delete {{ $dept->department_name }}?\n\nType DELETE to confirm|DELETE"
                                            wire:click="deleteDeptByBU({{ $bu->id }}, {{ $dept->id }})">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd"
                                                    d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                        </label>

                                    </div>
                                </div>
                                @empty
                                <div class="text-center bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500 font-semibold">No Subcontractors</div>
                            @endforelse
                        </td>

                    </tr>
                @empty
                    <tr class="text-center">
                        <th colspan="4" class="text-error">data not found!!! </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div>{{ $BusinesUnit->links() }}</div>
    </div>

</div>
