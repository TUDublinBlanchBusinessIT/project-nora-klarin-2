<h1>Edit Appointment</h1>

<form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="customer_name">Customer Name:</label>
    <input type="text" name="customer_name" value="{{ $appointment->customer_name }}" required>

    <label for="customer_email">Customer Email:</label>
    <input type="email" name="customer_email" value="{{ $appointment->customer_email }}" required>

    <label for="appointment_date">Appointment Date:</label>
    <input type="datetime-local" name="appointment_date"
           value="{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d\TH:i') }}" required>

    <label for="technician_id">Technician ID:</label>
    <input type="number" name="technician_id" value="{{ $appointment->technician_id }}">

    <label for="status">Status:</label>
    <select name="status">
        <option value="pending" {{ $appointment->status === 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="confirmed" {{ $appointment->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
        <option value="completed" {{ $appointment->status === 'completed' ? 'selected' : '' }}>Completed</option>
    </select>

    <button type="submit">Update</button>
</form>
