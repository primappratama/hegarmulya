<style>
    .pform-wrap{max-width:640px;}
    .pform-card{
        background:#fff;border-radius:14px;overflow:hidden;
        border:1px solid rgba(29,74,67,0.07);
        box-shadow:0 8px 24px -12px rgba(29,74,67,0.15);
    }
    .pform-header{
        background:linear-gradient(135deg,#1D4A43,#123430);padding:22px 28px;
        display:flex;align-items:center;gap:12px;
    }
    .pform-header-icon{
        width:38px;height:38px;border-radius:10px;background:rgba(246,230,216,0.1);
        display:flex;align-items:center;justify-content:center;flex-shrink:0;
    }
    .pform-header-icon svg{width:19px;height:19px;stroke:#CC9966;}
    .pform-header-title{font-size:15px;font-weight:700;color:#F6E6D8;}
    .pform-header-sub{font-size:11.5px;color:rgba(246,230,216,0.55);margin-top:1px;}
    .pform-body{padding:28px;}

    .pform-field{margin-bottom:18px;}
    .pform-label{display:block;font-size:12.5px;font-weight:600;color:#1D4A43;margin-bottom:6px;letter-spacing:.1px;}
    .pform-input, .pform-body select, .pform-body textarea{
        width:100%;padding:10px 14px;font-size:13.5px;border-radius:9px;
        border:1px solid rgba(29,74,67,0.15);transition:all .2s;background:#fdfbf9;
    }
    .pform-input:focus, .pform-body select:focus, .pform-body textarea:focus{
        outline:none;border-color:#CC9966;box-shadow:0 0 0 3px rgba(204,153,102,0.15);background:#fff;
    }
    .pform-hint{font-size:11px;color:#9a9a92;margin-top:5px;}
    .pform-grid-2{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
    .pform-grid-3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:14px;}

    .pform-photo{
        border:2px dashed rgba(29,74,67,0.15);border-radius:12px;padding:20px;
        text-align:center;background:#faf6f1;position:relative;transition:all .2s;
    }
    .pform-photo:hover{border-color:#CC9966;background:#f6ede0;}
    .pform-photo svg{width:26px;height:26px;stroke:#CC9966;margin:0 auto 8px;}
    .pform-photo-text{font-size:12.5px;color:#8a8a82;}
    .pform-photo input[type="file"]{position:absolute;inset:0;opacity:0;cursor:pointer;}
    .pform-preview{width:100%;border-radius:10px;margin-bottom:14px;max-height:180px;object-fit:cover;}

    .pform-actions{display:flex;gap:10px;padding-top:18px;border-top:1px solid rgba(29,74,67,0.07);margin-top:6px;}
    .pform-submit{
        background:#1D4A43;color:#F6E6D8;padding:11px 26px;border-radius:9px;
        font-size:13.5px;font-weight:600;border:none;cursor:pointer;
        transition:all .25s;box-shadow:0 4px 12px -4px rgba(29,74,67,0.3);
    }
    .pform-submit:hover{transform:translateY(-2px);box-shadow:0 8px 18px -4px rgba(29,74,67,0.35);}
    .pform-cancel{
        padding:11px 22px;border-radius:9px;font-size:13.5px;font-weight:500;
        border:1px solid rgba(29,74,67,0.15);color:#5a5a56;text-decoration:none;
        display:inline-flex;align-items:center;transition:all .2s;
    }
    .pform-cancel:hover{background:#faf6f1;}
    .pform-error{color:#c0392b;font-size:11.5px;margin-top:5px;}
</style>