# DigiTalkRefractor
### This Repo Is Only Used For refracting Purpose
### 1.Services Should Be Seperate For Every Action Like User Creation Etc
<ul>
  <li>In Booking Repository Class There should be Multiple services Class to perform certain action's Like For Every Action e.g sendSMSNotificationToTranslator There Should be 
Proper Service that makes action more generic for booking reservation,cancellation we used same services.</li>
<li> sendPushNotificationToSpecificUsers Must a Seperate Services It Cause Dependency Inversion Every Class Must Be responsible for single Task.</li>
  <li><b>Validation: Form Request classes</b> There is No Validation For Form Request in Booking Controller.<br/> 
    And All The Authorization Stuff We Should Do it In Seperate Class
 </li>
</ul>
#### 2.Example Validation Must Be Seperate In Controller and Form Validation Also Laravel Provide This Facility To Handle Authorization Form Handling Seperate
<br/>
<b> ###########Code Start####################</b>
 <br/>
class StoreUserRequest extends FormRequest
{
    <br/>
    public function authorize()
    {
     <br/>
       if($request->__authenticatedUser->user_type == env('ADMIN_ROLE_ID') || $request->__authenticatedUser->user_type == env('SUPERADMIN_ROLE_ID')){
        <br/>
        return true;
         <br/>
       }
        <br/>
    }
     <br/>
 
    public function rules()
    {
        return [
            'id' => ['required', 'integer']
            
        ];
    }
}
    #######Code End#########
    <br/>
    
?>


 ### 3.<b>Service Class with Single Responsibility Principle </b>
<ul>
  <li>Store user Get User In Booking Repository Should Be A single Service Class Like UserService In UserService There should be a A function to store and get methods. </li>
  <li> Also There Should be a user Resource Class To manage return Type Like Alteration of resoinse </li>  
  <li> There Should be a Model Of User And Other Model there we defined predefined schema with acceptable Attributes.</li>
</ul>
## 4.We can Use Action's In Services If We have multiple Action Like endJob,sendNotificationTranslator,sendSMSNotificationToTranslator etc Must be a seperate action 

<ul>
  <li>So, as you can see, the same multiple operations around users, just not in one UserService class, but rather divided into Action classes </li>
  </ul>
  ## 5.Action E.g app/Actions/endJob.php inside this class we return and perform the action
  
  ### 6.Notifying Admins: Queueable Jobs Like JobEnd Assignee Change JobCreate etc.
  
  
  ### 7.Events/Listeners As We Have Used We have to change all the information like assignedStatusChange Events To Perform Certain Action,
  
  #### 8.Observers We have to Use Observer TO Send Email as the Eloquent of Booking of User Update It Immediately Fired Events.
  
  ##### Conclusion
  ### Good To have This
  <ul>
  <li> <b> We Should Make Seperate Service In BookingRepository For Every Action. </b> </li>
  <li> <b> For Every Service there should Be Action Agains Service </b> </li>
  <li> <b> We Should Use Observer For Sending Emails / SMS </b> </li>
  <li> <b> There Should Be A Proper Validation Inside Controller For Against Every action / authorization </b> </li>
  <li> <b> Method must not be greate then 5 to 6 lines </b> </li>
  </ul>
  </b>
  
  #### Bad In LeetCode
   <ul>
  <li> <b> Events Used which is Good </b> </li>
  <li> <b> Repository Patteren used </b> </li>
  <li> <b> Function name is according to function Behaviour </b> </li>
 </ul>
  
  
  
  
  
  

  
