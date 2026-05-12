@extends('admin.layouts.admin')
@section('title', 'Manajemen User')
@section('page_title', 'Manajemen User')
@section('breadcrumb', 'Users')
@section('content')

<div class="flex justify-between items-center mb-6">
    <p class="text-sm text-gray-500">Kelola akun admin yang dapat mengakses panel</p>
    <a href="{{ route('admin.users.create') }}" class="btn-primary">➕ Tambah Admin</a>
</div>

<div class="admin-card">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-gray-100">
                <th class="text-left px-4 py-3 text-gray-600">Nama</th>
                <th class="text-left px-4 py-3 text-gray-600">Email</th>
                <th class="text-left px-4 py-3 text-gray-600">Role</th>
                <th class="text-left px-4 py-3 text-gray-600">Bergabung</th>
                <th class="text-right px-4 py-3 text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $u)
            <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                <td class="px-4 py-3">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 bg-gradient-to-br from-green-400 to-green-700 rounded-full flex items-center justify-center text-white font-bold text-sm">
                            {{ strtoupper(substr($u->name, 0, 1)) }}
                        </div>
                        <span class="font-medium text-gray-800">{{ $u->name }}</span>
                        @if($u->id === auth()->id())
                        <span class="text-xs bg-green-100 text-green-600 px-2 py-0.5 rounded-full">Anda</span>
                        @endif
                    </div>
                </td>
                <td class="px-4 py-3 text-gray-500">{{ $u->email }}</td>
                <td class="px-4 py-3">
                    <span class="text-xs {{ $u->role === 'superadmin' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }} px-2 py-0.5 rounded-full font-medium">
                        {{ ucfirst($u->role) }}
                    </span>
                </td>
                <td class="px-4 py-3 text-gray-400 text-xs">{{ $u->created_at->format('d M Y') }}</td>
                <td class="px-4 py-3 text-right">
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.users.edit', $u) }}" class="text-green-600 hover:text-green-800 text-xs font-medium">✏️ Edit</a>
                        @if($u->id !== auth()->id())
                        <form action="{{ route('admin.users.destroy', $u) }}" method="POST" onsubmit="return confirm('Hapus user ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-500 hover:text-red-700 text-xs">🗑️ Hapus</button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center py-10 text-gray-400">Tidak ada user</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4">{{ $users->links() }}</div>
</div>
@endsection
