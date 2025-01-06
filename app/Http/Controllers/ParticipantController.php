<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Tim;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'tim_name' => 'required|string|max:255',
                'name.*' => 'required|string|max:255',
                'email.*' => 'required|email|max:255',
                'university.*' => 'required|string|max:255',
                'profile.*' => 'required|file|image|max:2048',
                'ktm.*' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'role.*' => 'required|string',
            ]);

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data peserta berhasil disimpan.',
                ]);
            }

            $timId = DB::table('tims')->insertGetId([
                'leader_id' => auth()->id(),
                'tim_name' => $request->tim_name,
                'registered' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($request->name as $index => $name) {
                $profilePath = $request->file('profile')[$index]->store('profiles', 'public');
                $ktmPath = $request->file('ktm')[$index]->store('ktm', 'public');

                Participant::create([
                    'tim_id' => $timId,
                    'name' => $name,
                    'email' => $request->email[$index],
                    'university' => $request->university[$index],
                    'profile' => $profilePath,
                    'ktm' => $ktmPath,
                    'role' => $request->role[$index],
                ]);
            }

            return redirect()->route('team')->with('success', 'Data peserta berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silahkan coba lagi.');
        }
    }

    public function view($id)
    {
        $tim = Tim::where('leader_id', $id)->first();

        if (!$tim) {
            if (request()->wantsJson()) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Tim tidak ditemukan.',
                    ],
                    403,
                );
            }
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke tim ini.');
        }

        $participants = Participant::where('tim_id', $tim->id)->get();

        if ($tim->registered == 1 && $tim->leader_id == auth()->id()) {
            return view('client.auth.index', [
                'page' => 'team',
                'component' => 'page.client.update',
                'data' => compact('tim', 'participants'),
            ]);
        }

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'data' => [
                    'team' => $tim,
                    'participants' => $participants,
                ],
            ]);
        }
        return redirect()->back()->with('error', 'Akses tidak valid.');
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

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data tim dan peserta berhasil diperbarui.',
                    'tim' => $tim,
                    'participants' => $tim->participants,
                ]);
            }

            return redirect()->route('team')->with('success', 'Data tim dan peserta berhasil diperbarui.');
        } catch (\Exception $e) {

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                ], 500);
            }

            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $tim = Tim::where('leader_id', $id)->firstOrFail();
            $participants = Participant::where('tim_id', $tim->id)->get();

            foreach ($participants as $participant) {
                $participant->delete();
            }

            $tim->delete();

            if($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data tim dan peserta berhasil dihapus.',
                ], 200);
            }

            return redirect()->route('team')->with('success', 'Data tim dan peserta berhasil dihapus.');
        } catch (\Exception $e) {

            if($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tim tidak ditemukan.',
                ], 200);
            }

            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $participants = Participant::where('name', 'like', '%' . $search . '%')
            ->orWhere('university', 'like', '%' . $search . '%')
            ->orWhereHas('tim', function ($query) use ($search) {
                $query->where('tim_name', 'like', '%' . $search . '%');
            })
            ->paginate(20);

        return view('admin.page.participant.index', compact('participants'));
    }
}
