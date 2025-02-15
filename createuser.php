<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script>
        function validateForm() {
            const firstName = document.getElementById('firstName').value;
            const lastName = document.getElementById('lastName').value;
            const userName = document.getElementById('userName').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const repeatPassword = document.getElementById('repeatPassword').value;
            const phone = document.getElementById('phone').value;
            const dob = document.getElementById('dob').value;

            if (!firstName || !lastName || !userName || !email || !password || !repeatPassword || !phone || !dob) {
                alert('All fields are required.');
                return false;
            }

            if (password !== repeatPassword) {
                alert('Passwords do not match.');
                return false;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address.');
                return false;
            }

            const phonePattern = /^\d{10}$/;
            if (!phonePattern.test(phone)) {
                alert('Please enter a valid 10-digit phone number.');
                return false;
            }

            const dobPattern = /^\d{2}\/\d{2}\/\d{4}$/;
            if (!dobPattern.test(dob)) {
                alert('Please enter a valid date of birth in the format mm/dd/yyyy.');
                return false;
            }

            alert('User created successfully!');
            return true;
        }
    </script>
</head>
<body class="bg-gray-200">
    <div class="container mx-auto p-4">
        <div class="bg-white p-4 rounded shadow-md">
            <div class="flex items-center mb-4">
                <i class="fas fa-users text-gray-600 mr-2"></i>
                <h1 class="text-xl font-semibold text-gray-700">Users</h1>
            </div>
            <div class="text-sm text-gray-500 mb-4">
                <a href="#" class="text-gray-500 hover:text-gray-700">Users</a> &gt; <span>Create User</span>
            </div>
            <div class="bg-gray-100 p-4 rounded shadow-inner">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Create User</h2>
                <form class="grid grid-cols-1 md:grid-cols-2 gap-4" onsubmit="return validateForm()">
                    <div>
                        <label class="block text-gray-700">First Name:</label>
                        <input type="text" id="firstName" class="w-full p-2 border border-gray-300 rounded" placeholder="First Name" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Last Name:</label>
                        <input type="text" id="lastName" class="w-full p-2 border border-gray-300 rounded" placeholder="Last Name" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">User Name:</label>
                        <input type="text" id="userName" class="w-full p-2 border border-gray-300 rounded" placeholder="User Name" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Email:</label>
                        <input type="email" id="email" class="w-full p-2 border border-gray-300 rounded" placeholder="Email" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Password:</label>
                        <input type="password" id="password" class="w-full p-2 border border-gray-300 rounded" placeholder="Password" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Repeat Pwd:</label>
                        <input type="password" id="repeatPassword" class="w-full p-2 border border-gray-300 rounded" placeholder="Repeat Pwd" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Phone #:</label>
                        <input type="text" id="phone" class="w-full p-2 border border-gray-300 rounded" placeholder="Phone #" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Date Of Birth:</label>
                        <input type="text" id="dob" class="w-full p-2 border border-gray-300 rounded" placeholder="mm/dd/yyyy" required>
                    </div>
                    <div class="md:col-span-2 flex justify-end space-x-4">
                        <button type="submit" class="bg-[#008080] text-white px-4 py-2 rounded">Create User</button>
                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>