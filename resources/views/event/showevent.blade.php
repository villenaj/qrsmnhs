<div class="card-header d-flex justify-content-between align-items-center">
    <h6 class="text-primary fw-bold m-0">Upcoming Event</h6>
    <div class="dropdown no-arrow">
        <form>
            <select name="users" onchange="showUser(this.value)">
                <option value="" disabled selected>Select an event</option>
                @foreach ($events as $event)
                    @if ($event->start > now())
                        <option value="{{ $event->id }}">{{ $event->title }}</option>
                    @endif
                @endforeach
            </select>
        </form>
    </div>
</div>