<style>
    .pgrid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;}
    .pgrid-card{
        background:#fff;border-radius:12px;overflow:hidden;
        border:1px solid rgba(29,74,67,0.07);
        box-shadow:0 4px 16px -8px rgba(29,74,67,0.10);
        transition:all .3s cubic-bezier(.4,0,.2,1);
    }
    .pgrid-card:hover{transform:translateY(-4px);box-shadow:0 16px 32px -12px rgba(29,74,67,0.2);border-color:rgba(204,153,102,0.35);}
    .pgrid-photo{aspect-ratio:4/3;background:#F6E6D8;overflow:hidden;position:relative;}
    .pgrid-photo img{width:100%;height:100%;object-fit:cover;transition:transform .4s;}
    .pgrid-card:hover .pgrid-photo img{transform:scale(1.06);}
    .pgrid-photo-empty{width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:#CC9966;}
    .pgrid-photo-empty svg{width:28px;height:28px;opacity:.5;}
    .pgrid-body{padding:14px 16px;}
    .pgrid-tag{font-size:10.5px;font-weight:700;letter-spacing:.5px;text-transform:uppercase;color:#669966;}
    .pgrid-title{font-size:14px;font-weight:600;color:#1D4A43;margin-top:4px;line-height:1.3;}
    .pgrid-sub{font-size:12px;color:#9a9a92;margin-top:3px;}
    .pgrid-actions{display:flex;justify-content:space-between;align-items:center;margin-top:10px;padding-top:10px;border-top:1px solid rgba(29,74,67,0.06);}
    .pgrid-actions a, .pgrid-actions button{font-size:11.5px;font-weight:600;transition:color .2s;}

    .plist-group-label{
        font-size:11.5px;font-weight:700;letter-spacing:.6px;text-transform:uppercase;color:#669966;
        margin:24px 0 12px;display:flex;align-items:center;gap:10px;
    }
    .plist-group-label:first-child{margin-top:0;}
    .plist-group-label::after{content:'';flex:1;height:1px;background:rgba(29,74,67,0.1);}
    .plist-group-count{
        background:#F6E6D8;color:#1D4A43;font-size:10.5px;font-weight:700;
        padding:2px 9px;border-radius:20px;
    }

    .plist-toggle{
        display:inline-flex;align-items:center;gap:8px;background:#1D4A43;color:#F6E6D8;
        padding:11px 20px;border-radius:8px;font-size:13.5px;font-weight:600;cursor:pointer;
        transition:all .25s;box-shadow:0 4px 12px -4px rgba(29,74,67,0.3);text-decoration:none;
    }
    .plist-toggle:hover{transform:translateY(-2px);box-shadow:0 8px 16px -4px rgba(29,74,67,0.35);}

    @media(max-width:1100px){.pgrid{grid-template-columns:repeat(3,1fr);}}
    @media(max-width:700px){.pgrid{grid-template-columns:repeat(2,1fr);}}
</style>