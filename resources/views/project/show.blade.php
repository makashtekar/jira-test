<x-app-layout>
    <x-slot name="header">

        <div class="">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Project : {{ $project->title }}
            </h2>
            <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{route('project.edit', $project->id)}}" >Update Project</a>
            <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{route('task.create', $project->id)}}" >Add Task</a>
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

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg py-2.5 ">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deadline
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Priority
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($project->tasks as $task)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $task->title  }}
                            </th>

                            <td class="px-6 py-4 {{ $task->status_color  }} "  >
                                {{ $task->status_label  }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $task->deadline_human  }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $task->created_at_human  }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $task->priority  }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('task.edit', $task->id)  }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form action="{{route('task.destroy', $task->id)}}" class="inline-flex" method="post">
                                    @method('delete')
                                    @csrf
                                    <x-danger-button >{{ __('Delete Task') }}</x-danger-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>


    </div>
</x-app-layout>
