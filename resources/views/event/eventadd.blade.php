<div class="modal fade" role="dialog" tabindex="-1" id="modal-1">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Event</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        <p class="text-start">Input details of event</p>
        <form method="post" action="{{ route('saveEvent') }}" accept-charset="utf-8" id="addEmployee" enctype="multipart/form-data">
          @csrf
          @foreach ($fields as $field)
            <div class="form-group">
              <label for="{{ $field['name'] }}">{{ $field['label'] }}:</label>
              @if ($field['type'] == 'text' || $field['type'] == 'date' || $field['type'] == 'time')
                <input type="{{ $field['type'] }}" class="form-control" name="{{ $field['name'] }}" id="{{ $field['name'] }}" required="{{ $field['required'] }}">
              @elseif ($field['type'] == 'select')
                <select class="form-control" name="{{ $field['name'] }}" id="{{ $field['name'] }}" required="{{ $field['required'] }}">
                  @foreach ($field['options'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                  @endforeach
                </select>
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

<div class="modal fade" role="dialog" tabindex="-1" id="modal-2">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modify Event</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        <p class="text-start">List of all events</p>
        <div class="table-responsive table mt-2" id="employeeTable" role="grid" aria-describedby="dataTable_info">
          <table class="table my-0" id="eventHeader">
            <thead>
              <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Who</th>
                <th>Location</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($events as $event)
                <tr>
                  <td>{{ $event->title }}</td>
                  <td>{{ $event->description }}</td>
                  <td>{{ $event->who }}</td>
                  <td>{{ $event->location }}</td>
                  <td>
                    <button class="btn btn-success" type="button" data-bs-target="#edit{{$event->id}}" data-bs-toggle="modal" style="margin: 10px;">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" type="button" data-bs-target="#delete{{$event->id}}" data-bs-toggle="modal" style="margin: 10px;">
                      <i class="fa fa-trash"></i>
                    </button>
                    @include('event/eventaction')
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="button" data-bs-target="#modal-1" data-bs-toggle="modal" style="margin: 10px;">
          <i class="fa fa-calendar-alt"></i> Add Event
        </button>
      </div>
    </div>
  </div>
</div>
