
<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use RuntimeException;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Throwable;

class MusicController extends Controller
{
    public function index(Request $request): View
    {
        $songs = Song::query()
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return view('music', compact('songs'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:160'],
            'artist' => ['required', 'string', 'max:160'],
            'album' => ['nullable', 'string', 'max:160'],
            'genre' => ['nullable', 'string', 'max:80'],

            'audio' => [
                'required',
                'file',
                'mimes:mp3',
                'extensions:mp3',
                'max:30720',
            ],

            'cover' => [
                'nullable',
                'file',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],
        ]);

        $audioPath = null;
        $coverPath = null;

        try {
            $audioPath = $request->file('audio')
                ->store('music/audio', 'local');

            if (!$audioPath) {
                throw new RuntimeException('Audio storage failed.');
            }

            if ($request->hasFile('cover')) {
                $coverPath = $request->file('cover')
                    ->store('music/covers', 'local');

                if (!$coverPath) {
                    throw new RuntimeException('Cover storage failed.');
                }
            }

            Song::create([
                'user_id' => $request->user()->id,
                'title' => $validated['title'],
                'artist' => $validated['artist'],
                'album' => $validated['album'] ?? null,
                'genre' => $validated['genre'] ?? null,
                'audio_path' => $audioPath,
                'cover_path' => $coverPath,
                'size_bytes' => $request->file('audio')->getSize(),
            ]);

        } catch (Throwable $exception) {
            Storage::disk('local')->delete(
                array_filter([$audioPath, $coverPath])
            );

            throw $exception;
        }

        return redirect()
            ->route('music')
            ->with('success', 'Song uploaded successfully!');
    }

    public function audio(
        Request $request,
        Song $song
    ): BinaryFileResponse {
        $this->authorizeSong($request, $song);

        abort_unless(
            Storage::disk('local')->exists($song->audio_path),
            404
        );

        return response()->file(
            Storage::disk('local')->path($song->audio_path),
            [
                'Content-Type' => 'audio/mpeg',
                'Cache-Control' => 'private, no-store',
                'X-Content-Type-Options' => 'nosniff',
            ]
        );
    }

    public function cover(
        Request $request,
        Song $song
    ): BinaryFileResponse {
        $this->authorizeSong($request, $song);

        abort_unless($song->cover_path, 404);

        $disk = Storage::disk('local');

        abort_unless($disk->exists($song->cover_path), 404);

        return response()->file(
            $disk->path($song->cover_path),
            [
                'Content-Type' =>
                    $disk->mimeType($song->cover_path)
                    ?: 'image/jpeg',

                'Cache-Control' => 'private, max-age=3600',
                'X-Content-Type-Options' => 'nosniff',
            ]
        );
    }

    public function destroy(
        Request $request,
        Song $song
    ): RedirectResponse {
        $this->authorizeSong($request, $song);

        $paths = array_filter([
            $song->audio_path,
            $song->cover_path,
        ]);

        $song->delete();

        Storage::disk('local')->delete($paths);

        return redirect()
            ->route('music')
            ->with('success', 'Song deleted successfully.');
    }

    private function authorizeSong(
        Request $request,
        Song $song
    ): void {
        abort_unless(
            $song->user_id === (int) $request->user()->id,
            404
        );
    }
}
