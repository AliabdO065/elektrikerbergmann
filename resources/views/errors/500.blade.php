@php
    // No database lookup here: the failing thing may well be the database.
    $code = 500;
@endphp
@extends('errors.branded-layout')

@section('title', __('Da ist etwas schiefgelaufen'))
@section('message', __('Bei uns ist ein technischer Fehler aufgetreten. Bitte versuchen Sie es in wenigen Minuten erneut.'))
