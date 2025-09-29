<?php


namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
  

    /**
     * Display a listing of the resource (Admin Dashboard).
     */
    public function index()
    {
        $documents = Document::latest()->paginate(10);
        return view('dashboard', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'document' => 'required|file|mimes:pdf,doc,docx,xlsx,xls,txt,zip|max:10240', // 10MB max
            'is_published' => 'nullable|boolean',
        ]);

        $path = $request->file('document')->store('documents', 'public');
        $originalName = $request->file('document')->getClientOriginalName();

        Document::create([
            'title' => $request->title,
            'file_path' => $path,
            'file_name' => $originalName,
            'is_published' => $request->has('is_published'),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('documents.index')
                         ->with('success', 'Document uploaded successfully.');
    }

    // You can skip 'show' for this simple system.

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'document' => 'nullable|file|mimes:pdf,doc,docx,xlsx,xls,txt,zip|max:10240',
            'is_published' => 'nullable|boolean',
        ]);

        $document->title = $request->title;
        $document->is_published = $request->has('is_published');

        if ($request->hasFile('document')) {
            // Delete old file
            Storage::disk('public')->delete($document->file_path);

            // Upload new file
            $path = $request->file('document')->store('documents', 'public');
            $document->file_path = $path;
            $document->file_name = $request->title;
        }

        $document->save();

        return redirect()->route('documents.index')
                         ->with('success', 'Document updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return redirect()->route('documents.index')
                         ->with('success', 'Document deleted successfully.');
    }

    // --- Public Download Method ---
     public function download(Document $document)
    {
        // The check for 'is_published' remains crucial
        if (!$document->is_published) {
             abort(404); // Not found or unauthorized
        }

        // 1. Get the file extension from the stored file path
        $extension = pathinfo($document->file_path, PATHINFO_EXTENSION);

        // 2. Sanitize the title to create a safe filename slug
        // Replace spaces with hyphens, remove special characters, and convert to lowercase.
        $safeTitle = \Illuminate\Support\Str::slug($document->title, '-');

        // 3. Combine the sanitized title and the extension
        $downloadFileName = $safeTitle . '.' . $extension;

        // Use Storage::download, passing the internal file path and the desired external download name
        return Storage::disk('public')->download($document->file_path, $downloadFileName);
    }
}
