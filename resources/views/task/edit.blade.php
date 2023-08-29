<x-app-layout>
    <x-slot name="header">

        <h4 class="font-normal text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Task ')  }}

        </h4>
        <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{route('project.show', $task->project->id)}}" >Go Back</a>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <form action="{{route('task.update', $task->id)}}" method="post" >
                    @csrf
                    @method('post')
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                            Title  <span class="text-red-600" >(*)</span>
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  name="title" id="title" type="text" placeholder="Title" value="{{ $task->title  }}" >

                        @error('title')
                        <p class="text-red-600 text-xs italic">{{ $errors->first('title')   }}</p>
                        @enderror

                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description <span class="text-red-600" >(*)</span></label>

                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  id="description" name="description" >{{ $task->description  }}</textarea>

                        @error('description')
                        <p class="text-red-600 text-xs italic">{{ $errors->first('description')   }}</p>
                        @enderror

                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="deadline">
                            Deadline <span class="text-red-600" >(*)</span>
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  id="deadline" name="deadline"  type="date" value="{{  \Carbon\Carbon::parse( $task->deadline )->format('Y-m-d')  }}" >

                        @error('deadline')
                        <p class="text-red-600 text-xs italic">{{ $errors->first('deadline')   }}</p>
                        @enderror

                    </div>


                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="deadline">
                            Priority
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  id="priority" name="priority"  type="number" value="{{ $task->priority  }}" >

                        @error('priority')
                        <p class="text-red-500 text-xs italic">{{ $errors->first('priority')   }}</p>
                        @enderror

                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                            Status
                        </label>

                        <select name="status" id="status">

                            @foreach(\App\Models\Task::getStatusesLabelArr() as  $key => $text)
                                <option value="{{$key}}" {{  $task->status == $key ? 'selected' : ''  }} >{{ $text  }}</option>
                            @endforeach

                        </select>

                        @error('priority')
                        <p class="text-red-500 text-xs italic">{{ $errors->first('priority')   }}</p>
                        @enderror

                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                        @if (session('status') === 'task-updated')
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
