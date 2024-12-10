<x-guest-layout>
    <head>
        <style>
            body {
	background: #d9d9d9;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
	flex-direction: column;
}

*{
	font-family: sans-serif;
	box-sizing: border-box;
}

table{
	width: 600px;
    height: 350px;
	border:  solid #ccc;
	background: #d9d9d9;
    border-radius: 10px;
	table-layout: fixed;
}
td:nth-child(even)
{
    background: #1aa781;
    text-align: center;
    font-size: 18px;
	border-radius: 10px;
}

h2 {
	text-align: center;
	margin-bottom: 40px;
    color: #1E1E1E;
}

.firstcolumn input {
	border: 2px solid #ccc;
	width: 95%;
	padding: 10px;
	margin: 0px 10px 10px 10px;
	border-radius: 5px;
}
.firstcolumn label {
	color: #1E1E1E;
	font-size: 18px;
	padding: 15px;
}

button {
	background: #1aa781;
	padding: 10px;
	color: #fff;
	border-radius: 5px;
	margin: 10px;
	border: none;
    width: 95%;
}
button:hover{
	opacity: .7;
}


h1 {
	text-align: center;
	color: #fff;
}
.green-button
{
    background-color: none;
    color: #fff;
    border: 1px solid #fff;
    border-radius: 30px;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}
.green-button:hover
{
    background-color: #fff;
    opacity: 0.7;
    color: #1aa781;
    border: 1px solid #fff;
    border-radius: 30px;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}

        </style>
    </head>
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
                    {{ __('Forgot password?') }}
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
