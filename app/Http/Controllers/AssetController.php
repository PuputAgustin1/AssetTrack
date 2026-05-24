<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use App\Exports\AssetsExport;
use App\Imports\AssetsImport;
use Maatwebsite\Excel\Facades\Excel;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;
        $condition = $request->condition;
        $tanggal_masuk = $request->tanggal_masuk;

        $assets = Asset::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search){
                    $q->where('code', 'like', "%$search%")
                        ->orWhere('name', 'like', "%$search%")
                        ->orWhere('category', 'like', "%$search%")
                        ->orWhere('location', 'like', "%$search%")
                        ->orWhere('merk', 'like', "%$search%")
                        ->orWhere('penanggungjawab', 'like', "%$search%")
                        ->orWhere('tanggal_masuk', 'like', "%$search%");
                });
        })
        ->when($category, function ($query, $category) {
            return $query->where('category', $category);
        })
        ->when($condition, function ($query, $condition) {
            return $query->where('condition', $condition);
        })
        ->when($tanggal_masuk, function ($query, $tanggal_masuk) {
            return $query->where('tanggal_masuk', $tanggal_masuk);
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

        return view('index', compact('assets'));
 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'code' => 'required|unique:assets,code',
        'name' => 'required',
        'category' => 'required',
        'location' => 'required',
        'condition' => 'required',
        'merk' => 'required',
        'penanggungjawab' => 'required',
        'tanggal_masuk' => 'required',
        'harga' => 'required',

    ], [
        'code.unique' => 'Kode aset sudah digunakan',

    ]);
        Asset::create([
        'code' => $request->code,
        'name' => $request->name,
        'category' => $request->category,
        'location' => $request->location,
        'condition' => $request->condition,
        'merk' => $request->merk,
        'penanggungjawab' => $request->penanggungjawab,
        'tanggal_masuk' => $request->tanggal_masuk,
        'harga' => str_replace(['Rp', 'rp', '.', ',', ' '], '', $request->harga),

    ]);

    return redirect('/assets');

    }
    public function show(Asset $asset)
    {
        return view('show', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        return view('edit', compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        $request->validate([
        'code' => 'required|unique:assets,code,' . $asset->code . ',code',
        'name' => 'required',
        'category' => 'required',
        'location' => 'required',
        'condition' => 'required',
        'merk' => 'required',
        'penanggungjawab' => 'required',
        'tanggal_masuk' => 'required',
        'harga' => 'required',
    ]);

    $asset->update([
        'code' => $request->code,
        'name' => $request->name,
        'category' => $request->category,
        'location' => $request->location,
        'condition' => $request->condition,
        'merk' => $request->merk,
        'penanggungjawab' => $request->penanggungjawab,
        'tanggal_masuk' => $request->tanggal_masuk,
        'harga' => str_replace(['Rp', 'rp', '.', ',', ' '], '', $request->harga),
    ]);

    return redirect('/assets')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();

        return redirect('/assets')->with('success', 'Data berhasil dihapus');
    }

    public function checkCode($code)
    {
        $asset = Asset::where('code', $code)->first();

        if (!$asset) {
            return response()->json([
                'exists' => false,
                'message' => 'Kode aset tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'exists' => true,
            'url' => route('assets.show', $asset->code),
        ]);
    }

    public function exportPage()
    {
        return view('export');
    }

    public function importPage()
    {
        return view('import');
    }
    
    public function export(Request $request)
    {
        $filters = [
            'category' => $request->category,
            'condition' => $request->condition,
            'location' => $request->location,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
        ];

        $columns = $request->columns ?? [
            'code',
            'name',
            'category',
            'location',
            'condition',
            'merk',
            'penanggungjawab',
            'tanggal_masuk',
            'harga',
        ];

        return Excel::download(new AssetsExport($filters, $columns), 'assets.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv|max:5120',
        ], [
            'file.required' => 'File Excel wajib diupload.',
            'file.mimes' => 'File harus berformat xlsx, xls, atau csv.',
            'file.max' => 'Ukuran file maksimal 5 MB.',
        ]);

        try {
            Excel::import(new AssetsImport, $request->file('file'));

            return redirect()->route('assets.import.page')
                ->with('success', 'Data aset berhasil diimport.');

        } catch (\Throwable $e) {
            return redirect()->route('assets.import.page')
                ->with('error', 'Import gagal: ' . $e->getMessage());
        }
    }
    public function template()
    {
        $filePath = public_path('templates/template_import_aset.xlsx');

        if (!file_exists($filePath)) {
            abort(404, 'File template tidak ditemukan.');
        }

        return response()->download($filePath, 'template_import_aset_terbaru.xlsx', [
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }

}
