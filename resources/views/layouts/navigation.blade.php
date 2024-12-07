
<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top" style="min-height: 70px">
    <div class="container-fluid h-100">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div class="d-flex align-items-center ms-auto me-5">
                <a href="" class="text-nav fw-bold text-black me-3">Home</a>
                <a href="" class="text-nav fw-bold text-black me-3">Menu</a>
                <a href="{{ route('view_all_feedback', ['id' => $user->id ?? 5]) }}" class="text-nav fw-bold text-black me-3">Feedback</a>
                <a href="" class="text-nav fw-bold text-black me-3">About Us</a>
                <a href="" class="text-nav fw-bold text-black me-3">Log Out</a>
            </div>
        </div>
    </div>
</nav>
