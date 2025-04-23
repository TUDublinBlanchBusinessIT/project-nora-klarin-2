<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointments Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h1 class="mb-4">Appointments Dashboard</h1>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Email</th>
                <th>Date</th>
                <th>Technician ID</th>
                <th>Status</th>
                <th>Actions</th>
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
                        <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>

                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this appointment?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
