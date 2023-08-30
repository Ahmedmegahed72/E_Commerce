<x-app-layout>
    <style>
        .search_btn {
            padding: 8px 16px;
            background-color: #DAC0A3;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search_btn:hover {
            background-color: #4682A9;

        }

        .category-fieldset {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            color: #000;
        }

        .search_bar {
            width: 100%;
            margin: 0 auto;
            padding: 10px;
            color: #000;
            border-radius: 10px;
        }

        .category-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 2px solid #ddd;
            background-color: #f9f9f9;
        }

        .category-table th,
        .category-table td {
            padding: 10px;
            text-align: center;
        }

        .category-table th {
            background-color: #333;
            color: #000;
        }

        .category-table td {
            border-bottom: 1px solid #EADBC8;
        }

        .view-button {
            padding: 8px 16px;
            background-color: #DAC0A3;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .view-button:hover {
            background-color: #4682A9;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <fieldset class="category-fieldset">
                        <legend style="color: #fff">Categories</legend>
                        <div style="margin-bottom: 20px">
                            <form action="{{ route('categories.search') }}" method="GET">
                                <div style="margin-bottom: 20px">
                                    <input type="text" name="query" id="search-bar" class="search_bar"
                                        placeholder="Search category..."><br><br>
                                    <button type="submit" class="search_btn">Search</button>
                                </div>
                            </form>
                        </div>
                        @if ($categories->count() > 0)
                            <table class="category-table">
                                <thead>
                                    <tr>
                                        <th>Category Id</th>
                                        <th>Category Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>
                                                <form action="{{ route('category.show', ['id' => $category->id]) }}">
                                                    <button class="view-button">View</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p style="color: red">No categories found.</p>
                        @endif
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
