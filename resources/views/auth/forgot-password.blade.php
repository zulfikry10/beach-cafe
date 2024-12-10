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
<h1>
    Retrieve Password
</h1>
    <table>
        <tr>
            <td>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
            
                    <!-- Email Address -->
                    <div>
                        <x-input-label style="color: #1E1E1E;
	font-size: 18px;
	padding: 15px;" for="email" :value="__('Enter your email')" />
                        <x-text-input style="border: 2px solid #ccc;
	width: 95%;
	padding: 10px;
	margin: 0px 10px 10px 10px;
	border-radius: 5px;" id="email"  type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Retrieve Password') }}
                        </x-primary-button>
                    </div>
                </form>
            </td>
            <td>
                <img class="main-img me-5" src="{{ asset('asset/default-image/beach-cafe.png') }}" alt="beach-cafe.png" style="width: 150px">



                    <p>Remember your account?</p>
                    <a class="green-button" href="{{ route('login') }}"">Sign In</a>
            </td>
        </tr>
    </table>
</x-guest-layout>
