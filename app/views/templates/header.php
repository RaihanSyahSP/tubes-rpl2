<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= SITE_NAME ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/theme.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* inter-300 - latin */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: local(''),
                url('fonts/inter-v12-latin-300.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('fonts/inter-v12-latin-300.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }

        /* inter-400 - latin */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local(''),
                url('fonts/inter-v12-latin-regular.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('fonts/inter-v12-latin-regular.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: local(''),
                url('fonts/inter-v12-latin-500.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('fonts/inter-v12-latin-500.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: local(''),
                url('fonts/inter-v12-latin-700.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('fonts/inter-v12-latin-700.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }
    </style>
</head>

<body class="bg-dark text-white mt-0" data-bs-spy="scroll" data-bs-target="#navScroll">

    <nav id="navScroll" class="navbar navbar-dark bg-black fixed-top px-vw-5" tabindex="0">
        <div class="container">
            <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center" href=<?= BASEURL; ?>>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-stack" viewBox="0 0 16 16">
                    <path d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z" />
                    <path d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z" />
                </svg>
                <span class="ms-md-1 mt-1 fw-bolder me-md-5">Mobazeer</span>
            </a>

            <div class="d-flex justify-content-end w-full align-items-center">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 list-group list-group-horizontal">
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="<?= BASEURL; ?>/index" aria-label="Homepage">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="<?= BASEURL; ?>/discovery" aria-label="A sample content page">
                            Discovery
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="<?= BASEURL; ?>/about" aria-label="A system message page">
                            About
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>