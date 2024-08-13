<main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <!-- Your content -->
    <h1 class="text-3xl text-gray-900 font-bold"><?= $data['blog']['title'] ?></h1>
    <p class="mt-4"><?= $data['blog']['author'] . ' ' . $data['blog']['created_at'] ?></p>
    <hr class="mt-4">
    <p class="mt-4">
        <pre class="font-sans"><?= $data['blog']['content'] ?></pre>
    </p>
</main>