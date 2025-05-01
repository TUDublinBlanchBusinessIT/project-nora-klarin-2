@extends('layouts.app')
@section('content')
<div id="calendar"></div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar(calendarEl, {
      plugins: [ dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin ],
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title'
        },
        slotDuration: '00:10:00',
        defaultDate: '2025-04-22',
        editable: true,
        events: {!! json_encode(route('calendar.json')) !!}  // << safer, outputs unquoted URL string
    });
     calendar.render();
  });
</script>
<script src="{{ mix('js/app.js') }}"></script>
@endsection