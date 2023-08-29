<x-app-layout>
    <x-slot name="header">

        <div class="inline-flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Project : {{ $project->title }}
            </h2>
            <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{route('project.edit', $project->id)}}" >Update Project</a>
            <a class="text-blue-500 hover:text-gray-400 no-underline" href="{{route('task.create', $project->id)}}" >Add Task</a>

        </div>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between ">

                    <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Todo</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $project->pendingTasks()->count()  }}</p>
                    </a>

                    <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">In-progress</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $project->inProgressTasks()->count()  }}</p>
                    </a>

                    <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Done</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $project->doneTasks()->count()  }}</p>
                    </a>

            </div>
        </div>
    </div>
</x-app-layout>
