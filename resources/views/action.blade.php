
<!-- Edit Modal -->
<div class="modal fade" id="edit{{$employee->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Edit Employee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                {!! Form::model($employees, [ 'method' => 'patch','route' => ['employee.update', $employee->id], 'files' => true ]) !!}
                    <div class="mb-3">
                        {!! Form::label('id', 'ID Number') !!}
                        {!! Form::text('id', $employee->id, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('firstname', 'Firstname') !!}
                        {!! Form::text('firstname', $employee->firstname, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('middlename', 'Middle name') !!}
                        {!! Form::text('middlename', $employee->middlename, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('lastname', 'Lastname') !!}
                        {!! Form::text('lastname', $employee->lastname, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('age', 'Age') !!}
                        {!! Form::number('age', $employee->age, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('position', 'Position') !!}
                        {!! Form::select('position', [
                            'Master Teacher I' => 'Master Teacher I',
                            'Master Teacher II' => 'Master Teacher II',
                            'Master Teacher III' => 'Master Teacher III',
                            'Administrator' => 'Administrator',
                            'Staff' => 'Staff',
                        ], $employee->position, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('birthday', 'Birthday') !!}
                        {!! Form::date('birthday', $employee->birthday, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('startdate', 'Start date') !!}
                        {!! Form::date('startdate', $employee->startdate, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', $employee->email, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('phone', 'Phone') !!}
                        {!! Form::tel('phone', $employee->phone, ['class' => 'form-control']) !!}
                    </div>
                    <div class="mb-3">
                        {!! Form::label('image', 'Image') !!}
                        @if ($employee->image)
                        <div class="text-center" style="margin-bottom: 10px; magin-top: 10px;">
                            <img width="100" height="100" src="{{ asset('uploads/' . $employee->image) }}">
                        </div>
                        @endif
                        {!! Form::file('image', ['class' => 'form-control']) !!}
                        {!! Form::hidden('image', Form::old('image')) !!}
                    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
            {{Form::button('<i class="fa fa-check-square-o"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit'])}}
            {{ csrf_field() }}
            {!! Form::close() !!}
        </div>
    </div>
  </div>
</div>
 
<!-- Delete Modal -->
<div class="modal fade" id="delete{{$employee->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Remove Employee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {!! Form::model($employees, [ 'method' => 'delete','route' => ['employee.delete', $employee->id] ]) !!}
                <p class="text-center">Are you sure you want to remove</p>
                <h5 class="text-center">{{$employee->firstname}} {{$employee->lastname}}?</h5>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
            {{Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
            {{ csrf_field() }}
            {!! Form::close() !!}
        </div>
    </div>
  </div>
</div>