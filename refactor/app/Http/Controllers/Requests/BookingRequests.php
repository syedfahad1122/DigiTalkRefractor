<?php
use Illuminate\Validation\Rules\Password;
 
class BookingRequests extends FormRequest
{
    public function authorize()
    {
        if($request->__authenticatedUser->user_type == env('ADMIN_ROLE_ID') || $request->__authenticatedUser->user_type == env('SUPERADMIN_ROLE_ID')){
            return true;
        }
    }
 
    public function rules()
    {
        return [
            'user_id' => ['required', 'integer']
        ];
    
    }
}