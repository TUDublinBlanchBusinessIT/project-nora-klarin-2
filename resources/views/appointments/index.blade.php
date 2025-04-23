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
            <th>Actions</th> {{-- New column header --}}
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
                <td>
                    <a href="{{ route('appointments.edit', $appointment->id) }}">Edit</a>

                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this appointment?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
