
<!-- Add Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="modal-1">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add Employee</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-start">
            <p class="text-start">Input details of employee</p>
            <form method="post" action="{{ route('saveEmployee') }}" accept-charset="utf-8" id="addEmployee" enctype="multipart/form-data">
            @csrf
            @foreach($fields as $field)
                <div class="form-group">
                <label>{{ $field['label'] }}:</label>
                @if($field['type'] == 'select')
                    <select name="{{ $field['name'] }}" @if(isset($field['required'])) required @endif>
                    @foreach($field['options'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                    </select>
                @else
                    <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" @if(isset($field['required'])) required @endif @if(isset($field['minlength'])) minlength="{{ $field['minlength'] }}" @endif @if(isset($field['maxlength'])) maxlength="{{ $field['maxlength'] }}" @endif @if(isset($field['min'])) min="{{ $field['min'] }}" @endif @if(isset($field['max'])) max="{{ $field['max'] }}" @endif @if($field['type'] == 'date') list="{{ $field['name'] }}" @endif>
                    @if($field['type'] == 'date')
                    <datalist id="{{ $field['name'] }}">
                        @foreach($field['options'] as $option)
                        <option value="{{ $option }}">
                        @endforeach
                    </datalist>
                    @endif
                @endif
                </div>
            @endforeach
            </form>
        </div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit" form="addEmployee">Add</button>
            </div>
        </div>
    </div>
</div>