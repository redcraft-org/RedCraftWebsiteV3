<ol>
@foreach($rules as $key => $rule)
    @if(is_array($rule))

        <li>{{ $key }}</li>
        @include('components/rules/recursive-rule', ['rules' => $rule])

    @else

        @if($key == "note")
            <div class="text-secondary">Note : {{ $rule }}</div>
        @else
            <li>{{ $rule }}</li>
        @endif

    @endif
@endforeach
</ol>
