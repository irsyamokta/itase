<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Tim;

class ParticipantController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'tim_name' => 'required|string|max:255',
                'name.*' => 'required|string|max:255',
                'email.*' => 'required|email|max:255',
                'university.*' => 'required|string|max:255',
                'profile.*' => 'required|file|image|max:2048',
                'ktm.*' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'role.*' => 'required|string',
            ]);

            $timId = DB::table('tims')->insertGetId([
                'leader_id' => auth()->id(),
                'tim_name' => $validated['tim_name'],
                'registered' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($validated['name'] as $index => $name) {
                $profilePath = $request->file('profile')[$index]->store('profiles', 'public');
                $ktmPath = $request->file('ktm')[$index]->store('ktm', 'public');

                Participant::create([
                    'tim_id' => $timId,
                    'name' => $name,
                    'email' => $validated['email'][$index],
                    'university' => $validated['university'][$index],
                    'profile' => $profilePath,
                    'ktm' => $ktmPath,
                    'role' => $validated['role'][$index],
                ]);
            }

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data tim dan peserta berhasil disimpan.',
                    'team_id' => $timId,
                ],
                201,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function view($id)
    {
        try {
            $tim = Tim::where('leader_id', $id)->first();

            if (!$tim) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Anda tidak memiliki akses ke tim ini.',
                    ],
                    404,
                );
            }

            $participants = Participant::where('tim_id', $tim->id)->get();

            if ($tim->registered == 1 && $tim->leader_id == auth()->id()) {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Akses berhasil.',
                        'data' => [
                            'team' => $tim,
                            'participants' => $participants,
                        ],
                    ],
                    200,
                );
            }

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Akses tidak valid.',
                ],
                403,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'participant_id' => 'required|array',
                'participant_id.*' => 'required|exists:participants,id',
                'name' => 'required|array',
                'name.*' => 'required|string|max:255',
                'email' => 'required|array',
                'email.*' => 'required|email|max:255',
                'university' => 'required|array',
                'university.*' => 'required|string|max:255',
                'role' => 'required|array',
                'role.*' => 'required|string',
                'profile' => 'nullable|array',
                'profile.*' => 'nullable|file|image|max:2048',
                'ktm' => 'nullable|array',
                'ktm.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            ]);

            $tim = Tim::where('id', $id)->where('leader_id', auth()->id())->firstOrFail();

            $tim->update([
                'tim_name' => $request->tim_name,
                'registered' => true,
            ]);

            foreach ($request->name as $index => $name) {
                $participant = Participant::where('tim_id', $tim->id)
                    ->where('id', $request->participant_id[$index])
                    ->firstOrFail();

                if ($request->hasFile("profile.$index")) {
                    $profilePath = $request->file("profile.$index")->store('profiles', 'public');
                    $participant->profile = $profilePath;
                }

                if ($request->hasFile("ktm.$index")) {
                    $ktmPath = $request->file("ktm.$index")->store('ktm', 'public');
                    $participant->ktm = $ktmPath;
                }

                $participant->update([
                    'name' => $name,
                    'email' => $request->email[$index],
                    'university' => $request->university[$index],
                    'role' => $request->role[$index],
                ]);
            }

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data tim dan peserta berhasil diperbarui.',
                    'data' => [
                        'team' => $tim,
                        'participants' => $tim->participants,
                    ],
                ],
                200,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function destroy($id)
    {
        try {
            $tim = Tim::where('leader_id', $id)->firstOrFail();

            if (!$tim) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tim tidak ditemukan.',
                ], 404);
            }

            $participants = Participant::where('tim_id', $tim->id)->get();

            foreach ($participants as $participant) {
                $participant->delete();
            }

            $tim->delete();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data tim dan peserta berhasil dihapus.',
                ],
                200,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }
}
