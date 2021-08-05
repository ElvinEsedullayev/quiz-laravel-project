@extends('errors::minimal')

@section('title', $exception->getMessage()){{--bunu yazdiq yazdigimiz xeta mesaji goreunsun --}}
@section('code', '404')
@section('message', $exception->getMessage())
