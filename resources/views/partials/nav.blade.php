<ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('newrecord'}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Add new records</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Records</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="{{route('admin')}}">Dashboard</a>
          <a class="dropdown-item" href="">View all records</a>
          <a class="dropdown-item" href="">Reports and analysis</a>
          
       
         
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-table"></i>
          <span>Profile</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="fas fa-fw fa-table"></i>
          <span>Settings</span></a>
      </li>
    </ul>
