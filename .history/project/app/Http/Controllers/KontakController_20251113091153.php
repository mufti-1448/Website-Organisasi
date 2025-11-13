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
        $sosialMedia = \App\Models\SosialMedia::all()->keyBy('platform');
        // Check if request is from admin or user
        if (request()->is('admin/*')) {
            return view('admin.kontak.index', compact('kontak', 'sosialMedia'));
        }
        return view('user.kontak.index', compact('kontak', 'sosialMedia'));
    }

    /**
     * Menampilkan detail satu pesan
     */
    public function show($id)
    {
        $pesan = Kontak::findOrFail($id);
        if ($pesan->status === 'belum') {
            $pesan->update(['status' => 'berlangsung']);
        }

        return view('admin.kontak.show', compact('pesan'));
    }

    /**
     * Form untuk membalas pesan
     */
    public function reply($id)
    {
        $pesan = Kontak::findOrFail($id);
        return view('admin.kontak.reply', compact('pesan'));
    }

    /**
     * Mengirim balasan ke email pengirim dan simpan ke database
     */
    public function sendReply(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s\-\.\,\!\?\(\)]+$/',
            'message' => 'required|string|max:2000|regex:/^[a-zA-Z0-9\s\-\.\,\!\?\(\)\n\r]+$/',
        ]);

        $pesan = Kontak::findOrFail($id);

        // Sanitize input untuk mencegah XSS
        $sanitizedMessage = strip_tags($request->message);
        $sanitizedSubject = strip_tags($request->subject);

        // Simpan balasan ke database
        $pesan->update([
            'reply' => $sanitizedMessage,
            'replied_at' => now(),
            'status' => 'selesai',
        ]);

        // Contoh menggunakan Mail (pastikan sudah konfigurasi .env MAIL)
        Mail::raw($sanitizedMessage, function ($mail) use ($sanitizedSubject, $pesan) {
            $mail->to($pesan->email)
                ->subject($sanitizedSubject);
        });

        return redirect()->route('admin.kontak.index')->with('success', 'Balasan telah dikirim ke ' . $pesan->email . ' dan disimpan ke database.');
    }

    /**
     * Hapus pesan dari database
     */
    public function destroy($id)
    {
        $pesan = Kontak::findOrFail($id);
        $pesan->delete();

        return redirect()->route('admin.kontak.index')->with('success', 'Pesan berhasil dihapus.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string|max:2000|regex:/^[a-zA-Z0-9\s\-\.\,\!\?\(\)\n\r]+$/',
        ]);

        // Sanitize input untuk mencegah XSS
        $sanitizedNama = strip_tags($request->nama);
        $sanitizedEmail = filter_var($request->email, FILTER_SANITIZE_EMAIL);
        $sanitizedPesan = strip_tags($request->pesan);

        Kontak::create([
            'nama' => $sanitizedNama,
            'email' => $sanitizedEmail,
            'pesan' => $sanitizedPesan,
            'tanggal' => now()->toDateString(),
            'status' => 'belum',
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim.');
    }

    /**
     * Update sosial media links
     */
    public function updateSosial(Request $request)
    {
        $request->validate([
            'facebook_url' => 'nullable|url|max:500',
            'instagram_url' => 'nullable|url|max:500',
            'twitter_url' => 'nullable|url|max:500',
            'linkedin_url' => 'nullable|url|max:500',
            'youtube_url' => 'nullable|url|max:500',
            'tiktok_url' => 'nullable|url|max:500',
            'facebook_aktif' => 'nullable|boolean',
            'instagram_aktif' => 'nullable|boolean',
            'twitter_aktif' => 'nullable|boolean',
            'linkedin_aktif' => 'nullable|boolean',
            'youtube_aktif' => 'nullable|boolean',
            'tiktok_aktif' => 'nullable|boolean',
        ]);

        // Sanitize URLs untuk mencegah XSS
        $sanitizedUrls = [
            'facebook' => filter_var($request->facebook_url, FILTER_SANITIZE_URL),
            'instagram' => filter_var($request->instagram_url, FILTER_SANITIZE_URL),
            'twitter' => filter_var($request->twitter_url, FILTER_SANITIZE_URL),
            'linkedin' => filter_var($request->linkedin_url, FILTER_SANITIZE_URL),
            'youtube' => filter_var($request->youtube_url, FILTER_SANITIZE_URL),
            'tiktok' => filter_var($request->tiktok_url, FILTER_SANITIZE_URL),
        ];

        $platforms = [
            'facebook' => ['url' => $sanitizedUrls['facebook'], 'aktif' => $request->facebook_aktif ?? false, 'icon' => 'bi-facebook'],
            'instagram' => ['url' => $sanitizedUrls['instagram'], 'aktif' => $request->instagram_aktif ?? false, 'icon' => 'bi-instagram'],
            'twitter' => ['url' => $sanitizedUrls['twitter'], 'aktif' => $request->twitter_aktif ?? false, 'icon' => 'bi-twitter'],
            'linkedin' => ['url' => $sanitizedUrls['linkedin'], 'aktif' => $request->linkedin_aktif ?? false, 'icon' => 'bi-linkedin'],
            'youtube' => ['url' => $sanitizedUrls['youtube'], 'aktif' => $request->youtube_aktif ?? false, 'icon' => 'bi-youtube'],
            'tiktok' => ['url' => $sanitizedUrls['tiktok'], 'aktif' => $request->tiktok_aktif ?? false, 'icon' => 'bi-tiktok'],
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

        return redirect()->route('admin.kontak.index')->with('success', 'Link sosial media berhasil diperbarui.');
    }
}
