@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control block mt-1 rounded-12px border border-danger shadow-sm inputs']) !!} keyboardCapitalization="none"> 