
<x-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
          <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Reset Password</h2>
        </div>
    
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <p class="text-center text-xl  tracking-tight text-red-900">
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                    {{$error }} <br>
                    @endforeach
                @endif
                @if (session('success'))
                    {{session('success')}}
                @endif
                @if (session('error'))
                    {{session('error')}}
                @endif
            </p>

          <form class="space-y-6" action="{{route('staff_reset_password', [$token,$email])}}" method="post">
            @csrf
            <div>
                <div class="flex items-center justify-between">
                  <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                </div>
                <div class="mt-2">
                  <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="flex items-center justify-between">
                    <label for="confirm_password" class="block text-sm font-medium leading-6 text-gray-900">Password Comfirmation</label>
                  </div>
                  <div class="mt-2">
                    <input id="confirm_password" name="confirm_password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                
              </div>
            <div class="flex justify-between">
              <button type="submit" class="flex  rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
              <a href="{{route('staff_login')}}" class="flex px-3 py-1.5 text-sm font-semibold leading-6 shadowblue-sm hover:text-indigo-600 ">Sign in</a>
            </div>
          </form>
      
          <p class="mt-10 text-center text-sm text-gray-500">
            Not a member?
            <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Start a 14 day free trial</a>
          </p>
        </div>
      </div>
    
</x-layout>