@php
    $code = 404;
    $lookupSettings = true;
@endphp
@extends('errors.branded-layout')

@section('title', __('Seite nicht gefunden'))
@section('message', __('Die Seite, die Sie suchen, existiert nicht oder wurde verschoben.'))
