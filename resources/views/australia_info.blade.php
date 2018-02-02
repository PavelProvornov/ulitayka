@extends('app')

@section('meta')
    <title>Улитайка - страхование для туристов</title>
@stop

@section('content')
    <div class="container">

        <div class="content-flex">
            <div class="block-flex-hh">
                <h1>Австралия</h1>
                <hr class="hr-bottom">
            </div>
            <br>
            <div class="block-flex-1">
                <div class="block-flex-1-text">

                    <p>Австралия — нетронутый уголок рая, где можно замечательно провести свой отпуск. Чтобы оформить визу, приобретение страховки является обязательной частью. Более того, для граждан старше 75 лет требуется страховой полис со справкой о том, что они могут совершать такое путешествие. Рекомендуется делать страховку не позднее, чем 5 дней до выезда.</p>
                    <h3>Зачем нужна страховка в Австралию?</h3>
                    <p>Любители серфинга и дайвинга постоянно приезжают в Австралию, чтобы опробовать свое новое оборудование или отточить навыки. Важность страхования заключается в опасности на воде. Из-за сильных волн в океане и прибоев количество туристов, тонущих каждый сезон, неумолимо растет.</p>
                </div>
                    <div class="block-flex-1-img">
                        <div class="block-img" style="padding-top: 0 !important;"><img src="{{asset('img/australia_1.jpg')}}" alt=""></div>

                    </div>

            </div>
            <div class="block-flex-3">
                    <div class="block-flex-3-text">
                        <p>Причины этого довольно просты: неумение плавать и пренебрежение техникой безопасности на воде. Купаться в Австралии можно лишь в специально отведенных местах, поэтому важно читать предупреждающие таблички. Страховой полис с дополнительной опцией активного отдыха покроет затраты на лечение, перевозку и репартацию при несчастном случае. Такой вариант страхового полиса также покроет все затраты в случае, если Вас ужалила медуза, Вы порезались о коралл и т.д.
                        </p>


                </div>
            </div>

            <div class="block-flex-2">
                <div class="block-flex-2-img">
                    <div class="block-img2">
                        <img src="{{asset('img/australia_2.jpg')}}" alt="">
                    </div>
                </div>
                <div class="block-flex-2-text">
                    <p><b>Интересные факты об Австралии:</b></p>
                    <ul>
                        <li>Национальная австралийская еда Meat pie. Это мясной пирожок в виде закрытой корзиночки из теста.</li>
                        <li>В Австралии весьма агрессивное солнце. Запаситесь защитным кремом.</li>
                        <li>Стоимость сигарет здесь зашкаливает за пределы. Местные жители курят мало.</li>
                        <li>Национальная валюта — австралийский доллар, равный по значению американскому.</li>
                    </ul>

                </div>
            </div>
        </div>

    </div>
@stop