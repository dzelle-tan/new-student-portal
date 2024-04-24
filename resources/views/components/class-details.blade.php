<div>
    <div x-data="{ showPrivacyPolicy: false }">
        <!-- Button to open the privacy policy modal -->
            <div class="flex">
                <p class="w-16 pr-4 text-sm border-r-2">{{ $date }}</p>
                <div class="pl-4 hover:text-secondary" @click="showPrivacyPolicy = true">
                    <h3 class="font-bold">{{ $heading }}</h3>
                    <p class="text-sm">{{ $description }}</p>
                </div>
            </div>

        <!-- Privacy Policy Modal -->
        <div x-show="showPrivacyPolicy" class="fixed inset-0 z-10 flex items-center justify-center">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        <div class="relative w-full max-w-screen-md m-4 overflow-hidden bg-white rounded-lg shadow-xl" x-transition:enter="transition ease-out duration-300 transform opacity-0 scale-95" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200 transform opacity-100 scale-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" x-cloak>
            <!-- Modal panel -->
            <div class="px-6 py-4">
                <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $heading }}</h3>
            </div>
            <div class="max-w-screen-md p-6 overflow-y-auto prose" style="max-height: 70vh; background-color: #fff; border: 1px solid #e2e8f0; border-radius: 0.375rem; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);">
                <h2 class="mb-4 text-2xl font-bold">Free Flu Shot Announcement!</h2>
                <p>We are thrilled to announce that the PLM Clinic is offering FREE flu shots to all members of our community! As we approach the flu season, it's crucial to prioritize our health and well-being. Getting a flu shot is a simple yet effective way to protect yourself and those around you from the flu virus.</p>

                <h3 class="mb-2 text-lg font-semibold">Details:</h3>
                <ul class="mb-4 ml-6 list-disc">
                    <li><strong>What:</strong> Free Flu Shot</li>
                    <li><strong>Where:</strong> PLM Clinic</li>
                    <li><strong>Why:</strong> Protect yourself from the flu virus</li>
                    <li><strong>When:</strong> [Specify Date and Time]</li>
                </ul>

                <p>Take a proactive step towards a healthier you by availing of this complimentary flu shot. Our team of experienced healthcare professionals will be on-site to administer the vaccinations and provide information about the importance of flu immunization.</p>

                <h3 class="mb-2 text-lg font-semibold">How to Participate:</h3>
                <ol class="mb-4 ml-6 list-decimal">
                    <li>Visit the PLM Clinic during the specified date and time.</li>
                    <li>Fill out a brief registration form upon arrival.</li>
                    <li>Receive your free flu shot from our dedicated medical staff.</li>
                </ol>

                <p>Your health is our priority, and we encourage everyone to take advantage of this opportunity. Let's work together to promote a flu-free and resilient community.</p>
            </div>
            <div class="flex flex-row justify-end gap-4 p-4 px-4 py-3 bg-gray-50 sm:px-6 align-items">
                <button @click="showPrivacyPolicy = false" type="button" class="inline-flex justify-center px-4 py-2 text-base font-medium text-white bg-black border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:w-auto sm:text-sm"> Close </button>
            </div>
        </div>
        </div>
    </div>
</div>