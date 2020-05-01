# check_hashed_string
Checks a single database Model Field for a matching hash from plain text

usage

        $user = Auth::guard("api")->user();
        
        /* validate the form data */
        $validatedData = $request->validate([
            "current_password" => "required|string|min:8|check_hashed_string:\App\User,{$user->id},password",
            "email_address" => "required|string|email|max:255|confirmed|unique:email_addresses"
        ], $customErrorMessages);
        
        
        
The third parameter to the validation rule will be consistent to the options of the Hash Facade.
