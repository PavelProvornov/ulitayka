@extends('layouts/app')

@section('meta')
    <title>Улитайка - страхование для туристов</title>
@stop

@section('content')
    <div class="container">

        <div class="content-flex">

            <div class="block-flex-hh">
                <h1>Зона Шенген</h1>
                <hr class="hr-bottom">
            </div>


            <div class="block-flex-2 ">
                <div class="block-flex-2-img">
                    <img src="{{asset('assets/img/shen.jpg')}}" alt="">
                </div>
                <div class="block-flex-2-text">
                    <p>Шенгенская зона— это 26 стран, имеющие общие границы и не имеющие друг другом паспортный и иммиграционный контроль.</p>
                    <p>Люди, находящиеся внутри этой зоны, могут передвигаться между странами-соседками.</p>
                    <p>Такое соглашение лишь подтверждает на практике одно из коренных прав человека—свобода передвижения.</p>
                    <p>Получение визы нелегкий процесс, занимающий продолжительный период.</p>
                    <p>Но какой большой простор для путешествий и странствий дает такой документ.</p>
                    <p>Оформляйте страховой медицинский полис заранее, чтобы получение визы не доставляло Вам хлопот.</p>
                </div>
            </div>

            <p class="content-text-start content-list">Для удобства путешественников, мы предоставляем <b>список стран Шенгенской зоны:</b></p>
            <div class="block-list">
                <ul>
                    <li>Австрия</li>
                    <li>Бельгия</li>
                    <li>Чешская Республика</li>
                    <li>Дания</li>
                    <li>Эстония</li>
                    <li>Финляндия</li>
                    <li>Франция</li>
                    <li>Германия</li>
                    <li>Греция</li>
                    <li>Венгрия</li>
                    <li>Исландия</li>
                    <li>Италия</li>
                    <li>Латвия</li>
                </ul>
                <ul>
                    <li>Литва</li>
                    <li>Люксембург</li>
                    <li>Мальта</li>
                    <li>Голландия</li>
                    <li>Норвегия</li>
                    <li>Польша</li>
                    <li>Португалия</li>
                    <li>Словакия</li>
                    <li>Словения</li>
                    <li>Испания</li>
                    <li>Швеция</li>
                    <li>Швейцария</li>
                    <li>Лихтенштейн</li>
                </ul>
            </div>

        </div>

    </div>
@stop