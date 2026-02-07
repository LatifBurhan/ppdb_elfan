<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB | Elfan AI Academy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>
<style>
    /* Menghilangkan border default datatables agar lebih clean */
    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input {
        border-radius: 0.75rem;
        border: 1px solid #e2e8f0;
        padding: 0.5rem 1rem;
        outline: none;
    }

    table.dataTable.no-footer {
        border-bottom: 1px solid #f1f5f9 !important;
    }

    #pendaftaranTable_wrapper .dataTables_filter {
    margin-bottom: 2rem;
}

#pendaftaranTable_wrapper .dataTables_filter input {
    border: 1px solid #e2e8f0;
    border-radius: 0.75rem;
    padding: 0.6rem 1rem;
    font-size: 0.875rem;
    outline: none;
    transition: all 0.3s;
    width: 250px;
}

#pendaftaranTable_wrapper .dataTables_filter input:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
}

#pendaftaranTable_wrapper .dataTables_length select {
    border: 1px solid #e2e8f0;
    border-radius: 0.5rem;
    padding: 0.3rem 1.5rem 0.3rem 0.5rem;
}

/* Mempercantik Pagination */
.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: #2563eb !important;
    color: white !important;
    border: none !important;
    border-radius: 0.5rem !important;
}
</style>
<body class="bg-slate-50 antialiased font-sans">

    @auth
        @if (auth()->user()->role === 'admin' && request()->is('admin*'))
            @include('components.sidebar')
            <main class="sm:ml-72 min-h-screen">
                <div class="p-8">@yield('content')</div>
            </main>
        @else
            {{-- Landing page atau Dashboard Siswa tetap tampil full --}}
            @yield('content')
        @endif
    @else
        @yield('content')
    @endauth

    <script>
        $(document).ready(function() {
            $('#pendaftaranTable').DataTable({
                // Sesuaikan dengan bahasa Indonesia agar lebih user-friendly
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
                }
            });
        });
    </script>
</body>

</html>
