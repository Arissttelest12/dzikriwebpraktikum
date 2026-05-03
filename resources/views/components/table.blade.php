<div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-lg rounded-xl border border-gray-200 dark:border-gray-700">
    
    <table class="min-w-full text-sm text-gray-700 dark:text-gray-300">
        
        <!-- HEADER -->
        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
            <tr class="text-center uppercase text-xs font-bold tracking-wider">
                {{ $header }}
            </tr>
        </thead>

        <!-- BODY -->
        <tbody class="text-center  divide-y divide-gray-200 dark:divide-gray-700">
            {{ $slot }}
        </tbody>

    </table>
</div>