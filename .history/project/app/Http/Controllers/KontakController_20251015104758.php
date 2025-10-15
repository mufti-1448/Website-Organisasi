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
}
