<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Approvals & Interviews') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50/50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Navigation -->
            <div class="flex items-center gap-8 border-b border-gray-200 mb-8">
                <a href="{{ route('applications.index') }}" 
                   class="pb-3 text-sm font-medium text-gray-500 hover:text-indigo-600 transition-colors">
                    My Applications
                </a>
                <a href="{{ route('applications.approvals') }}" 
                   class="pb-3 text-sm font-semibold text-indigo-600 border-b-2 border-indigo-600 transition-colors">
                    Application Approving & Interview Appointer
                </a>
            </div>

            <!-- Content -->
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Pending Approvals</h3>
                <p class="text-gray-500">This page will show applications waiting for your approval.</p>
            </div>
        </div>
    </div>
</x-app-layout>