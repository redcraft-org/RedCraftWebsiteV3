<ol>
    @foreach ($rules as $key => $rule)
        @if ($key == 'table')
            <div class="table-wrapper">
                <table class="w-full overflow-x-auto rounded shadow bg-base-200 text-base-content border-base-200">
                    <thead>
                        <tr>
                            @foreach ($rule['headers'] as $header)
                                <th class="px-4 py-2 w-1/2 min-w-[10rem] font-semibold text-center align-middle border-b border-base-200 bg-base-300 {{ $loop->last ? '' : 'border-r' }}">
                                    {{ $header }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($rule['columns'][0]); $i++)
                            <tr class="bg-base-100">
                                @foreach ($rule['columns'] as $column)
                                    <td class="px-4 py-2 min-w-[10rem] text-center align-middle border-t border-base-200 {{ $loop->last ? '' : 'border-r' }}">
                                        {{ $column[$i] }}
                                    </td>
                                @endforeach
                            </tr>
                        @endfor
                    </tbody>
                </table>



            </div>
        @elseif (is_array($rule))
            {{-- Display rules "key" title --}}
            @php
                $h_level = 'h' . (min($level, 2) + 3);
            @endphp
            {{-- If the rule has sub-rules and is not inside more than 2 ol, we show it as a title --}}
            @if (count($rule) > 0 and $level < 3)
                <{{ $h_level }}>
                    <li>{{ $key }}</li>
                    </{{ $h_level }}>
                @else
                    <li>{{ $key }}</li>
            @endif

            {{--  @dump('Recursive ' . $key)  --}}
            {{-- Recursive call for child rules --}}
            @include('components/rules/recursive-rule', ['rules' => $rule, 'level' => $level + 1])
        @else
            {{--  @dump('Not recursive ' . $key)  --}}
            @if ($key == 'note')
                <div class="text-secondary">@lang('rules.rules.note'){{ $rule }}</div>
            @else
                <li>{{ $rule }}</li>
            @endif
        @endif
    @endforeach
</ol>
