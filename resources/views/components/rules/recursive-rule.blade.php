<ol>
@foreach($rules as $key => $rule)
    @if(is_array($rule))

        {{-- Display rules "key" title --}}
        @php
            $h_level = "h" . (min($level, 2) + 3);
        @endphp
        {{-- If the rule has sub-rules and is not inside more than 2 ol, we show it as a title --}}
        @if (count($rule) > 0 and $level < 3)
            <{{ $h_level }}><li>{{ $key }}</li></{{ $h_level }}>
        @else
            <li>{{ $key }}</li>
        @endif

        {{-- Recursive call for child rules --}}
        @include('components/rules/recursive-rule', ['rules' => $rule, 'level' => $level + 1])

    @else

        @if($key == "note")
            <div class="text-secondary">@lang('rules.rules.note'){{ $rule }}</div>
        @else
            <li>{{ $rule }}</li>
        @endif

    @endif
@endforeach
</ol>
