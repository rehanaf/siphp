<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($data['title']) ? $data['title'] : 'Welcome !!' ?></title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="<?= url('assets/style.css') ?>">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>

<body class="min-h-full">
    <header class="bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:p-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="font-bold text-xl text-indigo-600">SiPHP</span>
                </a>
            </div>
            <div class="flex lg:flex-1 lg:justify-end">
                <?php if (isset($_SESSION['login'])): ?>
                    <a href="<?= url('users/logout') ?>" class="text-sm font-semibold leading-6 text-gray-900">Log out <span aria-hidden="true">&rarr;</span></a>
                <?php else: ?>
                    <a href="<?= url('users/login') ?>" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <?php Flasher::flash(); ?>
    <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex gap-6" aria-label="Tabs">
                <a
                    href="<?=url('dashboard')?>"
                    class="shrink-0 border-b-2 px-1 pb-4 text-sm font-medium <?=($data['page'] == 'dashboard' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700')?>">
                    Dashboard
                </a>

                <a
                    href="<?=url('users')?>"
                    class="shrink-0 border-b-2 px-1 pb-4 text-sm font-medium <?=($data['page'] == 'users' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700')?>">
                    Users
                </a>

                <a
                    href="<?=url('blog')?>"
                    class="shrink-0 border-b-2 px-1 pb-4 text-sm font-medium <?=($data['page'] == 'blog' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700')?>">
                    Blog
                </a>
            </nav>
        </div>
    </div>
