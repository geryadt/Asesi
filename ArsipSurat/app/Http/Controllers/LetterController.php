<?php
namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LetterController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $letters = Letter::with('category')
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', "%$search%");
            })
            ->orderByDesc('archived_at')
            ->get();
        return view('letters.index', compact('letters', 'search'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('letters.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required',
            'file' => 'required|mimes:pdf|max:20480',
        ]);
        $filePath = $request->file('file')->store('letters', 'public');
        Letter::create([
            'number' => $request->number,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'file_path' => $filePath,
            'archived_at' => now(),
        ]);
        return redirect()->route('letters.index')->with('success', 'Data berhasil disimpan');
    }

    public function show(Letter $letter)
    {
        return view('letters.show', compact('letter'));
    }

    public function destroy(Letter $letter)
    {
        Storage::disk('public')->delete($letter->file_path);
        $letter->delete();
        return redirect()->route('letters.index')->with('success', 'Surat berhasil dihapus');
    }

    public function download(Letter $letter)
    {
        return Storage::disk('public')->download($letter->file_path);
    }
}
