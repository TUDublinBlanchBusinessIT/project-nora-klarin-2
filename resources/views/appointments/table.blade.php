<table class="table table-responsive" id="appointments-table">
    <thead>
        <th>Appointment Date</th>
        <th>Service Id</th>
        <th>Customer Id</th>
        <th>Status</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($appointments as $appointment)
        <tr>
            <td>{!! $appointment->appointment_date !!}</td>
            <td>{!! $appointment->service_id !!}</td>
            <td>{!! $appointment->customer_id !!}</td>
            <td>{!! $appointment->status !!}</td>
            <td>
                {!! Form::open(['route' => ['appointments.destroy', $appointment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('appointments.show', [$appointment->id]) !!}" class='btn btn-default btn-xs'><i class="far fa-eye"></i></i></a>
                    <a href="{!! route('appointments.edit', [$appointment->id]) !!}" class='btn btn-default btn-xs'><i class="far fa-edit"></i></i></a>
                    {!! Form::button('<i class="far fa-trash-alt"></i></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>