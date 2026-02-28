<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'MyApotek' ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="bg-gray-100">

    <?= $this->include('components/navbar') ?>
    
    <div class="flex">
        <?= $this->include('components/sidebar') ?>

        <main class="flex-1 p-6">
            <?= $this->renderSection('content') ?>
        </main>
    </div>

    <?= $this->include('components/footer') ?>

</body>
</html>