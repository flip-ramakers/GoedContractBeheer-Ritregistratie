     @extends('layouts.app!', ['title' => 'Login'])

     @section('content')
         <div class="min-vh-100 d-flex justify-content-center align-items-center bg-light">
             <div class="w-100" style="max-width: 320px;">
                 <div class="text-center mb-4">
                     <img src="{{ asset('images/Goedcontractbeheer.jpg') }}" alt="Logo" class="img-fluid" style="max-height: 100px;">
                 </div>
     
                 @if (!session()->has('success'))
                     <form action="{{ route('login') }}" method="POST">
                         @csrf
                         <div class="mb-3">
                             <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                             <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Bijv. chauffeur@gmail.com" required>
                             @error('email')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <button type="submit" class="btn btn-dark w-100 rounded-3">Login</button>
                     </form>
                 @else
                     <div class="alert alert-success text-center">
                         {{ __('labels.email_message') }}
                     </div>
                 @endif
             </div>
         </div>
     @endsection