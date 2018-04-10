<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 3/25/18
 * Time: 10:20 AM
 */
?>
@extends('layouts.main')

@section('content')
    <style>
        .glass{
            background-color: #fafafa;
        }
    </style>
    <aside id="fh5co-hero">
        <div class="flexslider">
            <ul class="slides">
                <li style="background-image: url(/images/bg.jpg);">
                    <div class="overlay-gradient"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-md-pull-3 slider-text">
                                <div class="slider-text-inner">
                                    <span class="glass">
                                        <h1 style="background-color: #66D37E; padding: 5%">Online Marketplace for Farmers</h1>
                                        <h2 style="background-color: #66D37E; padding: 5%">Welcome to greensoko, where farmers get to sell their farm produce easily<a href="" ></a></h2>
                                    </span>
                                    <p>
                                        <a class="btn btn-primary btn-demo" href="{{url('/post')}}"></i> Post your produce</a>
                                        <a class="btn btn-primary btn-learn" href="#how-it-works">How it works</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    <div id="fh5co-blog">
        <div class="row">
            @foreach(\App\Post::all() as $post)
            <div class="col-md-4">
                <div class="fh5co-blog animate-box fadeInUp animated-fast">
                    <a href="#" class="blog-bg" style="background-image: url(/uploads/{{$post->image}});"></a>
                    <div class="blog-text" style="min-height: 250px">
                        <span class="posted_on">{{$post->created_at}}</span>
                        <h3><a href="#">{{$post->name}}</a></h3>
                        <p style="">{{$post->details}}</p>
                        <ul class="stuff" style="position: absolute; bottom: 0px; margin-bottom: 10px">
                            <li><i class="icon-money"></i>{{$post->price}}</li>
                            <li><i class="icon-phone"></i>{{$post->user->phone}}</li>
                            <li><a href="#"><i class="icon-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="how-it-works" class="fh5co-counters animated">

        <hr/>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center animate-box fadeInUp animated-fast">
                <h5>How It Works</h5>
                {{--<p>We have a fun facts far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>--}}
            </div>
        </div>
        <div class="row animate-box fadeInUp animated-fast">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <span class="fh5co-counter js-counter" data-from="0" data-to="1" data-speed="5000" data-refresh-interval="50">
                            <i class="icon-rocket"></i>
                        </span>
                        <span class="fh5co-counter-label">Post an ad of your farm produce</span>
                    </div>
                    <div class="col-md-3 text-center">
                        <span class="fh5co-counter js-counter" data-from="0" data-to="2" data-speed="5000" data-refresh-interval="50">
                            <i class="icon-qrcode"></i>
                        </span>
                        <span class="fh5co-counter-label">Buyer sees your ad and is interested</span>
                    </div>
                    <div class="col-md-3 text-center">
                        <span class="fh5co-counter js-counter" data-from="0" data-to="3" data-speed="5000" data-refresh-interval="50">
                            <i class="icon-phone"></i>
                        </span>
                        <span class="fh5co-counter-label">Buyer contacts you</span>
                    </div>
                    <div class="col-md-3 text-center">
                        <span class="fh5co-counter js-counter" data-from="0" data-to="4" data-speed="5000" data-refresh-interval="50">
                            <i class="icon-check"></i>
                        </span>
                        <span class="fh5co-counter-label">You seal the deal</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

