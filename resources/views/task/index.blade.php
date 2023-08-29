<x-app-layout>
    <x-slot name="header">

        <div class="inline-flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Projects') }}
            </h2>
            <a class="px-6 py-3 text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:underline hover:text-blue-200" href="{{route('project.create')}}" >Add New Project</a>
        </div>

    </x-slot>

    <div class="py-12">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tasks
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($projects as $p)

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $p->title  }}
                                </th>
                                <td>
                                    <span class="text-blue-500">Todo : {{ $p->pendingTasks()->count()  }}</span>
                                    <span class="text-yellow-300" >In-Progress : {{ $p->inProgressTasks()->count()  }}</span>
                                    <span class="text-lime-800" >Done : {{ $p->doneTasks()->count()  }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <x-nav-link href="{{ route('project.show', $p->id)  }}">View</x-nav-link>
                                    <x-nav-link href="{{ route('project.edit', $p->id)  }}">Edit</x-nav-link>

                                    <form action="{{route('project.destroy', $p->id)}}" class="inline-flex" method="post">
                                        @method('delete')
                                        @csrf
                                        <x-danger-button >{{ __('Delete Project') }}</x-danger-button>
                                    </form>

                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
