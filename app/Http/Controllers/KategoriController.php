<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return view('kategori.index.index');
    }

    public function search(Request $request)
    {
        $kode = $request->kode;
        $nama = $request->nama;

        $data_search = Kategori::query();

        if (!empty($kode)) $data_search = $data_search->where('kode', $kode);
        if (!empty($nama)) $data_search = $data_search->where('nama', 'LIKE', '%' . $nama . '%');

        $data_search = $data_search->select('id', 'kode', 'nama')->orderBy('id')->get();

        return json_encode([
            'status' => 200,
            'data' => $data_search
        ]);
    }

    public function formView($method, $id = 0)
    {
        if ($method == 'new') {
            $kategori = [];
        } else {
            $kategori = Kategori::find($id);
        }
        $data['kategori'] = $kategori;
        $data['method'] = $method;
        return view('kategori.form.index', $data);
    }

    public function singleView($id)
    {
        $kategori = Kategori::with('masterItems')->find($id);
        $data['kategori'] = $kategori;
        return view('kategori.single.index', $data);
    }

    public function formSubmit(Request $request, $method, $id = 0)
    {
        if ($method == 'new') {
            $data_kategori = new Kategori;
            $kode = Kategori::count('id');
            $kode = $kode + 1;
            $kode = 'KAT' . str_pad($kode, 5, '0', STR_PAD_LEFT);
        } else {
            $data_kategori = Kategori::find($id);
            $kode = $data_kategori->kode;
        }

        $data_kategori->nama = $request->nama;
        $data_kategori->kode = $kode;
        $data_kategori->save();

        return redirect('kategori');
    }

    public function delete($id)
    {
        Kategori::find($id)->delete();
        return redirect('kategori');
    }

    public function downloadPDF($id)
    {
        $kategori = Kategori::with('masterItems')->find($id);
        
        $data = [
            'kategori' => $kategori,
            'tanggal_cetak' => now()->format('d F Y H:i:s')
        ];

        // Alternative: Generate simple HTML and force download as .html for now
        $html = view('kategori.pdf.index', $data)->render();
        
        // Force download as HTML file (temporary solution)
        $filename = 'kategori_' . $kategori->kode . '.html';
        
        return response($html)
            ->header('Content-Type', 'text/html')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}
