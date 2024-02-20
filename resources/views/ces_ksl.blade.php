<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PhilRice E-Forms</title>

    {{-- Include compiled css to start using Tailwind Utility Classes --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    {{-- Boxicons --}}
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full sm:max-w-md">
        <form action="{{ route('ksl.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" id="email" name="email" class="form-input mt-1 block w-full" value="{{ old('email') }}" required>
            </div>

            <div class="mb-4">
                <label for="staff_name" class="block text-gray-700">Staff Name:</label>
                <input type="text" id="staff_name" name="staff_name" class="form-input mt-1 block w-full" value="{{ old('staff_name') }}" required>
            </div>

            <div class="mb-4">
                <label for="age_group" class="block text-gray-700">Age Group:</label>
                <select name="age_group" id="age_group">
                    <option value="">Select age group</option>
                    <option value="Below 18">Below 18</option>
                    <option value="18 to 30">18 to 30</option>
                    <option value="31 to 45">31 to 45</option>
                    <option value="46 to 59">46 to 59</option>
                    <option value="Above 60">Above 60</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="sex" class="block text-gray-700">Sex:</label>
                <select name="sex" id="sex">
                    <option value="">Select sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            {{-- Loop the data from offices_divisions table --}}
            <div class="mb-4">
                <label for="offices_divisions" class="block text-gray-700">Offices and Divisions:</label>
                <select name="offices_divisions" id="offices_divisions">
                    <option value="">Select offices and divisions</option>
                    <option value="RCEF">RCEF</option>
                    <option value="TMSD">TMSD</option>
                </select>
            </div>

            <div class="mb-4">
                <p>Mode of Sharing:</p>
                <input type="radio" id="face" name="mode_of_sharing" value="Face-to-face" />
                <label for="face">Face-to-face</label>
                <input type="radio" id="online" name="mode_of_sharing" value="Online/Virtual" />
                <label for="online">Online/Virtual</label>
            </div>

            <div class="mb-4">
                <p>KSL Opportunity:</p>
                <input type="radio" id="briefing" name="opportunity" value="Briefing" />
                <label for="briefing">Briefing</label>
                <input type="radio" id="confidence" name="opportunity" value="Confidence" />
                <label for="confidence">Confidence</label>
                <input type="text" id="other" name="opportunity" class="form-input mt-1 block w-full" placeholder="other...">
            </div>

            <div class="mb-4">
                <p>Topic Shared:</p>
                <input type="checkbox" id="varieties" name="topic" value="Varieties">
                <label for="varieties"> Varieties</label><br>
                <input type="checkbox" id="seeds" name="topic" value="Seeds">
                <label for="seeds"> Seeds</label>
            </div>

            <div class="mb-4">
                <label for="total_participants">Number of Participants:</label>
                <input type="number" id="total_participants" name="total_participants" min="0" value="{{ old('total_participants') }}">
            </div>

            <div class="mb-4">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
        </form>
    </div>
</body>
</html>
<script>
    console.log();
</script>