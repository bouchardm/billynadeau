<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}">
    <label for="{{ $field }}" class="col-md-4 control-label">{{ trans("fields.{$field}") }}</label>

    <div class="col-md-6">
        <input
                id="{{ $field }}"
                type="text"
                class="form-control"
                name="{{ $field }}"
                value="{{ isset($value) ? $value : old($field) }}"
                autofocus
        >

        @if ($errors->has($field))
            <span class="help-block">
                <strong>{{ $errors->first($field) }}</strong>
            </span>
        @endif
    </div>
</div>