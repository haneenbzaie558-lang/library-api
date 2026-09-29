<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowing;

class BorrowingController extends Controller
{
    public function index() {
        $borrowings = Borrowing::all();
        return response()->json($borrowings);
    }
    public function show($id)
    {
        $borrowing = Borrowing::find($id);
        return response()->json($borrowing);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_id' => 'required|integer',
            'user_id' => 'required|integer',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after:borrow_date',
        ]);

        $borrowing = Borrowing::create($validatedData);
        return response()->json($borrowing, 201);
    }
    public function update(Request $request, $id)
    {
        $borrowing = Borrowing::find($id);
        if (!$borrowing) {
            return response()->json(['message' => 'Borrowing record not found'], 404);
        }

        $validatedData = $request->validate([
            'book_id' => 'sometimes|required|integer',
            'user_id' => 'sometimes|required|integer',
            'borrow_date' => 'sometimes|required|date',
            'return_date' => 'nullable|date|after:borrow_date',
        ]);

        $borrowing->update($validatedData);
        return response()->json($borrowing);
    }
    public function destroy($id)
    {
        $borrowing = Borrowing::find($id);
        if (!$borrowing) {
            return response()->json(['message' => 'Borrowing record not found'], 404);
        }

        $borrowing->delete();
        return response()->json(['message' => 'Borrowing record deleted successfully']);
    }
}
