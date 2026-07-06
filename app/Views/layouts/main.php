<!DOCTYPE html>
<html lang="id">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?= esc($title ?? 'NexSoft Commerce | Digital Software Solution') ?></title>

  <meta name="description"
    content="<?= esc($meta_description ?? 'NexSoft Commerce menyediakan software original, cloud solutions, cyber security, PDF solutions, dan layanan konsultasi IT.') ?>">

  <meta name="keywords"
    content="<?= esc($meta_keywords ?? 'software original, microsoft 365, adobe, nitro pdf, cyber security') ?>">

  <meta name="author" content="NexSoft Commerce">

  <link rel="icon" href="<?= base_url('favicon.ico') ?>">

  <!-- Tailwind -->

  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font -->

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  <!-- Font Awesome -->

  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

  <style>
    html {

      scroll-behavior: smooth;

    }

    body {

      font-family: 'Inter', sans-serif;

      background: #fff;

      color: #111827;

    }
  </style>

  <?= $this->renderSection('styles') ?>

</head>

<body>

  <?= $this->renderSection('content') ?>

  <?= $this->renderSection('scripts') ?>

</body>

</html>