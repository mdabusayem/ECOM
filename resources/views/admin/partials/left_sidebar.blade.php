 <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image"> <img src="/images/faces/face4.jpg" alt="image"/> <span class="online-status online"></span> </div>
              <div class="profile-name">
                <p class="name">Richard V.Welsh</p>
                <p class="designation">Manager</p>
                <div class="badge badge-teal mx-auto mt-3">Online</div>
              </div>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}"><img class="menu-icon" src="/images/menu_icons/01.png" alt="menu icon"><span class="menu-title">Dashboard</span></a></li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="/images/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Manege Products</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.product.create')}}">Manage Products</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.products') }}">Add Products</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#category-pages" aria-expanded="false" aria-controls="category-pages"> <img class="menu-icon" src="/images/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Manege Category</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="category-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category.create')}}">Create Categories</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.categories') }}">Manage Categories</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#division-pages" aria-expanded="false" aria-controls="division-pages"> <img class="menu-icon" src="/images/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Manege Division</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="division-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.division.create')}}">Create Divisions</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.divisions') }}">Manage Division</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#district-pages" aria-expanded="false" aria-controls="district-pages"> <img class="menu-icon" src="/images/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Manege District</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="district-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.district.create')}}">Create Districts</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.districts') }}">Manage District</a></li>
                
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->