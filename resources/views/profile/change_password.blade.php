@extends('layouts.app')

@section('content')

<?php
?>

<style type="text/css">
    h1 {
        padding: 0;
        margin: 0 8px;
        font-size: 24px;
        color: #2679b5;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="card" style="padding: 12px;">
            <div class="row">
                <div class="col-md-12">
                    <h1>Change Password </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr allign="left">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 offset-md-3">
                    <span class="input-group-text">
                        <p>Enter you new password</p>
                    </span>
                </div>
                <div class="col-md-3">
                    <input type="text" name="change_password" id="" value="" class="form-control">
                </div>
            </div>
            <div class="row" style="text-align: center;margin:30px 0;">
                <div class="col-md-9 offset-md-1">
                    <button type="submit" style="background-color: #4f99c6!important;margin-right: 12px;" class="btn btn-primary legitRipple"><i class="icon-checkmark mr-2"></i>Submit</button>
                    <button type="button" style="background-color: #8b9aa3!important;margin-left: 12px;" class="btn btn-primary legitRipple" onclick="resetForm();"><i class="icon-reset mr-2"></i>Reset</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection