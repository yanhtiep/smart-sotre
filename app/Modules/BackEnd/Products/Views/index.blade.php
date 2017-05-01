@extends('layouts.backend.layout')
@section('content')
<?php $path = Config::get('constants.assets.backendTemplate'); ?>
<!--jsgrid css-->
<link href="{{$path}}js/plugins/jsgrid/css/jsgrid.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="<?=$path?>js/plugins/jsgrid/css/jsgrid-theme.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
<link href="<?=$path?>js/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="<?=$path?>css/font-awesome.css" type="text/css" rel="stylesheet" media="screen,projection">
<!--sweetalert -->
<script type="text/javascript" src="<?=$path?>js/plugins/sweetalert/sweetalert.min.js"></script>
<!-- chartist -->
<script type="text/javascript" src="{{$path}}js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{$path}}js/plugins/jquery-validation/additional-methods.min.js"></script>

<style type="text/css">
    .tooltip {
        display:none;
        position:absolute;
        border:1px solid #333;
        background-color:#161616;
        border-radius:5px;
        padding:5px;
        color:#fff;
        font-size:6px Arial;
    }
    a#pull-to-refresh:hover+.tooltip { display: block; }​
    .un-rotate {
        -webkit-transition: all 1s ease 0s;
        -moz-transition: all 1s ease 0s;
        -o-transition: all 1s ease 0s;
        -ms-transition: all 1s ease 0s;
        transition: all 1s ease 0s;
        cursor:pointer;
    }
    .rotate {
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        transform: rotate(180deg);
    }
    .normal-color-cursor{
        font-size:14px;color:#FF4081;cursor:pointer
    }
    .cyan-color-cursor{
        font-size:14px;color:#00BCD4;cursor:pointer
    }

    .input-field div.error{
        position: relative;
        top: -1rem;
        left: 0rem;
        font-size: 0.8rem;
        color:#FF4081;
        -webkit-transform: translateY(0%);
        -ms-transform: translateY(0%);
        -o-transform: translateY(0%);
        transform: translateY(0%);
    }
    .input-field label.active{
        width:100%;
    }
    .left-alert input[type=text] + label:after,
    .left-alert input[type=password] + label:after,
    .left-alert input[type=email] + label:after,
    .left-alert input[type=url] + label:after,
    .left-alert input[type=time] + label:after,
    .left-alert input[type=date] + label:after,
    .left-alert input[type=datetime-local] + label:after,
    .left-alert input[type=tel] + label:after,
    .left-alert input[type=number] + label:after,
    .left-alert input[type=search] + label:after,
    .left-alert textarea.materialize-textarea + label:after{
          left:0px;
    }
    .right-alert input[type=text] + label:after,
    .right-alert input[type=password] + label:after,
    .right-alert input[type=email] + label:after,
    .right-alert input[type=url] + label:after,
    .right-alert input[type=time] + label:after,
    .right-alert input[type=date] + label:after,
    .right-alert input[type=datetime-local] + label:after,
    .right-alert input[type=tel] + label:after,
    .right-alert input[type=number] + label:after,
    .right-alert input[type=search] + label:after,
    .right-alert textarea.materialize-textarea + label:after{
          right:70px;
    }
</style>
    <div class="container">
          <div class="section">

            <p class="caption">Includes predefined classes for easy layout options.</p>
            <!--Basic Form-->
            <div  class="col s12 m4 l3">
                <div class="breadcrumbs-title" style="text-align:right">
                    <a id="assistant-label" class="normal-color-cursor">Create Assistant</a>
                    <a id="add-assistant-button" class="btn-floating un-rotate"><i class="mdi-content-add"></i></a>
                </div>
            </div>

          <!--Form Advance-->
          <div class="row" id="rowAddPro">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <h4 class="header2">Form Advance</h4>
                <div class="row">
                  <form class="col s12">
                    <div class="row">
                      <div class="input-field col s6">
                        <input id="product_name" type="text" name="product_name">
                        <label for="product_name">Products</label>
                      </div>

                      <div class="input-field col s6">
                        <input id="products_price" type="text" name="products_price">
                        <label for="products_price">Products price</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                        <input id="cost" type="text" name="cost">
                        <label for="cost">Cost</label>
                      </div>

                      <div class="input-field col s6">
                        <input id="code" type="text" name="code">
                        <label for="code">Products Code</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s6">
                        <select>
                          <option value="" disabled selected>Category</option>
                          <option value="1">Man's cloth</option>
                          <option value="2">Computer& office</option>
                          <option value="3">Phone</option>
                        </select>
                        <label>Category</label>
                      </div>
                      <div class="input-field col s6">
                        <select>
                          <option value="" disabled selected class="discount">Discount</option>
                          <option value="1">5%</option>
                          <option value="2">15%</option>
                          <option value="3">30%</option>
                          <option value="3">40%</option>
                        </select>
                        <label>Discount</label>
                      </div>

                    </div>

                    <div class="row">
                      <div class="input-field col s6">
                        <select>
                          <option value="" disabled selected class="brand">Brand</option>
                          <option value="1">AA</option>
                          <option value="2">BBB</option>
                          <option value="3">CC</option>
                        </select>
                        <label>Brand</label>
                      </div>
                      <div class="input-field col s6">
                        <select>
                          <option value="" disabled selected class="ship_from">Ship From</option>
                          <option value="1">Khmer</option>
                          <option value="2">Thai</option>
                          <option value="3">USA</option>

                        </select>
                        <label>Ship From</label>
                      </div>

                    </div>

                    <div class="row">
                      <div class="input-field col s6">
                        <select>
                          <option value="" disabled selected class="shipping">Shipping</option>
                          <option value="1">Khmer</option>
                          <option value="2">Thai</option>
                          <option value="3">USA</option>
                        </select>
                        <label>Shipping</label>
                      </div>
                      <div class="input-field col s6">
                        <select>
                          <option value="" disabled selected class="payment">Payment</option>
                          <option value="1">ABA</option>
                          <option value="2">ANZ</option>
                          <option value="3">Wing</option>

                        </select>
                        <label>Payment</label>
                      </div>

                    </div>
                    <div class="row">
                      <h3> <small>Product Attribute</small></h3>
                      <div class="input-field col s6">
                        <select multiple class="color_pro_att check" name="color_pro_att" id="color_pro_att">
                          <option value="" disabled selected class="color" multiple>Color</option>
                          <option value="red">Red</option>
                          <option value="yellow">Yello</option>
                          <option value="black">Black</option>
                        </select>
                        <label>Color</label>
                        <div id="color_attribute"></div>
                      </div>
                      <div class="input-field col s6">
                        <select multiple class="size_pro_att check" name="size_pro_att" id="size_pro_att">
                          <option value="" disabled selected class="size">Size</option>
                          <option value="M">M</option>
                          <option value="S">S</option>
                          <option value="L">L</option>

                        </select>
                        <label>Size</label>
                        <div id="size_attribute"></div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <textarea id="message5" class="materialize-textarea" length="120"></textarea>
                        <label for="message">Message</label>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                            <i class="mdi-content-send right"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div id="borderless-table">
              <div class="row">
                <div class="col s12 m8 l9">
                  <table>
                    <thead>
                      <tr>
                        <th data-field="id">No</th>
                        <th data-field="name">Name</th>
                        <th data-field="cost">Cost</th>
                        <th data-field="code">Code</th>
                        <th data-field="category">Category</th>
                        <th data-field="discount">Discount</th>
                        <th data-field="brand">Brand</th>
                        <th data-field="ship_from">Ship From</th>
                        <th data-field="shipping">Shipping</th>
                        <th data-field="paymen">Payment</th>
                        <th data-field="color">Color</th>
                        <th data-field="amount">Amount</th>
                        <th data-field="action">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>Alvin</td>
                        <td>Eclair</td>
                        <td>$0.87</td>
                        <td>Alvin</td>
                        <td>Eclair</td>
                        <td>$0.87</td>
                        <td>Alvin</td>
                        <td>Eclair</td>
                        <td>$0.87</td>
                        <td>Alvin</td>
                        <td>Eclair</td>
                        <td>$0.87</td>
                        <td><a href=""><i class="fa fa-pencil-square" aria-hidden="true"></i></a>|<a href=""><i class="fa fa-trash" aria-hidden="true"></i></a></td>

                      </tr>
                      <tr>
                        <td>Alvin</td>
                        <td>Eclair</td>
                        <td>$0.87</td>
                        <td>Alvin</td>
                        <td>Eclair</td>
                        <td>$0.87</td>
                        <td>Alvin</td>
                        <td>Eclair</td>
                        <td>$0.87</td>
                        <td>Alvin</td>
                        <td>Eclair</td>
                        <td>$0.87</td>
                        <td><a href=""><i class="fa fa-pencil-square" aria-hidden="true"></i></a>|<a href=""><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                      </tr>
                      <tr>
                        <td>Alvin</td>
                        <td>Eclair</td>
                        <td>$0.87</td>
                        <td>Alvin</td>
                        <td>Eclair</td>
                        <td>$0.87</td>
                        <td>Alvin</td>
                        <td>Eclair</td>
                        <td>$0.87</td>
                        <td>Alvin</td>
                        <td>Eclair</td>
                        <td>$0.87</td>
                        <td><a href=""><i class="fa fa-pencil-square" aria-hidden="true"></i></a>|<a href=""><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
    </div>
      <script type="text/javascript">
        $(document).ready(function(){
          // $('#color_pro_att').click(function(){
          //   // var selectedValues = $('#color_pro_att').val();
          //   alert('dd');
          // });
          /*
          * get select color attribute products
          */
          $('#color_pro_att').on('change',function() {
            var valuecolor = $(this).val();
            // alert($(this).val());
            // console.log($(this).val());
            generateqtycolor(valuecolor);
          });

          /*
          * get select size attribute products
          */
          $('#size_pro_att').on('change',function() {
            // alert($('#size_pro_att option').is(':selected'));
            //alert($('#size_pro_att option').is(':selected').attr('class'));
            //alert($('#size_pro_att option').is(':checked'));
            $('#size_pro_att option').each(function() {
              alert($(this).html());
                // if(this.selected){
                //   var valuesize = $(this).val();
                //   generateqtysize(valuesize);
                // } else {
                //   //alert('no');
                // }
            });
          });



        });

        function generateqtycolor($valuecolor) {
            var qty = '<p>Color :'+$valuecolor+'</p>'+
                      '<div class="input-field col s6">'+
                      '<input id="'+$valuecolor+'" type="text" name="qty">'+
                      '<label for="products_price">Qty</label>'+
                      ' </div>';
          $("#color_attribute").append(qty);
        }

        function generateqtysize($valuesize) {
            var qty = '<p>Size : '+$valuesize+'</p>'+
                      '<div class="input-field col s6">'+
                      '<input id="'+$valuesize+'" type="text" name="qty">'+
                      '<label for="products_price">Qty</label>'+
                      ' </div>';
          $("#size_attribute").append(qty);
        }

        $("#add-assistant-button").click(function(){
            $("#rowAddPro").toggle(1500);
        });

       function createoptionsize(){
         var size = 'M';
         var sizes = ['M', 'S', 'L', 'X'];
         var option = '<select id="role_user_edit" class="mdl-selectfield__select" name="size" data-error=".errorTxt7">';
         var i =0;
         for (i; i<sizes.length; i++){
             if(sizes[i] == size){
                option += '<option value="'+size+'" selected>'+size+'</option>';
             }else {
               option += '<option value="'+sizes[i]+'" >'+sizes[i]+'</option>';
             }
         }

         option +='</select>';
         return option;

       }
      </script>
@stop
