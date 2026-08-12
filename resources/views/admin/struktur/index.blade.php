<x-app-layout>
    <x-slot name="header"><span>Struktur Pemerintahan</span></x-slot>

    <style>
        .stree-root{
            display:flex;align-items:center;gap:16px;
            background:linear-gradient(135deg,#1D4A43,#123430);border-radius:12px;
            padding:20px 24px;margin-bottom:20px;max-width:460px;
            box-shadow:0 8px 24px -8px rgba(29,74,67,0.35);
        }
        .stree-avatar{
            width:54px;height:54px;border-radius:50%;overflow:hidden;background:rgba(246,230,216,0.1);
            display:flex;align-items:center;justify-content:center;flex-shrink:0;border:2px solid rgba(204,153,102,0.4);
        }
        .stree-avatar img{width:100%;height:100%;object-fit:cover;}
        .stree-avatar svg{width:24px;height:24px;stroke:#CC9966;}
        .stree-name{font-size:15.5px;font-weight:700;color:#F6E6D8;}
        .stree-role{font-size:12px;color:#CC9966;font-weight:600;margin-top:2px;}
        .stree-actions{margin-left:auto;display:flex;gap:6px;}

        .stree-branch{margin-left:28px;position:relative;padding-left:24px;border-left:2px dashed rgba(29,74,67,0.15);margin-bottom:24px;}
        .stree-node{
            display:flex;align-items:center;gap:14px;background:#fff;border:1px solid rgba(29,74,67,0.08);
            border-radius:10px;padding:14px 16px;margin-bottom:10px;position:relative;
            box-shadow:0 4px 12px -6px rgba(29,74,67,0.1);transition:all .25s;
        }
        .stree-node:hover{border-color:rgba(204,153,102,0.4);transform:translateX(4px);}
        .stree-node::before{
            content:'';position:absolute;left:-24px;top:50%;width:22px;height:2px;background:rgba(29,74,67,0.15);
        }
        .stree-node-avatar{
            width:38px;height:38px;border-radius:50%;overflow:hidden;background:#F6E6D8;
            display:flex;align-items:center;justify-content:center;flex-shrink:0;
        }
        .stree-node-avatar img{width:100%;height:100%;object-fit:cover;}
        .stree-node-name{font-size:13.5px;font-weight:600;color:#1D4A43;}
        .stree-node-role{font-size:11.5px;color:#669966;font-weight:600;}
        .stree-node-actions{margin-left:auto;display:flex;gap:6px;opacity:0;transition:opacity .2s;}
        .stree-node:hover .stree-node-actions{opacity:1;}

        .stree-subbranch{margin-left:24px;margin-top:8px;padding-left:20px;border-left:1px dashed rgba(29,74,67,0.12);}
        .stree-subnode{font-size:12.5px;color:#5a5a56;padding:4px 0;display:flex;justify-content:space-between;align-items:center;}

        .plist-btn{
            width:28px;height:28px;border-radius:7px;display:flex;align-items:center;justify-content:center;
            border:1px solid rgba(29,74,67,0.1);background:#fff;cursor:pointer;
        }
        .plist-btn svg{width:13px;height:13px;}

        .plist-toggle{
            display:inline-flex;align-items:center;gap:8px;background:#1D4A43;color:#F6E6D8;
            padding:11px 20px;border-radius:8px;font-size:13.5px;font-weight:600;
            transition:all .25s;box-shadow:0 4px 12px -4px rgba(29,74,67,0.3);text-decoration:none;
        }
        .plist-toggle:hover{transform:translateY(-2px);box-shadow:0 8px 16px -4px rgba(29,74,67,0.35);}
    </style>

    @if (session('success'))<div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>@endif

    <div class="mb-6">
        <a href="{{ route('admin.struktur.create') }}" class="plist-toggle">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
            Tambah Jabatan
        </a>
    </div>

    @forelse ($struktur as $level1)
        <div>
            <div class="stree-root">
                <div class="stree-avatar">
                    @if ($level1->foto)<img src="{{ Storage::url($level1->foto) }}">@else<svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-6 8-6s8 2 8 6"/></svg>@endif
                </div>
                <div>
                    <div class="stree-name">{{ $level1->nama }}</div>
                    <div class="stree-role">{{ $level1->jabatan }}</div>
                </div>
                <div class="stree-actions">
                    <a href="{{ route('admin.struktur.edit', $level1) }}" class="plist-btn"><svg viewBox="0 0 24 24" fill="none" stroke="#CC9966" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.1 2.1 0 013 3L12 15l-4 1 1-4z"/></svg></a>
                    <form action="{{ route('admin.struktur.destroy', $level1) }}" method="POST" onsubmit="return confirm('Yakin hapus? Anak jabatan jadi tanpa induk.')">
                        @csrf @method('DELETE')
                        <button type="submit" class="plist-btn"><svg viewBox="0 0 24 24" fill="none" stroke="#e88" stroke-width="2"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6"/></svg></button>
                    </form>
                </div>
            </div>

            @if ($level1->children->isNotEmpty())
                <div class="stree-branch">
                    @foreach ($level1->children as $level2)
                        <div class="stree-node">
                            <div class="stree-node-avatar">
                                @if ($level2->foto)<img src="{{ Storage::url($level2->foto) }}">@endif
                            </div>
                            <div>
                                <div class="stree-node-name">{{ $level2->nama }}</div>
                                <div class="stree-node-role">{{ $level2->jabatan }}</div>
                            </div>
                            <div class="stree-node-actions">
                                <a href="{{ route('admin.struktur.edit', $level2) }}" class="plist-btn"><svg viewBox="0 0 24 24" fill="none" stroke="#1D4A43" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.1 2.1 0 013 3L12 15l-4 1 1-4z"/></svg></a>
                                <form action="{{ route('admin.struktur.destroy', $level2) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="plist-btn"><svg viewBox="0 0 24 24" fill="none" stroke="#c0392b" stroke-width="2"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2m3 0v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6"/></svg></button>
                                </form>
                            </div>
                        </div>

                        @if ($level2->children->isNotEmpty())
                            <div class="stree-subbranch">
                                @foreach ($level2->children as $level3)
                                    <div class="stree-subnode">
                                        <span>{{ $level3->nama }} &mdash; {{ $level3->jabatan }}</span>
                                        <span class="flex gap-2">
                                            <a href="{{ route('admin.struktur.edit', $level3) }}" style="color:#1D4A43;">Edit</a>
                                            <form action="{{ route('admin.struktur.destroy', $level3) }}" method="POST" onsubmit="return confirm('Yakin hapus?')" style="display:inline;">
                                                @csrf @method('DELETE')
                                                <button type="submit" style="color:#c0392b;">Hapus</button>
                                            </form>
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    @empty
        <p class="text-gray-400 text-sm italic">Belum ada data struktur pemerintahan.</p>
    @endforelse
</x-app-layout>