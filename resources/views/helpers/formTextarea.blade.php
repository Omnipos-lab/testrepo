@php
/*
$name
$label
$value
$required
$rows
$cols
$labelClass
$elementClass
$readonly
*/

$value = $value ?? '';
$description = $description ?? '';
$required = $required ?? false;
$rows = $rows ?? 3;
$cols = $cols ?? 45;
$labelClass = $labelClass ?? 'col-md-4';
$elementClass = $elementClass ?? 'col-md-6';
$readonly = $readonly ?? false;

@endphp

<div class="form-group row">
    <label for="iso2" class="{{ $labelClass }} col-form-label text-md-right">{!! __($label) . ($required ? ' <span class="required-input-marker">*</span>' : '') !!}</label>

    <div class="{{ $elementClass }}">
        <textarea id="{{ $name }}" type="text" class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}" 
        	name="{{ $name }}" cols="{{ $cols }}" rows="{{ $rows }}"
        	{{ $required ? 'required' : '' }} 
        	{{ $readonly ? 'readonly' : '' }} >{{ strlen(old($name)) ? old($name) : ($value ?? '') }}</textarea>
        	
        @if (strlen($description))
        	<div class="form-control-description">
        		{{ $description }}
        	</div>
        @endif

        @if ($errors->has($name))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
</div>
