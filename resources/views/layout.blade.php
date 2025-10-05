<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tugas CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /*Atur ukuran panah*/
    .pagination svg {
      width: 16px;   
      height: 16px;
    }

    /*teks sejajar dengan ikon */
    .pagination span {
      line-height: 1;
    }

    /*Sedikit jarak antar tombol pagination */
    .pagination li {
      margin: 0 2px;
    }
  </style>
</head>
<body class="bg-light p-4">
  <div class="container">
    @yield('content')
  </div>
</body>
</html>
