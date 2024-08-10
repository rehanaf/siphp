<?php

class Flasher
{
    public static function setFlash($type, $subject, $message)
    {
        // Simpan pesan ke dalam sesi
        $_SESSION['flash'] = [
            'type' => $type,
            'subject' => $subject,
            'message' => $message
        ];
    }

    public static function flash()
    {
        // Ambil pesan dari sesi jika ada
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $type = $flash['type'] == 'success';
            echo '
                <div x-data="{ open: true }" x-show="open" class="z-40 fixed w-full left-1/2 -translate-x-1/2 max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <div role="alert" class="flex justify-between items-start rounded border-s-4 ' . ($type ? 'border-green-500 bg-green-50' : 'border-red-500 bg-red-50') . ' p-4">
                    <div><strong class="block font-medium '. ($type ? 'text-green-800' : 'text-red-800') . '">' . $flash['subject'] . '</strong>
                    
                    <p class="mt-2 text-sm ' . ($type ? 'text-green-700' : 'text-red-700') . '">
                        ' . $flash['message'] . '
                    </p></div>
                    <button @click="open = false" class="text-gray-500 hover:text-gray-600">
                        <span class="sr-only">Dismiss popup</span>

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-6 w-6"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    </div>
                </div>';
            unset($_SESSION['flash']);
        }

    }

    public static function has()
    {
        return isset($_SESSION['flash']);
    }
}
