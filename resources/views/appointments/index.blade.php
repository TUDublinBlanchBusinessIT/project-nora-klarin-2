<h1>Appointments Dashboard</h1>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Email</th>
            <th>Date</th>
            <th>Technician ID</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appointments as $appointment)
            <tr>
                <td>{{ $appointment->id }}</td>
                <td>{{ $appointment->customer_name }}</td>
                <td>{{ $appointment->customer_email }}</td>
                <td>{{ $appointment->appointment_date }}</td>
                <td>{{ $appointment->technician_id }}</td>
                <td>{{ $appointment->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
