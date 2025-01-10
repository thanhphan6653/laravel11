{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Form</title>
</head>
<body>
    <h1>Employee Form</h1>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('employee.store') }}" method="POST">
        @csrf

        <div>
            <label for="employee_name">Name:</label>
            <input type="text" name="employee_name" id="employee_name" value="{{ old('employee_name') }}" required>
            @error('employee_name')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" maxlength="30" value="{{ old('username') }}" required>
            @error('username')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="phone_number">Phone:</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" required>
            @error('phone_number')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="address">Address:</label>
            <textarea name="address" id="address" required>{{ old('address') }}</textarea>
            @error('address')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="salary">Salary:</label>
            <input type="number" name="salary" id="salary" step="0.01" value="{{ old('salary') }}" required>
            @error('salary')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="gender">Gender:</label>
            <select name="gender" id="gender" required>
                <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>Male</option>
                <option value="0" {{ old('gender') == '0' ? 'selected' : '' }}>Female</option>
            </select>
            @error('gender')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" required>
            @error('date_of_birth')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="join_date">Join Date:</label>
            <input type="date" name="join_date" id="join_date" value="{{ old('join_date') }}" required>
            @error('join_date')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="id_employee_manager">Manager ID:</label>
            <input type="number" name="id_employee_manager" id="id_employee_manager" value="{{ old('id_employee_manager') }}" required>
            @error('id_employee_manager')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="id_department">Department ID:</label>
            <input type="number" name="id_department" id="id_department" value="{{ old('id_department') }}" required>
            @error('id_department')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        

        <button type="submit">Submit</button>
    </form>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Register</h2>
        @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
        @endif
        <form action="{{ route('employee.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="employee_name" class="form-label">Name</label>
                <input type="text" name="employee_name" class="form-control" id="employee_name" value="{{ old('employee_name') }}" required>
                @error('employee_name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}" required>
                @error('username') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ old('phone_number') }}">
                @error('phone_number') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" class="form-control" id="address" required>{{ old('address') }}</textarea>
                @error('address') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" class="form-select" id="gender" required>
                    <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>Male</option>
                    <option value="0" {{ old('gender') == 0 ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="{{ old('date_of_birth') }}" required>
                @error('date_of_birth') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="join_date" class="form-label">Join Date</label>
                <input type="date" name="join_date" class="form-control" id="join_date" value="{{ old('join_date') }}" required>
                @error('join_date') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
            </div>

            

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
</html>