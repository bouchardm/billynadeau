<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}">
    <label for="{{ $field }}" class="col-md-4 control-label">{{ trans("fields.{$field}") }}</label>

    <div class="col-md-6">
        <select name="{{ $field }}" class="form-control">
            <option value=""></option>
            @foreach($options as $option)
                <option
                    value="{{ $option->id }}"
                    {{ isset($value) && $value == $option->id ? 'selected' : '' }}
                >
                    {{ $option->title() }}
                </option>
            @endforeach
        </select>

        @if ($errors->has($field))
            <span class="help-block">
                <strong>{{ $errors->first($field) }}</strong>
            </span>
        @endif
    </div>
</div>