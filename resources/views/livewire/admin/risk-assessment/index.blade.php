<div>
    <x-notification />
    <div class="flex flex-col sm:flex-row sm:justify-between ">
        <div> @livewire('admin.risk-assessment.create-and-update') </div>
        <div>
            <x-inputsearch name='search' wire:model.live='search' />
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="table table-zebra table-xs">
            <!-- head -->
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Name</th>
                    <th>Notes</th>
                    <th>Action Days</th>
                    <th>Coordinator</th>
                    <th>Reporting Obligation</th>
                    <th>Colour</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @forelse ($Risk_ass as $no => $risk)
                    <tr >
                        <th>{{ $Risk_ass->firstItem() + $no }}</th>
                        <td class="text-center p-0 text-xs font-semibold">{{ $risk->risk_assessments_name }}</td>
                        <td class="text-justify w-80  px-4">{{ $risk->notes }}</td>
                        <td class="text-center  px-4">{{ $risk->action_days }}</td>
                        <td class="text-center  px-4">{{ $risk->coordinator }}</td>
                        <td class="text-center  px-4">{{ $risk->reporting_obligation }}</td>
                        <td class="text-center  px-4 {{ $risk->colour }}">{{ $risk->colour }}</td>
                        <td>
                            <div class="flex flex-row gap-1">
                                <label class="btn btn-xs btn-square btn-warning tooltip tooltip-top tooltip-warning"
                                    wire:click="updateData({{ $risk->id }})" data-tip="Update">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                        <path
                                            d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                    </svg>


                                </label>
                                <label class="btn btn-xs btn-square btn-error tooltip tooltip-top tooltip-error"
                                    wire:click="delete({{ $risk->id }})"
                                    wire:confirm.prompt="Are you sure delete {{ $risk->risk_assessments_name }}?\n\nType DELETE to confirm|DELETE"
                                    data-tip="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6">
                                        <path fill-rule="evenodd"
                                            d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                </label>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <th colspan="8" class="text-error">data not found!!! </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div>{{ $Risk_ass->links() }}</div>
    </div>
</div>

