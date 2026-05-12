@extends('admin.layouts.admin')
@section('title', isset($user) ? 'Edit User' : 'Tambah Admin')
@section('page_title', isset($user) ? 'Edit User Admin' : 'Tambah User Admin')
@section('breadcrumb', 'Users / ' . (isset($user) ? 'Edit' : 'Tambah'))
@section('content')
<div class="max-w-2xl">
<a href="{{ route('admin.users.index') }}" class="text-sm text-gray-500 hover:text-green-700 mb-4 block">← Kembali</a>
<div class="admin-card">
<form action="{{ isset($user) ? route('admin.users.update', $user) : route('admin.users.store') }}"
      method="POST" class="space-y-5">
    @csrf
    @if(isset($user)) @method('PUT') @endif

    <div>
        <label class="form-label">Nama Lengkap *</label>
        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="form-input @error('name') border-red-400 @enderror" required>
        @error('name')<p class="form-error">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="form-label">Email *</label>
        <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="form-input @error('email') border-red-400 @enderror" required>
        @error('email')<p class="form-error">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="form-label">Role *</label>
        <select name="role" class="form-input" required>
            <option value="">-- Pilih Role --</option>
            <option value="superadmin" {{ old('role', $user->role ?? '') === 'superadmin' ? 'selected' : '' }}>Super Admin</option>
            <option value="admin" {{ old('role', $user->role ?? '') === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="editor" {{ old('role', $user->role ?? '') === 'editor' ? 'selected' : '' }}>Editor</option>
        </select>
    </div>

    <div>
        <label class="form-label">Password {{ isset($user) ? '(kosongkan jika tidak diganti)' : '*' }}</label>
        <input type="password" name="password" class="form-input @error('password') border-red-400 @enderror"
               {{ !isset($user) ? 'required' : '' }} placeholder="{{ isset($user) ? '••••••••' : 'Minimal 8 karakter' }}">
        @error('password')<p class="form-error">{{ $message }}</p>@enderror
    </div>

    @if(!isset($user))
    <div>
        <label class="form-label">Konfirmasi Password *</label>
        <input type="password" name="password_confirmation" class="form-input" required>
    </div>
    @endif

    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 text-sm text-yellow-800">
        ⚠️ Pastikan role yang diberikan sesuai. <strong>Super Admin</strong> memiliki akses penuh ke semua fitur.
    </div>

    <div class="flex gap-3 pt-2">
        <button type="submit" class="btn-primary">💾 {{ isset($user) ? 'Update User' : 'Buat User' }}</button>
        <a href="{{ route('admin.users.index') }}" class="btn-outline">Batal</a>
    </div>
</form>
</div>
</div>
@endsection
