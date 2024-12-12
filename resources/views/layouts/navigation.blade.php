
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="display: flex; justify-content: space-between; align-items: center; padding: 20px;">
    <!-- Left side: Navbar -->
    <a class="navbar-brand" href="#home">Hello, {{ Auth::user()->name }}!</a>
    
    <!-- Right side: Links and Logout -->
    <div style="display: flex; align-items: center;">
        <a class="navbar-brand" href="" style="margin-right: 15px;">Home</a>
        <a class="navbar-brand" href="" style="margin-right: 15px;">Menu</a>
        <a class="navbar-brand" href="" style="margin-right: 15px;">Feedback</a>
        <a class="navbar-brand" href="" style="margin-right: 15px;">Order</a>
        <form method="POST" action="{{ route('logout') }}" style="margin: 0; display: inline;">
            @csrf
            <a href="{{ route('logout') }}" class="navbar-brand"
               style="margin-right: 0; text-decoration: none;"
               onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Log Out') }}
            </a>
        </form>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-bottom" style="display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 10px;">
    <a class="navbar-brand" href="#about" style="color: #fff;">About Us</a>
    <p style="color: #fff; text-align: center; max-width: 600px; font-size:10px;">
        Where we serve delicious food and refreshing drinks by the sea. Our cozy café offers the perfect spot to relax, enjoy great company, and savor our specially crafted menu, made with the freshest ingredients.
    </p>
</nav>
