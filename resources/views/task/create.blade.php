<x-app-layout>
    <x-slot name="header">

        <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Project Name :') . $project->title  }}</h3>

        <h4 class="font-normal text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Task ')  }}
        </h4>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                    <form action="{{route('task.store', $project->id)}}" method="post" >
                        @csrf
                        @method('post')
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                Title  <span class="text-red-600" >(*)</span>
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  name="title" id="title" type="text" placeholder="Title" value="{{ old('title')  }}" >

                            @error('title')
                            <p class="text-red-600 text-xs italic">{{ $errors->first('title')   }}</p>
                            @enderror

                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description <span class="text-red-600" >(*)</span></label>

                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  id="description" name="description" >{{ old('description')  }}</textarea>

                            @error('description')
                            <p class="text-red-600 text-xs italic">{{ $errors->first('description')   }}</p>
                            @enderror

                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="deadline">
                                Deadline <span class="text-red-600" >(*)</span>
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  id="deadline" name="deadline"  type="date" value="{{ old('deadline')  }}" >

                            @error('deadline')
                            <p class="text-red-600 text-xs italic">{{ $errors->first('deadline')   }}</p>
                            @enderror

                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="deadline">
                                Priority
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  id="priority" name="priority"  type="number" >

                            @error('priority')
                            <p class="text-red-500 text-xs italic">{{ $errors->first('priority')   }}</p>
                            @enderror

                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'task-saved')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>

            </div>
        </div>
    </div>


</x-app-layout>
