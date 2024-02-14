<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PhilRice E-Forms</title>

    {{-- Include compiled css to start using Tailwind Utility Classes --}}
    @vite('resources/css/app.css')

    {{-- Boxicons --}}
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>

    {{-- Hero Section --}}
    <section class="relative bg-[url(https://upload.wikimedia.org/wikipedia/commons/5/5e/09196jfPhilippine_Rice_Research_Institute_Fields_Mu%C3%B1oz_Nueva_Ecijafvf_10.JPG)] bg-cover bg-center bg-no-repeat">
        {{-- Transparent Gradient Overlay --}}
        <div class="absolute inset-0 bg-white/75 sm:bg-transparent sm:from-white/95 sm:to-white/25 ltr:sm:bg-gradient-to-r rtl:sm:bg-gradient-to-l"></div>

        <div class="relative mx-auto max-w-screen-xl px-4 py-40"></div>
        <svg class="absolute inset-x-0 bottom-0 text-white" viewBox="0 0 1160 163">
            <path
              fill="currentColor"
              d="M-164 13L-104 39.7C-44 66 76 120 196 141C316 162 436 152 556 119.7C676 88 796 34 916 13C1036 -8 1156 2 1216 7.7L1276 13V162.5H1216C1156 162.5 1036 162.5 916 162.5C796 162.5 676 162.5 556 162.5C436 162.5 316 162.5 196 162.5C76 162.5 -44 162.5 -104 162.5H-164V13Z"
            ></path>
          </svg>
    </section>

    <div>
        {{-- <div class="h-screen flex flex-row justify-center items-center"> --}}
        <div class="flex flex-row justify-center items-center my-10">

            {{-- Card for Form 1 --}}
            <div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow m-2">
                <a href="#">
                    <img class="rounded-t-lg" src={{ asset('assets/form1.jpg') }} alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        {{-- <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">CES Knowledge Sharing and Learning (KSL) Monitoring</h5> --}}
                        <h5 class="mb-4 text-xl font-bold leading-tight text-gray-900">CES Knowledge Sharing and Learning (KSL) Monitoring</h5>
                    </a>
                    {{-- <p class="mb-3 font-normal text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> --}}
                    <a href="#" class="inline-flex items-center px-3 py-2 mx-0.5text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300">  Fill-Up Form
                        <box-icon name='edit-alt' type="solid" color="#ffffff"></box-icon>
                    </a>
                    <a href="#" class="inline-flex items-center px-3 py-2 mx-0.5 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-blue-300">  See Analytics
                        <box-icon name='chart' type="solid" color="#ffffff"></box-icon>
                    </a>
                </div>
            </div>

            {{-- Card for Form 2 --}}
            <div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow m-2">
                <a href="#">
                    <img class="rounded-t-lg" src={{ asset('assets/form1.jpg') }} alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-4 text-xl font-bold leading-tight text-gray-900">CES Summary of Trainings Conducted</h5>
                    </a>
                    {{-- <p class="mb-3 font-normal text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> --}}
                    <a href="#" class="inline-flex items-center px-3 py-2 mx-0.5text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300">  Fill-Up Form
                        <box-icon name='edit-alt' type="solid" color="#ffffff"></box-icon>
                    </a>
                    <a href="#" class="inline-flex items-center px-3 py-2 mx-0.5 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-blue-300">  See Analytics
                        <box-icon name='chart' type="solid" color="#ffffff"></box-icon>
                    </a>
                </div>
            </div>

            {{-- Card for Form 3 --}}
            <div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow m-2">
                <a href="#">
                    <img class="rounded-t-lg" src={{ asset('assets/form1.jpg') }} alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-4 text-xl font-bold leading-tight text-gray-900">CES Technical Dispatch Monitoring</h5>
                    </a>
                    {{-- <p class="mb-3 font-normal text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> --}}
                    <a href="#" class="inline-flex items-center px-3 py-2 mx-0.5text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300">  Fill-Up Form
                        <box-icon name='edit-alt' type="solid" color="#ffffff"></box-icon>
                    </a>
                    <a href="#" class="inline-flex items-center px-3 py-2 mx-0.5 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-blue-300">  See Analytics
                        <box-icon name='chart' type="solid" color="#ffffff"></box-icon>
                    </a>
                </div>
            </div>

            {{-- Card for Form 4 --}}
            <div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow m-2">
                <a href="#">
                    <img class="rounded-t-lg" src={{ asset('assets/form1.jpg') }} alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-4 text-xl font-bold leading-tight text-gray-900">CES Technology Demonstration Monitoring</h5>
                    </a>
                    <a href="#" class="inline-flex items-center px-3 py-2 mx-0.5text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300">  Fill-Up Form
                        <box-icon name='edit-alt' type="solid" color="#ffffff"></box-icon>
                    </a>
                    <a href="#" class="inline-flex items-center px-3 py-2 mx-0.5 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-blue-300">  See Analytics
                        <box-icon name='chart' type="solid" color="#ffffff"></box-icon>
                    </a>
                </div>
            </div>

        </div>
        
    </div>
</body>
</html>