<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <h1 class="text-3xl text-gray-900 font-bold">Users</h1>
        <div class="mt-4 overflow-x-auto">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="text-center">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Id</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Email</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Role</th>
                    </tr>
                </thead>

                <tbody class="text-center divide-y divide-gray-200">
                    <?php foreach ($data['users'] as $user): ?>
                        <tr class="odd:bg-gray-50">
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"><?= $user['id'] ?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?= $user['name'] ?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?= $user['email'] ?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">Kelinci Percobaan</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>