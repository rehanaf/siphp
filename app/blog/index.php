<main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <!-- Your content -->
    <h1 class="text-3xl text-gray-900 font-bold">Blog</h1>
    <form action="<?= url('blog/store') ?>" method="post" class="mt-4 space-y-4">
        <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
        <input type="text" name="title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
        <textarea name="content" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required></textarea>
        <button type="submit" class="flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create Blog</button>
    </form>
    <h2 class="mt-12 text-2xl text-gray-900 font-bold">Look at this</h2>
    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach ($data['blog'] as $blog): ?>
            <a href="<?= url('blog/' . $blog['id']) ?>" target="_blank" class="block p-4 group md:p-6 border-3xl rounded-lg shadow-lg">
                <article class="flex justify-between">
                    <div>
                        <h3 class="items-center text-lg md:text-2xl group-hover:underline">
                            <?= $blog['title'] ?>
                        </h3>
                        <p class="mt-2 group-hover:underline"><?= $blog['author'] . ' ' . $blog['created_at'] ?></p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 mr-2 group-hover:translate-x-4 duration-200">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </article>
            </a>
        <?php endforeach; ?>
    </div>
</main>