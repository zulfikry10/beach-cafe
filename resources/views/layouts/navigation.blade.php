
<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top" style="min-height: 70px">
    <div class="container-fluid h-100">
        <a class="text-nav fw-bold text-black me-3" href="#home">Hello, {{ Auth::user()->name }}!</a>
        <div class="d-flex justify-content-between align-items-center w-100">
            <div class="d-flex align-items-center ms-auto me-5">
                <a href="" class="text-nav fw-bold text-black me-3">Home</a>
                <a href="" class="text-nav fw-bold text-black me-3">Menu</a>
                <a href="" class="text-nav fw-bold text-black me-3">Feedback</a>
                <a href="" class="text-nav fw-bold text-black me-3">About Us</a>
                
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')" class="text-nav fw-bold text-black me-3"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
            </div>
        </div>
    </div>
</nav>