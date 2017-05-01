{!! Html::style('assets/backEnd/template/css/app.css') !!}
<div class="card-panel" id="profie_edit_form">
<h4 class="header2">Edit Profile</h4>
<div class="row" >
   <form class="col s12 formValidate" id="updage_success">
      <div class="row">
         <div class="row col s12 m6">

            <div class="row">
               <div class="input-field col s12">
                  <input id="username" type="text" value="{{ $dataProfileEdie->username}}" name="username" data-error=".errorTxt1" >
                  <label for="Username">Username</label>
                  <div class="errorTxt1"></div>
               </div>
            </div>
            <input type="text" name="user_id" id="user_id" value="{{ $dataProfileEdie->id }}" hidden=""/>
            <div class="row">
               <div class="input-field col s12">
                  <input id="email" type="email" value="{{ $dataProfileEdie->email}}" name="email" data-error=".errorTxt2">
                  <label for="email">Email</label>
                  <div class="errorTxt2"></div>
               </div>
            </div> 

            <div class="row">
               <div class="col s12 m6">
                <?php 
                  $img = Config::get('constants.assets.backendTemplate')."images/ic_coverThumbnail.png";
                  if ($dataProfileEdie->avatar !=""){
                    $img = $dataProfileEdie->avatar;
                  }
                ?>
                  <div id="image_preview" style="width: 100%;text-align:center" >
                      <img  id="image_previewing" src="{{ $img }}" style="height:210px;width:210px" alt="profil"/>
                  </div>
                  <br/>
                  <div id="image_message" style="text-align:center"></div>

                  <div class="file-field input-field">
                      <div class="btn cyan">
                          <span>Image</span>
                          <input type="file" name="fileImage" id="fileImage"/>
                      </div>
                      <div class="file-path-wrapper">
                          <input class="file-path validate" type="text" placeholder="Upload Image">
                      </div>
                  </div>
              </div>
            </div>

         </div>

         <div class="row col s12 m6">
            <div class="row">
               <div class="input-field col s12">
                  <input id="firstname" type="text" name="firstname" value="{{ $dataProfileEdie->firstName}}" data-error=".errorTxt3">
                  <label for="firstname">First Name</label>
                  <div class="errorTxt3"></div>
               </div>
            </div>

            <div class="row">
               <div class="input-field col s12">
                  <input id="lastname" type="text" name="lastname" value="{{ $dataProfileEdie->lastName}}" data-error=".errorTxt4">
                  <label for="lastname">Last Name</label>
                  <div class="errorTxt4"></div>
               </div>
            </div> 

            <div class="row">
               <div class="input-field col s12">
                <input type="date" id="dob" name="dob" class="datepicker" value="{{ $dataProfileEdie->dob}}" data-error=".errorTxt5">
                <label for="dob">DOB</label>
                <div class="errorTxt5"></div>
              </div>
            </div>
            
            <div class="row">
              <div class="col s12">
                <label for="genter_select">Gender *</label>
                @if ($dataProfileEdie->gender == "Male")
                  <p>
                    <input name="gender" type="radio" id="gender_male" value="Male"  data-error=".errorTxt6" checked/>
                    <label for="gender_male"> Male</label>
                  </p>
                  <p>
                      <input name="gender" type="radio" id="gender_female" value="Female"/>
                      <label for="gender_female" >Female</label>
                  </p>
                  <div class="input-field">
                      <div class="errorTxt6"></div>
                  </div>
                @else
                  <p>
                    <input name="gender" type="radio" id="gender_male" value="Male" data-error=".errorTxt6"/>
                    <label for="gender_male" >Male</label>
                  </p>
                  <p>
                      <input name="gender" type="radio" id="gender_female" value="Female" checked/>
                      <label for="gender_female" >Female</label>
                  </p>
                  <div class="input-field">
                      <div class="errorTxt6"></div>
                  </div>
                @endif
              </div>

          </div>
         </div>
         <div class="row col s12 m12">
        
        <div class="input-field col s12">
          <input id="phone" type="text" value="{{ $dataProfileEdie->phone}}" name="phone">
          <label for="phone">Phone</label>
        </div>

        <div class="input-field col s12">
          <input id="address" type="text" value="{{ $dataProfileEdie->address}}" name="address">
          <label for="address">Address</label>
        </div>

        <div class="input-field col s12">
          <input id="facebook" type="text" value="{{ $dataProfileEdie->facebook}}" name="facebook">
          <label for="facebook">Facebook</label>
        </div>

        <div class="input-field col s12">
          <input id="google" type="text" value="{{ $dataProfileEdie->google}}" name="google">
          <label for="google">Google</label>
        </div>

        <div class="input-field col s12">
          <input id="twitter" type="text" value="{{ $dataProfileEdie->twitter}}" name="twitter">
          <label for="twitter">Twitter</label>
        </div>

        <div class="input-field col s12">
          <input id="linkedin" type="text" value="{{ $dataProfileEdie->linkedin}}" name="linkedin">
          <label for="linkedin">Linkedin</label>
        </div>
        <div class="input-field col s12">
            <button class="btn cyan waves-effect waves-light right" type="button" name="action" id="update_profile">Update
              <i class="mdi-content-send right"></i>
            </button>
            
            <button id="cancel-button" class="btn red waves-effect waves-light darken-4 right" type="button" style="margin-right:5px">Cancel</button>
        </div>
      </div>
      </div>  
   </form>
</div>
</div>
{!! Html::script('assets/backEnd/template/js/app.js') !!}
<script type="text/javascript">
// $("#update_profile").on("click", function(e){
//     //e.preventDefault();
//     alert("ggwp");
$(document).ready(function(){
  /*
    * action change image
    */

 $("#fileImage").change(function() {
        $("#image_message").html(''); // To remove the previous error message
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
                
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) ) )
        {
            $('#image_previewing').attr('src','noimage.png');
            $("#image_message").html("<p id='error' style='color:red'>Please Select A valid Image File</p>");
            return false;
        }
        else
        {
            var reader = new FileReader();
            //imageIsLoaded
            reader.onload = function(e) {
                                        $("#fileImage").css("color","green");
                                        $('#image_previewing').attr('src', e.target.result);
                                  };
            reader.readAsDataURL(this.files[0]);
        }
    });


});
    
</script>