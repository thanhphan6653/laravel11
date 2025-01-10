<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
</head>
<body>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('form.store') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            @error('email')
                <p class="error" style="color: red">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            @error('username')
                <p class="error" style="color: red">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            @error('password')
                <p class="error" style="color: red">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone">
            @error('phone')
                <p class="error" style="color: red">{{$message}}</p>
            @enderror
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>