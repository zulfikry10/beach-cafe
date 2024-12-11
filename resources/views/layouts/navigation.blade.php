<head>
    <style>
        .topnav {
  overflow: hidden;
  background-color: #fff;
  
  ;
}

.topnav a {
  float: left;
  color: #1e1e1e;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 18px;float: right;
}

.topnav a:hover {
  color: #1aa781;
}

.topnav a.active {
  background-color: #1aa781;
  color: white;
  float: left;
  white-space: nowrap;
}
    </style>
</head>
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="topnav">
        <a class="active" href="#home">Hello, {{ Auth::user()->name }}!</a>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
        </a>
        </form>
        
        <a href="">Inventory</a>
        <a href="">Feedback</a>
        <a href="">Order</a>
        <a href="">Menu</a>
      </div>
</nav>
