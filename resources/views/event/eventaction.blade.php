
<div class="modal fade" role="dialog" tabindex="-1" id="edit{{$event->id}}">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Edit Event</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        {!! Form::model($events, [ 'method' => 'patch','route' => ['event.update', $event->id] ]) !!}
          <div class="mb-3">
              {!! Form::label('title', 'Title') !!}
              {!! Form::text('title', $event->title, ['class' => 'form-control']) !!}
          </div>
          <div class="mb-3">
              {!! Form::label('description', 'Description') !!}
              {!! Form::text('description', $event->description, ['class' => 'form-control']) !!}
          </div>
          <div class="mb-3">
              {!! Form::label('who', 'Who') !!}
              {!! Form::text('who', $event->who, ['class' => 'form-control']) !!}
          </div>
          <div class="mb-3">
              {!! Form::label('startdate', 'Start date') !!}
              {!! Form::date('startdate', date('Y-m-d', strtotime($event->start)), ['class' => 'form-control']) !!}
          </div>
          <div class="mb-3">
              {!! Form::label('starttime', 'Start time') !!}
              {!! Form::time('starttime', date('H:i:s', strtotime($event->start)), ['class' => 'form-control']) !!}
          </div>
          <div class="mb-3">
              {!! Form::label('enddate', 'End date') !!}
              {!! Form::date('enddate', date('Y-m-d', strtotime($event->end)), ['class' => 'form-control']) !!}
          </div>
          <div class="mb-3">
              {!! Form::label('endtime', 'End time') !!}
              {!! Form::time('endtime', date('H:i:s', strtotime($event->end)), ['class' => 'form-control']) !!}
          </div>
          <div class="mb-3">
              {!! Form::label('location', 'Location') !!}
              {!! Form::text('location', $event->location, ['class' => 'form-control']) !!}
          </div>
          
      </div>
      <div class="modal-footer">
        <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
        {{Form::button('<i class="fa fa-check-square-o"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit'])}}
        {{ csrf_field() }}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="delete{{$event->id}}" tabindex="-1" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Remove Event</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {!! Form::model($events, [ 'method' => 'delete','route' => ['event.delete', $event->id] ]) !!}
                <p class="text-center">Are you sure you want to remove</p>
                <h5 class="text-center">{{$event->title}}?</h5>
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
