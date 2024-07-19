<div class="sticky top-0 z-10 flex flex-col ">
    <div class="navbar bg-base-400 text-neutral-content ">
        <div class="navbar-start">


            <label for="my-drawer" class="btn btn-square btn-ghost btn-xs">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd"
                        d="M2 2.75A.75.75 0 0 1 2.75 2h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 2.75Zm0 10.5a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75ZM2 6.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 6.25Zm0 3.5A.75.75 0 0 1 2.75 9h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 9.75Z"
                        clip-rule="evenodd" />
                </svg>

            </label>
        </div>
        <div class="hidden navbar-center lg:flex">
            <ul class=" menu menu-xs menu-horizontal">
                <li><a
                        href="{{ route('dashboard') }}"class="{{ Request::is('/') ? 'text-primary-muted font-semibold' : '' }}">Dashboard</a>
                </li>
                <li>
                    <details>
                        <summary>Parent</summary>
                        <ul class="p-1 w-28 bg-neutral menu-xs">
                            <li><a>Submenu 1</a></li>
                            <li><a>Submenu 2</a></li>
                        </ul>
                    </details>
                </li>
                <li>
                    <details>
                        <summary class="{{ Request::is('admin*') ? ' text-primary-muted font-semibold' : '' }}">
                            Administrator</summary>
                        <ul class="p-1 w-52 bg-neutral menu menu-xs">


                            <li>
                                <details open>
                                    <summary
                                        class="{{ Request::is('admin/parent/*') ? ' text-primary-muted font-semibold' : '' }}">
                                        Parent</summary>
                                    <ul>
                                        <li><a
                                                href="{{ route('categoryCompany') }}"class="{{ Request::is('admin/parent/companyCategory*') ? 'active text-emerald-500 font-semibold' : '' }}">{{ __('Company Category') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('company') }}"class="{{ Request::is('admin/parent/company') ? 'active text-emerald-500 font-semibold' : '' }}">{{ __('Company ') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('businnesUnit') }}"class="{{ Request::is('admin/parent/businnesUnit*') ? 'active text-emerald-500 font-semibold' : '' }}">{{ __('Business Unit ') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('department') }}"class="{{ Request::is('admin/parent/department') ? 'active text-emerald-500 font-semibold' : '' }}">{{ __('Department ') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('deptGroup') }}"class="{{ Request::is('admin/parent/deptGroup') ? 'active text-emerald-500 font-semibold' : '' }}">{{ __('Dept Group ') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('subContDept') }}"class="{{ Request::is('admin/parent/subContDept') ? 'active text-emerald-500 font-semibold' : '' }}">{{ __('Sub-Cont Department') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('DeptByBU') }}"class="{{ Request::is('admin/parent/DeptByBU') ? 'active text-emerald-500 font-semibold' : '' }}">{{ __('Dept Under Business Unit') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('JobClass') }}"class="{{ Request::is('admin/parent/JobClass') ? 'active text-emerald-500 font-semibold' : '' }}">{{ __('Job Class') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('workgroup') }}"class="{{ Request::is('admin/parent/workgroup') ? 'active text-emerald-500 font-semibold' : '' }}">{{ __('Workgroup') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('statusEvent') }}"class="{{ Request::is('admin/parent/statusEvent') ? 'active text-emerald-500 font-semibold' : '' }}">{{ __('Status Event') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('riskConsequence') }}"class="{{ Request::is('admin/parent/riskConsequence') ? 'active text-emerald-500 font-semibold' : '' }}">{{ __('Risk Consequence') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('riskAssessment') }}"class="{{ Request::is('admin/parent/riskAssessment') ? 'active text-emerald-500 font-semibold' : '' }}">{{ __('Risk Assessment') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('riskLikelihood') }}"class="{{ Request::is('admin/parent/riskLikelihood') ? 'active text-emerald-500 font-semibold' : '' }}">{{ __('Risk Likelihood') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('tableRiskAssessment') }}"class="{{ Request::is('admin/parent/tableRiskAssessment') ? 'active text-emerald-500 font-semibold' : '' }}">{{ __('Table Risk') }}</a>
                                        </li>
                                    </ul>
                                </details>
                            </li>
                            <li><a>Submenu 1</a></li>
                            <li><a>Submenu 2</a></li>
                        </ul>
                    </details>
                </li>

            </ul>
        </div>
        <div class="navbar-end">
            <button class="btn btn-ghost btn-xs btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd"
                        d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                        clip-rule="evenodd" />
                </svg>

            </button>
            <button class="btn btn-ghost btn-xs btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd"
                            d="M12 5a4 4 0 0 0-8 0v2.379a1.5 1.5 0 0 1-.44 1.06L2.294 9.707a1 1 0 0 0-.293.707V11a1 1 0 0 0 1 1h2a3 3 0 1 0 6 0h2a1 1 0 0 0 1-1v-.586a1 1 0 0 0-.293-.707L12.44 8.44A1.5 1.5 0 0 1 12 7.38V5Zm-5.5 7a1.5 1.5 0 0 0 3 0h-3Z"
                            clip-rule="evenodd" />
                    </svg>

                    <span class="badge badge-xs badge-primary indicator-item"></span>
                </div>
            </button>
        </div>
    </div>
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="px-3 mx-auto  sm:px-5 lg:px-7">
                <h1 class="text-sm font-bold tracking-tight text-gray-900">{{ $header }}
                </h1>
            </div>
        </header>
</div>
@endif
