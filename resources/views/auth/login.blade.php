<x-guest-layout>
    
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1>LOGIN</h1>
        <table>
            <tr>
                <td>
                    <div class="firstcolumn">
                        <label>User Name</label>
                    <input type="text" name="email" placeholder="User Name">
    
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit">Login</button>
                    </div>
                    
                
        <!-- Remember Me -->
        <div style="float: left; font-size: 15px; padding: 5px;">
            <label for="remember_me" >
                <input id="remember_me" type="checkbox"  name="remember">
                <span>Remember me</span>
            </label>
        </div>

        <div style="float: right; font-size: 15px; padding: 5px;">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot password') }}
                </a>
            @endif

        </div>
                </td>
                <td>
                    <img class="main-img me-5" src="{{ asset('asset/default-image/beach-cafe.png') }}" alt="beach-cafe.png" style="width: 150px">



                    <p>Already have an account?</p>
                    <a class="green-button" href="{{ route('register') }}">Sign Up</a>
                </td>
            </tr>
         </table>


    </form>
</x-guest-layout>
