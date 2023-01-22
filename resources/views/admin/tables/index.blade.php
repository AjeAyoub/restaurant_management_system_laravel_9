
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.tables.create') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    <span class="text-2xl">+</span>
                  </a>
            </div>

            <table class="border-collapse table-auto w-full text-sm">
                <thead>
                  <tr>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Name</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Guest Number</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Status</th>
                    <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Location</th>
                  </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800">
                  @foreach ($tables as $table)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <td
                          class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          {{ $table->name }}
                      </td>
                      <td
                          class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                          {{ $table->guest_number }}
                      </td>
                      <td
                          class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                          {{ $table->status->name }}
                      </td>
                      <td
                          class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                          {{ $table->location->name }}
                      </td>
                      <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                          <div class="flex space-x-2">
                              <a href="{{ route('admin.tables.edit', $table->id) }}"
                                  class="px-4 py-2 bg-orange-500 hover:bg-orange-600 rounded-lg  text-white">Edit</a>
                              <form
                                  class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                  method="POST"
                                  action="{{ route('admin.tables.destroy', $table->id) }}"
                                  onsubmit="return confirm('Are you sure, You want to delete {{ $table->name }} ?' );">
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

