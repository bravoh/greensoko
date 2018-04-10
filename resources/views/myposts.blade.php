<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 3/25/18
 * Time: 5:38 PM
 */
?>
@extends('layouts.main')

@section('content')
    <div class="row animate-box fadeInUp animated-fast">
        <div class="col-md-12 text-left fh5co-heading" style="padding: 5%">
            <h2>My Posts</h2>
            <table class="table table-bordered table-condensed">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Image</th>
                </tr>
                @foreach($posts as $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->details}}</td>
                    <td><img width="200" src="/uploads/{{$p->image}}"></td>
                </tr>
                @endforeach    
            </table>
        </div>
    </div>
@endsection

