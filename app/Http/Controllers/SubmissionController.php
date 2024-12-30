<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Tim;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|file|mimes:zip,rar|max:30720',
            ]);

            $tim = Tim::where('leader_id', auth()->id())->firstOrFail();

            $file = $request->file('file');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_BASENAME);
            $path = $file->storeAs('submissions', $originalName, 'public');

            $submission = Submission::create([
                'tim_id' => $tim->id,
                'file' => $path,
            ]);

            if ($request->wantsJson()) {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Submission berhasil ditambahkan!',
                        'submission' => $submission,
                    ],
                    201,
                );
            }
            return redirect()->back()->with('success', 'Submission berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
