@props(['value', 'name'])
<select
    {{ $attributes->class([
        'select select-bordered select-xs w-full   px-3 bg-transparant border shadow-sm border-slate-300 placeholder-slate-400
                                    focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full  sm:text-sm font-semibold focus:ring-1  ',
    ]) }}>
    {{ $slot }}

</select>
