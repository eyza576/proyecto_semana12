

<li class="nav-item">
    <a href="{{ route('usurios.index') }}"
       class="nav-link {{ Request::is('usurios*') ? 'active' : '' }}">
       <i class="fa fa-users" aria-hidden="true"></i>
        <p class="text-info">Usurios</p>
        
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('pacientes.index') }}"
       class="nav-link {{ Request::is('pacientes*') ? 'active' : '' }}">
       <i class="fa fa-wheelchair" aria-hidden="true"></i>
        <p class="text-info">Pacientes</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('doctors.index') }}"
       class="nav-link {{ Request::is('doctors*') ? 'active' : '' }}">
       <i class="fa fa-user-md" aria-hidden="true"></i>
        <p class="text-info">Doctors</p>
    </a>
</li>




<li class="nav-item">
    <a href="{{ route('citasdetalles.index') }}"
       class="nav-link {{ Request::is('citasdetalles*') ? 'active' : '' }}">
       <i class="fa fa-cog" aria-hidden="true"></i>
        <p class="text-info" >Citas Detalles</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('cita.index') }}"
       class="nav-link {{ Request::is('cita*') ? 'active' : '' }}">
       <i class="fa fa-calendar" aria-hidden="true"></i>
        <p class="text-info">Cita</p>
    </a>
</li>





