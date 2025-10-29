@extends('admin.layouts.app')

@section('content')
<style>
    /* ===== Styling Basic ===== */
    .detail-container {
        background: #ffffff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border: 1px solid #e9ecef;
    }

    /* Tabs style */
    .nav-tabs .nav-link {
        border: none;
        color: #6c757d;
        font-weight: 500;
        padding: 10px 20px;
    }

    .nav-tabs .nav-link.active {
        color: #0d6efd;
        background-color: #eef5ff;
        border-radius: 8px;
        font-weight: 600;
    }

    .nav-tabs {
        margin-bottom: 15px;
        border-bottom: 2px solid #dee2e6;
    }

    .tab-pane {
        animation: fadeEffect 0.3s ease-in-out;
    }

    @keyframes fadeEffect {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* Form style */
    .form-control, .form-select {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 8px;
    }

    .form-control:focus, .form-select:focus {
