@extends('layouts.backend.layout')
@section('content')
<?php $path = Config::get('constants.assets.backendTemplate'); ?>



	<div class="page-title"> 
        <h3 class="title">Foods management</h3> 
    </div>
     <!-- Basic Form Wizard -->
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-default">
                            <div class="panel-heading"> 
                                <h3 class="panel-title">Basic Form Wizard</h3> 
                            </div> 
                            <div class="panel-body"> 
                                <form id="basic-form" action="#">
                                    <div>
                                        <h3>Account</h3>
                                        <section>
                                            <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="userName">User name *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control required" id="userName" name="userName" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="password"> Password *</label>
                                                <div class="col-lg-10">
                                                    <input id="password" name="password" type="text" class="required form-control">

                                                </div>
                                            </div>

                                            <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="confirm">Confirm Password *</label>
                                                <div class="col-lg-10">
                                                    <input id="confirm" name="confirm" type="text" class="required form-control">
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <label class="col-lg-12 control-label ">(*) Mandatory</label>
                                            </div>
                                        </section>
                                        <h3>Profile</h3>
                                        <section>
                                            <div class="form-group clearfix">

                                                <label class="col-lg-2 control-label" for="name"> First name *</label>
                                                <div class="col-lg-10">
                                                    <input id="name" name="name" type="text" class="required form-control">
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="surname"> Last name *</label>
                                                <div class="col-lg-10">
                                                    <input id="surname" name="surname" type="text" class="required form-control">

                                                </div>
                                            </div>

                                            <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="email">Email *</label>
                                                <div class="col-lg-10">
                                                    <input id="email" name="email" type="text" class="required email form-control">
                                                </div>
                                            </div>

                                            <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="address">Address *</label>
                                                <div class="col-lg-10">
                                                    <input id="address" name="address" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group clearfix">
                                                <label class="col-lg-12 control-label ">(*) Mandatory</label>
                                            </div>

                                        </section>
                                        <h3>Hints</h3>
                                        <section>
                                            <div class="form-group clearfix">
                                                <div class="col-lg-12">
                                                    <ul>
                                                        <li>Jonathan Smith </li>
                                                        <li>Lab</li>
                                                        <li>jonathan@smith.com</li>
                                                        <li>Your city, Cityname</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </section>
                                        <h3>Finish</h3>
                                        <section>
                                            <div class="form-group clearfix">
                                                <div class="col-lg-12">
                                                    <label class="cr-styled">
                                                        <input type="checkbox">
                                                        <i class="fa"></i> 
                                                        I agree with the Terms and Conditions.
                                                    </label>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </form> 
                            </div>  <!-- End panel-body -->
                        </div> <!-- End panel -->

                    </div> <!-- end col -->

                </div> <!-- End row -->

@stop