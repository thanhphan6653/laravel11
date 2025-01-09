<!DOCTYPE html>
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
</html>