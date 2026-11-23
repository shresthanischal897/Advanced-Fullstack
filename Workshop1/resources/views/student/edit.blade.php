
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h1>Edit Student</h1>

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

<form action="{{ route('students.update', $student->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <p>
        <label>Name:</label>
        <input type="text" name="name"
               value="{{ old('name', $student->name) }}">
    </p>

    <p>
        <label>Email:</label>
        <input type="email" name="email"
               value="{{ old('email', $student->email) }}">
    </p>

    <p>
        <label>Phone:</label>
        <input type="text" name="phone"
               value="{{ old('phone', $student->phone) }}">
    </p>

    <p>
        <label>Address:</label>
        <textarea name="address">{{ old('address', $student->address) }}</textarea>
    </p>

    <p>
        <label>Date of Birth:</label>
        <input type="date" name="date_of_birth"
               value="{{ old('date_of_birth', $student->date_of_birth) }}">
    </p>

    <button type="submit">Update Student</button>

</form>

<br>

<a href="{{ route('students.index') }}">
    Back to Students
</a>

</body>
</html>
