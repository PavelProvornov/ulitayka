@extends('layouts/app')

@section('meta')
    <title>Улитайка - страхование для туристов</title>
@stop

@section('content')
    <div class="container">

        <div class="content-flex">
            <div class="block-flex-hh">
                <h1>Германия</h1>
                <hr class="hr-bottom">
            </div>
            <br>
            <div class="block-flex-1">
                <div class="block-flex-1-text">

                    <p>Если Вы планируете путешествие в Германию, будьте готовы к тому, что Вам придется оформлять медицинский полис. Он является обязательным документом в перечне общих для въезда в страну. Являясь не только Вашим подспорьем во время несчастного случая, но и пропуском, страховка также необходима для получения визы.</p>
                    <h3>Зачем нужна страховка в Германию?</h3>
                    <p><b>Прежде всего наличие стандартного медицинского полиса покроет все затраты во время непредвиденных ситуаций:</b></p>
                    <ul>
                        <li>Абсолютный арсенал услуг в медучреждениях</li>
                        <li>Перевозку до больницы,госпиталя,поликлиники</li>
                        <li>Расходы на звонки в службу поддержки страховой</li>
                        <li>Расходы на лекарства по рецепту с предоставленным чеком</li>
                    </ul>


                </div>
                <div class="block-flex-1-img">
                    <div class="block-img" style="padding-top: 0 !important;"><img src="{{asset('assets/img/germany_1.jpg')}}" alt=""></div>

                </div>
            </div>

            <div class="block-flex-2">
                <div class="block-flex-2-img">
                    <div class="block-img2">
                        <img src="{{asset('assets/img/germany_2.jpg')}}" alt="">
                    </div>
                </div>
                <div class="block-flex-2-text">
                    <p>С расширенными возможностями страхового полиса, у Вас есть возможность застраховать себя от травм, полученных путем катания на горных лыжах и сноуборде, снегоходе, санках, коньках. Все эти распространенные зимние виды активного отдыха по статистике влекут за собой неприятные травмы, лечение которых без страховки в Германии обойдется в круглую сумму. В летнее время Вам также будет полезна страховка с опцией “Активный отдых и занятие спортом”. Вы получите компенсацию в случае травм от скалолазания, катания на горном велосипеде, роликах и пр.</p>
                    <p><b>Любимые занятия туристов в Германии:</b></p>
                    <ul>
                        <li>рыбалка</li>
                        <li>горные лыжи</li>
                        <li>плавание</li>
                        <li>прогулки на велосипеде по горам</li>
                    </ul>

                </div>
            </div>
            <div class="block-flex-3">
                <div class="block-flex-3-text">
                    <p><b>Интересные факты о Германии</b></p>
                    <ul>
                        <li>650 евро — штраф за сорванный цветов с клумбы.</li>
                        <li>400 — количество зоопарков по всей Германии.</li>
                        <li>20 евро — цена одноразового билета в сауну.</li>
                        <li>20 евро — штраф за брошенный окурок на асфальт.</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
@stop