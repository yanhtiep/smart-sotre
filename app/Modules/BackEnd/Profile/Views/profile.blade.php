@extends('layouts.backend.layout')
@section('content')
  <div class="row">
    <div class="col-sm-12">
        <input type="text" name="id" value="{{ $dataProfile->id }}" hidden="true" id="user_id">
        <div class="bg-picture" style="background-image:url('{{ Config::get('constants.assets.backendTemplate') }}img/bg_6.jpg')">
          <span class="bg-picture-overlay"></span><!-- overlay -->
          <!-- meta -->
          <div class="box-layout meta bottom">
            <div class="col-sm-6 clearfix">
            {{-- {{ $dataProfile->avatar }} --}}
              <span class="img-wrapper pull-left m-r-15">
                <?php
                    if ($dataProfile->avatar != ""){
                        $avatar = $dataProfile->avatar;
                    }else{
                      $avatar = Config::get('constants.assets.backendTemplate')."img/avatar-2.jpg";
                    }
                  ;?>
                <img src="{{ url($avatar) }}" alt="" style="width:64px" class="br-radius">
              </span>
              <div class="media-body">
                <h3 class="text-white mb-2 m-t-10 ellipsis">{{ $dataProfile->username }}</h3>
                <h5 class="text-white">{{ $dataProfile->phone }}</h5>
              </div>
            </div>
          </div>
          <!--/ meta -->
        </div>
    </div>
  </div>
  </br>
      <div class="row" >
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row" id="content-profile">
                         <div class="profile-desk">
                              <h1>{{ $dataProfile->username }}</h1>
                              <span class="designation">{{ $dataProfile->description }}</span>
                              <p>
                                 {{ $dataProfile->address }}
                              </p>
                              <table class="table table-condensed">
                                  <thead>
                                      <tr>
                                          <th colspan="3"><h3>Contact Information</h3></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td><b>Username</b></td>
                                          <td>
                                          <a href="#" class="ng-binding">
                                             {{ $dataProfile->username }}
                                          </a></td>
                                      </tr>
                                      <tr>
                                          <td><b>Email</b></td>
                                          <td>
                                          <a href="" class="ng-binding">
                                              {{ $dataProfile->email }}
                                          </a></td>
                                      </tr>
                                      <tr>
                                          <td><b>Phone</b></td>
                                          <td class="ng-binding">(+855){{ $dataProfile->phone }}</td>
                                      </tr>
                                      <tr>
                                          <td><b>Gender</b></td>
                                          <td>
                                          <a href="" class="ng-binding">
                                               {{ $dataProfile->gender }}
                                          </a></td>
                                      </tr>
                                      <tr>
                                          <td><b>Facebook</b></td>
                                          <td>
                                          <a href="" class="ng-binding">
                                               {{ $dataProfile->facebook }}
                                          </a></td>
                                      </tr>
                                      <tr>
                                          <td><b>Google +</b></td>
                                          <td>
                                          <a href="" class="ng-binding">
                                                {{ $dataProfile->google }}
                                          </a></td>
                                      </tr>
                                      <tr>
                                          <td><b>Twitter</b></td>
                                          <td>
                                          <a href="" class="ng-binding">
                                                {{ $dataProfile->twitter }}
                                          </a></td>
                                      </tr>
                                      <tr>
                                          <td><b>Linkedin</b></td>
                                          <td>
                                          <a href="" class="ng-binding">
                                               {{ $dataProfile->linkedin }}
                                          </a></td>
                                      </tr>
                                  </tbody>
                              </table>

                              <div class="input-field col s12">
                                  <button class="btn btn-success" type="submit" name="action" id="edit_profile">Edit Profile
                                  <i class="fa fa-pencil"></i>
                              </button>
                            </div>
                          </div> <!-- end profile-desk -->
                    </div>
                    <div id="form_edit" style="display:none">
                       <div class="card-panel" id="profie_edit_form">
                          <h4 class="header2">Edit Profile</h4>
                          <div class="row" >
                             <form class="col s12 formValidate" id="formValidate"> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-grou">
                                            <label class="active" for="username">Username</label>
                                            <input id="username" type="text" value="" name="username" placeholder="username" data-error=".errorTxt1" class="form-control" >
                                            <div class="errorTxt1"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <input type="hidden" name="userId" id="userId" value="" />
                                           <label for="email">Email</label>
                                           <input id="email_user" type="email" value="" name="email_user" placeholder="email_user" data-error=".errorTxt2" class="form-control">
                                            <div class="errorTxt2"></div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6 form-group">
                                      <label for="firstname">First Name</label>
                                       <input id="firstname" type="text" name="firstname" placeholder="firstname" value="" data-error=".errorTxt3" class="form-control">
                                        <div class="errorTxt3"></div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="lastname">Last Name</label>
                                        <input id="lastname" type="text" name="lastname" placeholder="lastname" value="" data-error=".errorTxt4" class="form-control"> 
                                        <div class="errorTxt4"></div>
                                    </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6 form-group">
                                          <label for="dob">DOB</label>
                                          <input type="date" id="dob" name="dob" placeholder="datepicker" value="" data-error=".errorTxt5" class="form-control">
                                          <div class="errorTxt5"></div>
                                      </div>
                                      <div class="col-md-6 form-group">
                                          <label for="genter_select" class="gender" name="gender">Gender *</label>
                                          <div class="checkbox-inline">
                                              <label class="cr-styled">
                                                  <input name="gender" type="radio" id="gender_male" value="Male"  name="gender"data-error=".errorTxt6" />
                                                  <i class="fa"></i> 
                                                  Male
                                              </label>
                                              <label class="cr-styled">
                                                 <input name="gender" type="radio" id="gender_female" value="Female" name="gender" />
                                                  <i class="fa"></i> 
                                                  Female
                                              </label>
                                              <div class="errorTxt6"></div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="phone">Phone</label>
                                        <input id="phone" type="text" placeholder="phone" value="" name="phone" class="form-control">
                                    </div>
                                     <div class="col-md-6 form-group">
                                        <label for="address">Address</label>
                                        <input id="address" type="text" placeholder="address" value="" name="address" class="form-control">
                                     </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6 form-group">
                                          <label for="facebook">Facebook</label>
                                          <input id="facebook" type="text" value="" name="facebook" placeholder="facebook" class="form-control">
                                      </div>
                                      <div class="col-md-6 form-group">
                                        <label for="google">Google</label>
                                        <input id="google" type="text" value="" name="google" placeholder="google" class="form-control">
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6 form-group">
                                        <label for="linkedin">Linkedin</label>
                                        <input id="linkedin" type="text" value="" name="linkedin" placeholder="linkedin" class="form-control">
                                      </div>
                                      <div class="col-md-6 form-group">
                                          <label for="twitter">Twitter</label>
                                           <input id="twitter" type="text" value="" name="twitter" placeholder="twitter" class="form-control">
                                      </div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-6 form-group">
                                          <div id="image_preview" style="width: 100%;text-align:center" >
                                                <img  id="image_previewing" src="{{ Config::get('constants.assets.backendTemplate') }}img/avatar-2.jpg" style="height:210px;width:210px" alt="profil"/>
                                          </div>
                                          <div id="image_message" style="text-align:center"></div>
                                          <div class="btn cyan">
                                              <span>Image</span>
                                              <input type="file" name="fileImage" id="fileImage"/>
                                          </div>
                                     </div>
                                  </div>
                                  <div class="input-field col s12">
                                      <button class="btn btn-success" type="submit" name="action" id="update_profile">Update
                                        <i class="mdi-content-send right"></i>
                                      </button>

                                      <button id="cancel-button" class="btn btn-danger" type="button" style="margin-right:5px">Cancel</button>
                                  </div>
                                </div>
                             </form>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
  $(document).on('click','#edit_profile',function(){

     $('#dob').datepicker();

    var id = $('#user_id').val();
    $.ajax({
            type: "POST",
            url: "{{ route('api.profile.edit') }}",
            data: {
                'id':id
            },
            async: false,
            success: function(data) {

             var dic = JSON.parse(data);
                if(dic.code == 0){
                  swal({
                      title: "Oop!",
                      text: dic.message,
                      timer: 2000,
                      showConfirmButton: false
                  });
                }
                else{
                  $('#form_edit').show();
                  var username = $('#username').val(dic.data.username);
                  var firstname = $('#firstname').val(dic.data.firstName);
                  var lastname = $('#lastname').val(dic.data.lastName);
                  var email = $("#email_user").val(dic.data.email);
                  //var gender = $('#gender').val(dic.data.gender);
                  if (dic.data.gender == "Male"){
                       $('#gender_male').attr( "checked",true);
                  }else{
                       $('#gender_female').attr( "checked",true );
                  }

                   if (dic.data.avatar != ""){
                    $('#fileImage').attr("src",dic.data.avatar);
                    $('#image_previewing').attr("src",document.location.origin+'/'+dic.data.avatar);
                   }
                  var phone = $('#phone').val(dic.data.phone);
                  var address = $('#address').val(dic.data.address);
                  var facebook = $('#facebook').val(dic.data.facebook);
                  var google = $('#google').val(dic.data.google);
                  var twitter = $('#twitter').val(dic.data.twitter);
                  var linkedin = $('#linkedin').val(dic.data.linkedin);
                  var id = $('#userId').val(dic.data.id);
                  var dob = $('#dob').val(dic.data.dob);
                  $('#content-profile').hide();
                }
            }
        });
  });

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
  $(document).on('click','#cancel-button',function(){
     $('#content-profile').show()
     $('#form_edit').hide('');
  });

  $("#formValidate").validate({
        rules: {
            firstname: {
                required: true,
                minlength: 4
            },
            lastname: {
                required: true,
                minlength: 2
            },
            email_user: {
                required: true,
                email:true
            },
            password: {
        required: true,
        minlength: 5
      },
      phone: {
        required: true,
        number:true
      }
        },
        //For custom messages
        messages: {
            firstname:{
                required: "Enter a username",
                minlength: "Enter at least 5 characters"
            },
            lastname:{
                required: "Enter a username",
                minlength: "Enter at least 5 characters"
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {

            var placement = $(element).data('error');
            if (placement) {
              $(placement).append(error);
            } else {
              error.insertAfter(element);
            }
        },
        submitHandler: function(form) {
          var formData = new FormData($("#formValidate")[0]);
          $.ajax({
              url: "{{route('api.profile.update')}}",
              type: 'POST',
              data: formData,
              async: false,
              enctype: 'multipart/form-data',
              success: function (data) {
                console.log(data);
                 var dic = JSON.parse(data);
                  if(dic.code == 0){
                      swal({
                          title: "Oop!",
                          text: dic.message,
                          timer: 2000,
                          showConfirmButton: false
                      });
                  }
                  else{
                      swal("Successed!", "Thanks!", "success");
                      location.reload();
                      // $('#form_edit').hide('');
                      //  $('#content-profile').show()
                  }
              },
              cache: false,
              contentType: false,
              processData: false
          });

        }

    });
</script>
@stop

@push('js')
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
@endpush