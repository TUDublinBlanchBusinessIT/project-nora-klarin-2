<form action="{{ route('appointments.store') }}" method="POST">
    @csrf

    <label for="customer_name">Customer Name:</label>
    <input type="text" name="customer_name" required>

    <label for="customer_email">Customer Email:</label>
    <input type="email" name="customer_email" required>

    <label for="appointment_date">Appointment Date:</label>
    <input type="datetime-local" name="appointment_date" required>

    <label for="technician_id">Technician ID (optional):</label>
    <input type="number" name="technician_id">

    <label for="preferred_technician_id">Preferred Technician ID (optional):</label>
    <input type="number" name="preferred_technician_id">

    <button type="submit">Create Appointment</button>
</form>
