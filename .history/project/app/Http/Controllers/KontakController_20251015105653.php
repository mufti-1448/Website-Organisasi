<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KontakController extends Controller
{
    /**
     * Menampilkan semua pesan kontak dan media sosial
     */
    public function index()
    {
        $kontak = Kontak::orderBy('created_at', 'desc')->get();
        $mediaSosial = \App\Models\MediaSosial::all();
        return view('kontak.index', compact('kontak', 'mediaSosial'));
    }

    /**
     * Menampilkan detail satu pesan
     */
    public function show($id)
    {
        $pesan = Kontak::findOrFail($id);
        if ($pesan->status === 'baru') {
            $pesan->update(['status' => 'dibaca']);
        }

        return view('kontak.show', compact('pesan'));
    }

    /**
     * Form untuk membalas pesan
     */
    public function reply($id)
    {
        $pesan = Kontak::findOrFail($id);
        return view('kontak.reply', compact('pesan'));
    }

    /**
     * Mengirim balasan ke email pengirim
     */
    public function sendReply(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $pesan = Kontak::findOrFail($id);

        // Contoh menggunakan Mail (pastikan sudah konfigurasi .env MAIL)
        Mail::raw($request->message, function ($mail) use ($request, $pesan) {
            $mail->to($pesan->email)
                ->subject($request->subject);
        });

        return redirect()->route('kontak.index')->with('success', 'Balasan telah dikirim ke ' . $pesan->email);
    }

    /**
     * Hapus pesan dari database
     */
    public function destroy($id)
    {
        $pesan = Kontak::findOrFail($id);
        $pesan->delete();

        return redirect()->route('kontak.index')->with('success', 'Pesan berhasil dihapus.');
    }

    /**
     * Update sosial media links
     */
    public function updateSosial(Request $request)
    {
        $request->validate([
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'facebook_aktif' => 'nullable|boolean',
            'instagram_aktif' => 'nullable|boolean',
            'twitter_aktif' => 'nullable|boolean',
            'linkedin_aktif' => 'nullable|boolean',
            'youtube_aktif' => 'nullable|boolean',
        ]);

        $platforms = [
            'facebook' => ['url' => $request->facebook_url, 'aktif' => $request->facebook_aktif ?? false, 'icon' => 'bi-facebook'],
            'instagram' => ['url' => $request->instagram_url, 'aktif' => $request->instagram_aktif ?? false, 'icon' => 'bi-instagram'],
            'twitter' => ['url' => $request->twitter_url, 'aktif' => $request->twitter_aktif ?? false, 'icon' => 'bi-twitter'],
            'linkedin' => ['url' => $request->linkedin_url, 'aktif' => $request->linkedin_aktif ?? false, 'icon' => 'bi-linkedin'],
            'youtube' => ['url' => $request->youtube_url, 'aktif' => $request->youtube_aktif ?? false, 'icon' => 'bi-youtube'],
        ];

        foreach ($platforms as $platform => $data) {
            if ($data['url']) {
                \App\Models\SosialMedia::updateOrCreate(
                    ['platform' => $platform],
                    ['url' => $data['url'], 'icon' => $data['icon'], 'aktif' => $data['aktif']]
                );
            } else {
                \App\Models\SosialMedia::where('platform', $platform)->delete();
            }
        }

        return redirect()->route('kontak.index')->with('success', 'Link sosial media berhasil diperbarui.');
    }
}
