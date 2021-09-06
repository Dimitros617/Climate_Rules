@extends('errors::minimal')

@section('title', __('Neautorizováno'))
@section('code', '401')
@section('message', 'Na toto nemáte dostatečná oprávnění')
