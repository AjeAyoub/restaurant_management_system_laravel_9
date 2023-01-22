
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.menus.create') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    <span class="text-2xl">+</span>

                  </a>
            </div>
            <table class="border-collapse table-auto w-full text-sm">
                <thead>
                  <tr>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Name</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Image</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">price</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Description</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Action</th>
                  </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800">
                  @foreach ($menus as $menu)
                  <tr>

                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                      {{ $menu->name }}
                    </td>

                   <td  class="border-b border-slate-100 dark:border-slate-700 p-4  ">
                    <img  class="w-16 h-16 rounded" src="{{ Storage::url($menu->image) }}" />
                  </td>

                  <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                    {{ $menu->price }}
                  </td>

                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                      {{ $menu->description }}
                    </td>

                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                      <div class="flex space-x-2">
                        <a href="{{ route('admin.menus.edit', $menu->id) }}" 
                          class="py-2 px-4 bg-orange-500 hover:bg-orange-600 text-white rounded-lg">Edit
                        </a>
                          <form action="{{ route('admin.menus.destroy',$menu->id) }}" 
                                method="post"
                                class="py-2 px-4 bg-red-500 hover:bg-red-600 text-white rounded-lg"
                                onsubmit= "return confirm('are you sure you want to delete {{ $menu->name }}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                          </form>
                      </div>
                    </td>

                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</x-admin-layout>

