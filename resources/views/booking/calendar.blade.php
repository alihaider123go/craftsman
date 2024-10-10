<x-master-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('bottom_script')
    <script>
    if (jQuery('#calendar').length) {
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var today = new Date().toISOString().slice(0, 10);    
        var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'dayGrid','timeGrid', 'dayGrid', 'list','interaction','bootstrap' ],
        defaultView: 'dayGridMonth',
        displayEventTime: true,
        themeSystem: 'bootstrap',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
            clear: ''
        },
        height : 600,
        selectable: true,
        selectHelper: true,
        editable: true,
        eventLimit: false,
        showNonCurrentDates : false,
        droppable: false,
        editable:false,
        eventSources:[{
            events: function (info, successCallback, failureCallback) {
                $.ajax({
                    url:  "{{ route('home') }}",
                    dataType: 'JSON',
                    data: {
                        start: info['startStr'],
                        end: info['endStr'],
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        successCallback(response);
                        return response;
                    },
                    failure: function(data){
                        failureCallback(data);
                    }
                });
            },
            color  : "rgb(19, 193, 240)",
            textColor : "#fff",
            eventDataTransform: function(eventData) {
                return {
                    id: eventData.id,
                    title: (eventData.service != null && eventData.service != '') ? eventData.service.name : '-' ,
                    start: eventData.date,
                    status: eventData.status,
                };
            },
        }],
        eventRender: function (event, element, view) {
            if (event.allDay === 'true')
            { event.allDay = true; } else
            { event.allDay = false; }
            if (event.event.extendedProps.status == 'pending')
            {
                event.el.classList.add('bg-warning');
                event.el.classList.add('border-warning');
            }
            if (event.event.extendedProps.status == 'accepted')
            {
                event.el.classList.add('bg-primary');
                event.el.classList.add('border-primary');
            }
            if (event.event.extendedProps.status == 'ongoing')
            {
                event.el.classList.add('bg-warning');
                event.el.classList.add('border-warning');
            }
            if (event.event.extendedProps.status == 'in_progress')
            {
                event.el.classList.add('bg-info');
                event.el.classList.add('border-info');
            }
            if (event.event.extendedProps.status == 'hold')
            {
                event.el.classList.add('bg-dark');
                event.el.classList.add('text-white');
                event.el.classList.add('border-dark');
            }
            if (event.event.extendedProps.status == 'cancelled')
            {
                event.el.classList.add('bg-light');
                event.el.classList.add('border-light');
            }
            if (event.event.extendedProps.status == 'rejected')
            {
                event.el.classList.add('bg-light');
                event.el.classList.add('border-light');
            }
            if (event.event.extendedProps.status == 'completed')
            {
                event.el.classList.add('bg-success');
                event.el.classList.add('border-success');
            }
        },
        eventDrop: function(info) {},
        eventClick:  function(info) {
            var id = info.event.id;
            var url = "{{ URL::to('booking') }}/"+id;
            window.location.replace(url);
        },
    });
    calendar.render();
    });
    }
</script>
<style>

.fc-today .fc-day-number{
 
  font-size: 23px !important;
  font-weight:700 !important;
  
} 

.fc-today{
   
    display: block !important;
}
.fc-list-item-title a{

    cursor: pointer !important;
}


</style>
    @endsection
</x-master-layout>

