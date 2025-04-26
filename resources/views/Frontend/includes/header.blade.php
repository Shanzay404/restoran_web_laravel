<div class="container text-center my-5 pt-5 pb-4">
    <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $PageTitle }}</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center text-uppercase">
            <li class="breadcrumb-item"><a href="{{ route('index.view') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item text-white active" aria-current="page">{{ $title }}</li>
        </ol>
    </nav>
</div>