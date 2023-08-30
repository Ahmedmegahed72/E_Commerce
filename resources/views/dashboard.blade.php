<x-app-layout>
    <style>
        .category-fieldset {
            width: 95%;
            margin: 0 auto;
            padding: 20px;
            color: #000;
        }

        form {
            text-align: center;
        }

        .img {
            width: 450px;
            height: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        h2 {
            color: #FFFFFF;
        }

        .view-button {
            padding: 8px 16px;
            background-color: #4682A9;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .view-button:hover {
            background-color: #DAC0A3;
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
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <fieldset class="category-fieldset">
                        <div style="margin-bottom: 20px">
                            <form action=" {{ route('category.index') }} " method="GET">
                                <div style="margin-bottom: 20px ">
                                    <h2>Find the perfect product for you today!</h2>
                                    <hr><br>
                                    <img class="img" src="\assets\img\shopping.png" alt="E Commerece Image">
                                </div>
                                <div style="margin-bottom: 20px">
                                    <button class="view-button" type="submit">View Categories</button>
                                </div>

                            </form>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
