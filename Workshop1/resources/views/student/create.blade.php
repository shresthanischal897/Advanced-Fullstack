
<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
</head>
<body>

    <h1>Create Student</h1>

    @if($errors->any())
        <div style="color:red;">
            <h3>Please fix the following errors:</h3>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/students" method="POST">
        @csrf

        <p>
            <label>Name:</label>
            <input type="text" name="name"
                   value="{{ old('name') }}">
        </p>

        <p>
            <label>Email:</label>
            <input type="email" name="email"
                   value="{{ old('email') }}">
        </p>

        <p>
            <label>Phone:</label>
            <input type="text" name="phone"
                   value="{{ old('phone') }}">
        </p>

        <p>
            <label>Address:</label>
            <textarea name="address">{{ old('address') }}</textarea>
        </p>

        <p>
            <label>Date of Birth:</label>
            <input type="date" name="date_of_birth"
                   value="{{ old('date_of_birth') }}">
        </p>

        <button type="submit">Create Student</button>

    </form>

    <br>
    <a href="/students">Back to Students</a>

</body>
</html>
