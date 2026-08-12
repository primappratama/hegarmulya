<style>
    .plist-row{
        display:flex;align-items:center;gap:16px;
        background:#fff;border:1px solid rgba(29,74,67,0.07);border-radius:10px;
        padding:16px 18px;margin-bottom:10px;
        transition:all .25s cubic-bezier(.4,0,.2,1);
    }
    .plist-row:hover{border-color:rgba(204,153,102,0.4);box-shadow:0 8px 20px -10px rgba(29,74,67,0.15);}
    .plist-icon{
        width:42px;height:42px;border-radius:10px;background:#F6E6D8;
        display:flex;align-items:center;justify-content:center;flex-shrink:0;
    }
    .plist-icon svg{width:20px;height:20px;stroke:#1D4A43;}
    .plist-body{flex:1;min-width:0;}
    .plist-title{font-size:14.5px;font-weight:600;color:#1D4A43;}
    .plist-sub{font-size:12.5px;color:#8a8a82;margin-top:2px;line-height:1.5;}
    .plist-meta{font-size:13px;font-weight:600;color:#669966;flex-shrink:0;}
    .plist-actions{display:flex;gap:6px;opacity:0;transition:opacity .2s;flex-shrink:0;}
    .plist-row:hover .plist-actions{opacity:1;}
    .plist-btn{
        width:30px;height:30px;border-radius:7px;display:flex;align-items:center;justify-content:center;
        border:1px solid rgba(29,74,67,0.1);background:#fff;cursor:pointer;transition:all .2s;
    }
    .plist-btn:hover{background:#F6E6D8;}
    .plist-btn.danger:hover{background:#fee2e2;border-color:#fca5a5;}
    .plist-btn svg{width:14px;height:14px;}
    .plist-add-card{
        background:linear-gradient(135deg,#1D4A43,#123430);border-radius:10px;padding:24px;margin-bottom:20px;
        box-shadow:0 8px 24px -8px rgba(29,74,67,0.3);
    }
    .plist-add-card label{color:rgba(246,230,216,0.7);}
    .plist-add-card input, .plist-add-card textarea, .plist-add-card select{
        background:rgba(246,230,216,0.08);border:1px solid rgba(246,230,216,0.15);color:#F6E6D8;
    }
    .plist-add-card input::placeholder, .plist-add-card textarea::placeholder{color:rgba(246,230,216,0.35);}
    .plist-toggle{
        display:inline-flex;align-items:center;gap:8px;background:#1D4A43;color:#F6E6D8;
        padding:11px 20px;border-radius:8px;font-size:13.5px;font-weight:600;cursor:pointer;
        transition:all .25s;box-shadow:0 4px 12px -4px rgba(29,74,67,0.3);border:none;
    }
    .plist-toggle:hover{transform:translateY(-2px);box-shadow:0 8px 16px -4px rgba(29,74,67,0.35);}
    .plist-group-label{
        font-size:11.5px;font-weight:700;letter-spacing:.6px;text-transform:uppercase;color:#669966;
        margin:24px 0 12px;display:flex;align-items:center;gap:10px;
    }
    .plist-group-label::after{content:'';flex:1;height:1px;background:rgba(29,74,67,0.1);}
    .plist-icon-btn{
        width:30px;height:30px;border-radius:7px;display:flex;align-items:center;justify-content:center;
        border:1px solid rgba(29,74,67,0.1);background:#fff;cursor:pointer;
    }
</style>