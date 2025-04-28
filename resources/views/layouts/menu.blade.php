<li class="nav-item">
    <a href="{{ route('customers.index') }}"
       class="nav-link {{ Request::is('customers*') ? 'active' : '' }}">
        <p>Customers</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('services.index') }}"
       class="nav-link {{ Request::is('services*') ? 'active' : '' }}">
        <p>Services</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('appointments.index') }}"
       class="nav-link {{ Request::is('appointments*') ? 'active' : '' }}">
        <p>Appointments</p>
    </a>
</li>


