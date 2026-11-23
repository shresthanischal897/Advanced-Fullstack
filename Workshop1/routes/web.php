
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Student;

// Laravel homepage
Route::get('/', function () {
    return view('welcome');
});

// Display all students
Route::get('/students', function () {
    $students = Student::all();

    return view('student.list', [
        'students' => $students
    ]);
})->name('students.index');

// Display create student form
Route::get('/students/create', function () {
    return view('student.create');
})->name('students.create');

// Save new student to database
Route::post('/students', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:students,email',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    Student::create($validated);

    return redirect()->route('students.index')
        ->with('success', 'Student created successfully!');
})->name('students.store');

// Show individual student
Route::get('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);

    return view('student.detail', [
        'student' => $student
    ]);
})->name('students.show');

// Display edit student form
Route::get('/students/{id}/edit', function ($id) {
    $student = Student::findOrFail($id);

    return view('student.edit', [
        'student' => $student
    ]);
})->name('students.edit');

// Update student information
Route::put('/students/{id}', function (Request $request, $id) {
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('students', 'email')->ignore($student->id),
        ],
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update($validated);

    return redirect()->route('students.index')
        ->with('success', 'Student updated successfully!');
})->name('students.update');

// Delete student
Route::delete('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);

    $student->delete();

    return redirect()->route('students.index')
        ->with('success', 'Student deleted successfully!');
})->name('students.destroy');
