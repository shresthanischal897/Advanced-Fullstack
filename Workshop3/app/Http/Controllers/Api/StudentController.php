<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    // GET /api/students
    // Display all students
    public function index()
    {
        $students = Student::all();

        return StudentResource::collection($students);
    }

    // POST /api/students
    // Create a new student
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->validated());

        return (new StudentResource($student))
            ->response()
            ->setStatusCode(201);
    }

    // GET /api/students/{student}
    // Display one student
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    // PUT /api/students/{student}
    // Update student
    public function update(
        UpdateStudentRequest $request,
        Student $student
    ) {
        $student->update($request->validated());

        return new StudentResource($student->fresh());
    }

    // DELETE /api/students/{student}
    // Delete student
    public function destroy(Student $student): JsonResponse
    {
        $student->delete();

        return response()->json(null, 204);
    }
}
