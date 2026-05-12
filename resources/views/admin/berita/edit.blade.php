@extends('admin.layouts.admin')
@section('title', 'Edit Berita')
@section('page_title', 'Edit Berita')
@section('breadcrumb', 'Berita / Edit')

@section('content')
<div class="max-w-4xl">
    <a href="{{ route('admin.berita.index') }}" class="text-sm text-gray-500 hover:text-green-700 mb-4 block">← Kembali</a>
    <div class="admin-card">
        <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf @method('PUT')

            <div>
                <label class="form-label">Judul Berita *</label>
                <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" class="form-input" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="form-label">Kategori *</label>
                    <select name="kategori_id" class="form-input" required>
                        @foreach($kategoris as $k)
                        <option value="{{ $k->id }}" {{ (old('kategori_id', $berita->kategori_id) == $k->id) ? 'selected' : '' }}>{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="form-label">Tanggal Publish</label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at', $berita->published_at?->format('Y-m-d\TH:i')) }}" class="form-input">
                </div>
            </div>

            @if($berita->gambar && file_exists(public_path('storage/'.$berita->gambar)))
            <div>
                <p class="form-label">Gambar Saat Ini</p>
                <img src="{{ asset('storage/'.$berita->gambar) }}" alt="" class="h-32 rounded-xl object-cover mb-2">
            </div>
            @endif
            <div>
                <label class="form-label">Ganti Gambar (opsional)</label>
                <input type="file" name="gambar" accept="image/*" class="form-input">
            </div>

            <div>
                <label class="form-label">Konten *</label>
                <textarea name="konten" id="editor" rows="12" class="form-input">{{ old('konten', $berita->konten) }}</textarea>
            </div>

            <div class="flex items-center gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', $berita->is_published) ? 'checked' : '' }} class="w-4 h-4 text-green-600 rounded">
                    <span class="text-sm font-medium text-gray-700">Publikasikan</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $berita->is_featured) ? 'checked' : '' }} class="w-4 h-4 text-yellow-500 rounded">
                    <span class="text-sm font-medium text-gray-700">⭐ Featured</span>
                </label>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="btn-primary">💾 Update Berita</button>
                <a href="{{ route('admin.berita.index') }}" class="btn-outline">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({ selector: '#editor', height: 400, menubar: false, branding: false,
    plugins: 'link lists image', toolbar: 'undo redo | bold italic | link | numlist bullist | image' });
</script>
@endpush
